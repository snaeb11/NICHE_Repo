<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\UserActivityLog;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('layouts.auth.login');
    }

    public function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+\-]+@usep\.edu\.ph$/'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->validator->errors()->first()], 422);
        }

        $throttleKey = Str::lower($credentials['email']) . '|' . $request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return response()->json(['message' => "Too many login attempts. Try again in {$seconds} seconds."], 429);
        }

        try {
            // Search by email_hash instead of email_plain
            $emailHash = hash('sha256', Str::lower($credentials['email']));
            $matchedUser = User::where('email_hash', $emailHash)->first();

            if (!$matchedUser) {
                RateLimiter::hit($throttleKey);
                return response()->json(['message' => 'No account found for that email.'], 401);
            }

            if (!Hash::check($credentials['password'], $matchedUser->password)) {
                RateLimiter::hit($throttleKey);
                return response()->json(['message' => 'Incorrect password.'], 401);
            }

            // Handle deleted status
            if ($matchedUser->status === 'deleted') {
                return response()->json(['message' => 'This account has been permanently deleted.'], 403);
            }

            // Handle deactivated status (auto-restore if deletion not finalized)
            if ($matchedUser->status === 'deactivated') {
                if ($matchedUser->scheduled_for_deletion && $matchedUser->scheduled_for_deletion->lte(now())) {
                    $matchedUser->update(['status' => 'deleted', 'deleted_at' => now()]);
                    return response()->json(['message' => 'This account has been permanently deleted.'], 403);
                }

                $originalDeactivatedAt = $matchedUser->deactivated_at;
                $originalScheduledDeletion = $matchedUser->scheduled_for_deletion;

                $matchedUser->update([
                    'status' => 'active',
                    'deactivated_at' => null,
                    'scheduled_for_deletion' => null,
                ]);

                // Log account reactivation
                UserActivityLog::log($matchedUser, UserActivityLog::ACTION_ACCOUNT_REACTIVATED, $matchedUser, $matchedUser->program_id, [
                    'system' => [
                        'previous_status' => 'deactivated',
                        'was_scheduled_for_deletion' => $originalScheduledDeletion ? true : false,
                        'days_deactivated' => $originalDeactivatedAt ? now()->diffInDays($originalDeactivatedAt) : 0,
                    ],
                ]);
            }

            // Email not verified yet
            if (!$matchedUser->hasVerifiedEmail()) {
                $hasActiveCode = $matchedUser->verification_code && $matchedUser->verification_code_expires_at && now()->lt($matchedUser->verification_code_expires_at);

                if (!$hasActiveCode) {
                    $matchedUser->sendEmailVerificationNotification();
                }

                $request->session()->put([
                    'verifying_user_id' => $matchedUser->id,
                    'verifying_email' => $credentials['email'],
                ]);

                return response()->json(
                    [
                        'verify' => true,
                        'email' => $credentials['email'],
                    ],
                    403,
                );
            }

            Auth::login($matchedUser, $request->boolean('remember'));
            RateLimiter::clear($throttleKey);
            $request->session()->regenerate();

            // Log successful login
            UserActivityLog::log($matchedUser, UserActivityLog::ACTION_LOGGED_IN, $matchedUser);

            return response()->json([
                'success' => true,
                'user' => [
                    'first_name' => $matchedUser->decrypted_first_name,
                    'last_name' => $matchedUser->decrypted_last_name,
                ],
                'redirect' => match ($matchedUser->account_type) {
                    User::ROLE_ADMIN, User::ROLE_SUPER_ADMIN => url('/admin/dashboard'),
                    default => url('/user/dashboard'),
                },
            ]);
        } catch (\Exception $e) {
            Log::error("Login error: {$e->getMessage()}", ['trace' => $e->getTraceAsString()]);
            return response()->json(['message' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        // Log logout activity before actually logging out
        if ($user) {
            UserActivityLog::log($user, UserActivityLog::ACTION_LOGGED_OUT, $user);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    protected function handleReactivation(User $user)
    {
        if ($user->status === 'deactivated') {
            $user->update([
                'status' => 'active',
                'deactivated_at' => null,
                'scheduled_for_deletion' => null,
            ]);

            return true;
        }
        return false;
    }
}

<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Models\User;

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
                'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$/'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        } catch (ValidationException $e) {
            return response()->json(
                [
                    'message' => $e->validator->errors()->first(),
                ],
                422,
            );
        }

        $throttleKey = Str::lower($credentials['email']) . '|' . $request->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            return response()->json(
                [
                    'message' => "Too many login attempts. Try again in {$seconds} seconds.",
                ],
                429,
            );
        }

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::hit($throttleKey);
            return response()->json(
                [
                    'message' => User::where('email', $credentials['email'])->exists() ? 'Incorrect password.' : 'No account found for that email.',
                ],
                401,
            );
        }

        $user = Auth::user();

        // Handle account status checks
        if ($user->status === 'deleted') {
            Auth::logout();
            return response()->json(['message' => 'This account has been permanently deleted.'], 403);
        }

        if ($user->status === 'deactivated' && $user->scheduled_for_deletion <= now()) {
            $user->update(['status' => 'deleted', 'deleted_at' => now()]);
            Auth::logout();
            return response()->json(['message' => 'This account has been permanently deleted.'], 403);
        }

        if ($user->status === 'deactivated') {
            $user->update([
                'status' => 'active',
                'deactivated_at' => null,
                'scheduled_for_deletion' => null,
            ]);
        }

        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            $hasActiveCode = $user->verification_code && $user->verification_code_expires_at && now()->lessThan($user->verification_code_expires_at);
            if (!$hasActiveCode) {
                $user->sendEmailVerificationNotification();
            }
            return response()->json(
                [
                    'verify' => true,
                    'email' => $user->email,
                ],
                403,
            );
        }

        RateLimiter::clear($throttleKey);
        $request->session()->regenerate();

        return response()->json([
            'success' => true,
            'user' => [
                'first_name' => $user->first_name,
            ],
            'redirect' => match ($user->account_type) {
                'admin', 'super_admin' => url('/admin/dashboard'),
                default => url('/user/dashboard'),
            },
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        Auth::logout();

        // Completely destroy session
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

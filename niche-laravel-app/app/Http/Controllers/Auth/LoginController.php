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
            $message = $e->validator->errors()->first(); // e.g., "The email field format is invalid."
            return back()->withInput()->with('showLoginFailModal', true)->with('login_fail_message', $message);
        }

        $throttleKey = Str::lower($credentials['email']) . '|' . $request->ip();
        if (RateLimiter::tooManyAttempts($throttleKey, 5)) {
            $seconds = RateLimiter::availableIn($throttleKey);
            $message = "Too many login attempts. Try again in {$seconds} second" . ($seconds === 1 ? '' : 's') . '.';

            return back()->withInput($request->only('email'))->with('showLoginFailModal', true)->with('login_fail_message', $message);
        }

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::hit($throttleKey);

            // Since email format already validated, we now check if the user exists.
            $userExists = User::where('email', $credentials['email'])->exists();

            $reason = $userExists ? 'Incorrect password.' : 'No account found for that email.';

            return back()->withInput($request->only('email'))->with('showLoginFailModal', true)->with('login_fail_message', $reason);
        }

        RateLimiter::clear($throttleKey);
        $request->session()->regenerate();

        $welcome = 'Welcome back, ' . Auth::user()->first_name . '!';

        if (Auth::user()->account_type === 'admin') {
            return redirect()->route('admin.dashboard')->with('showLoginSuccessModal', true)->with('login_success_message', $welcome);
        }

        return redirect()->route('home')->with('showLoginSuccessModal', true)->with('login_success_message', $welcome);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}

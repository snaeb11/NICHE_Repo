<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules\Password as PasswordRule;

class ResetPasswordController extends Controller
{
    /**
     * Show the reset password form.
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('layouts.auth.reset-password', [
            'token' => $token,
            'email' => $request->input('email'),
        ]);
    }

    /**
     * Handle password reset.
     */
    public function reset(Request $request)
    {
        try {
            $request->validate([
                'token' => ['required'],
                'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$/'],
                'password' => ['required', 'confirmed', PasswordRule::min(8)->mixedCase()->numbers()->symbols()],
            ]);
        } catch (ValidationException $e) {
            $message = $e->validator->errors()->first();
            return back()->withInput()->with('showResetPasswordFailModal', true)->with('reset_password_fail_message', $message);
        }

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($user) use ($request) {
            $user
                ->forceFill([
                    'password' => bcrypt($request->input('password')),
                ])
                ->save();
        });

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('showResetPasswordSuccessModal', true)->with('reset_password_success_message', __('Your password has been reset.'));
        }

        return back()->withInput()->with('showResetPasswordFailModal', true)->with('reset_password_fail_message', __($status));
    }
}

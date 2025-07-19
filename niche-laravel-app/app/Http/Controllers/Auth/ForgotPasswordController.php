<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    /**
     * Show the form for requesting a password reset link.
     */
    public function showLinkRequestForm()
    {
        return view('layouts.auth.forgot-password');
    }

    /**
     * Handle sending of the password reset email.
     */
    public function sendResetLinkEmail(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$/'],
            ]);
        } catch (ValidationException $e) {
            $message = $e->validator->errors()->first();
            return back()->withInput()->with('showForgotPasswordFailModal', true)->with('forgot_password_fail_message', $message);
        }

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('showForgotPasswordSuccessModal', true)->with('forgot_password_success_message', __($status));
        }

        return back()->withInput()->with('showForgotPasswordFailModal', true)->with('forgot_password_fail_message', __($status));
    }
}

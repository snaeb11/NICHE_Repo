<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    /**
     * Handle sending of the password reset email.
     */
    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$/'],
        ]);

        if ($validator->fails()) {
            if ($request->wantsJson()) {
                return response()->json(
                    [
                        'errors' => $validator->errors(),
                        'message' => 'Please enter a valid USeP email address',
                    ],
                    422,
                );
            }
            return back()->withInput()->with('showForgotPasswordFailModal', true)->with('forgot_password_fail_message', 'Please enter a valid USeP email address');
        }

        $emailHash = hash('sha256', Str::lower($request->email));
        $user = User::where('email_hash', $emailHash)->first();

        if ($user) {
            try {
                // Maintain your exact requested block
                $status = Password::broker()->sendResetLink(['email_hash' => $emailHash], function ($user, $token) {
                    $user->sendPasswordResetNotification($token);
                });
            } catch (\Exception $e) {
                if ($request->wantsJson()) {
                    return response()->json(
                        [
                            'message' => 'Failed to send reset link. Please try again.',
                        ],
                        500,
                    );
                }
                return back()->withInput()->with('showForgotPasswordFailModal', true)->with('forgot_password_fail_message', 'Failed to send reset link. Please try again.');
            }
        }

        // Handle both JSON and web responses
        if ($request->wantsJson()) {
            return response()->json([
                'message' => 'Password reset link sent!',
            ]);
        }
    }
}

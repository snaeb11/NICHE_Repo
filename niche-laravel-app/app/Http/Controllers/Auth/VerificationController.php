<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /**
     * Verify the 6-digit code entered by the user.
     */
    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|string|digits:6',
        ]);

        $email = $request->session()->get('verifying_email') ?? $request->session()->get('verification_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'No user found. Please try logging in again.'], 422);
        }

        // Check verification code exists and matches
        if (!$user->verification_code || !$user->verification_code_expires_at) {
            return response()->json(
                [
                    'message' => 'No active verification code found. Please request a new one.',
                ],
                422,
            );
        }

        if (now()->greaterThan($user->verification_code_expires_at)) {
            return response()->json(
                [
                    'message' => 'Verification code has expired. Please request a new one.',
                ],
                422,
            );
        }

        if (!hash_equals((string) $user->verification_code, $request->input('code'))) {
            return response()->json(
                [
                    'message' => 'The verification code is incorrect.',
                ],
                422,
            );
        }

        // Mark email as verified
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        // Clear verification data
        $user
            ->forceFill([
                'verification_code' => null,
                'verification_code_expires_at' => null,
            ])
            ->save();

        // Clear session
        $request->session()->forget('verifying_email');

        // Log the user in
        Auth::login($user);
        $request->session()->regenerate();

        return response()->json([
            'message' => 'Email verified successfully',
            'status' => 'success',
            'redirect' => route('user.dashboard'),
            'first_name' => $user->first_name,
        ]);
    }

    /**
     * Resend a new code to the user identified in session.
     * Your Notification should send the code; see note below.
     */
    public function resend(Request $request)
    {
        $email = $request->session()->get('verifying_email');
        $user = User::where('email', $email)->first();

        if ($user->hasVerifiedEmail()) {
            return response()->json(['error' => 'Email already verified'], 400);
        }

        // Generate new 6-digit code (keep leading zeros)
        $code = str_pad((string) random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $user
            ->forceFill([
                'verification_code' => $code,
                'verification_code_expires_at' => now()->addMinutes(15),
            ])
            ->save();

        $user->sendEmailVerificationNotification();
        return response()->json(['message' => 'Verification email resent']);
    }
}

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
            'code' => 'required|string|size:6',
        ]);

        $email = $request->session()->get('verifying_email');
        $user = User::where('email', $email)->first();

        $storedCode = (string) ($user->getAttribute('verification_code') ?? '');
        $expiresAt = $user->getAttribute('verification_code_expires_at');
        $submittedCode = (string) $request->input('code');

        // Basic guards
        if ($storedCode === '') {
            return response()->json(['message' => 'No verification code found. Please resend.'], 422);
        }

        if (!$expiresAt || now()->greaterThan($expiresAt)) {
            return response()->json(['message' => 'Verification code expired. Please resend.'], 422);
        }

        if ($submittedCode !== $storedCode) {
            return response()->json(['message' => 'Incorrect code.'], 422);
        }

        // Mark email verified (only if not already)
        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        // Clear the table
        $user
            ->forceFill([
                'verification_code' => null,
                'verification_code_expires_at' => null,
            ])
            ->save();

        // Log the user in (they were a guest)
        Auth::login($user);
        $request->session()->regenerate();

        // Clear session helper
        $request->session()->forget('verifying_email');

        return response()->json([
            'message' => 'Email verified successfully.',
            'status' => 'success',
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

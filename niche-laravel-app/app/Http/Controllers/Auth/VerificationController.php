<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    public function verifyCode(Request $request)
    {
        $request->validate(['code' => 'required|digits:6']);

        $email = $request->session()->get('verifying_email');
        $user = User::where('email', $email)->first();

        if (!$user || !$user->verification_code || now()->greaterThan($user->verification_code_expires_at) || $request->code !== $user->verification_code) {
            return response()->json(['message' => 'Invalid or expired code.'], 422);
        }

        $user->markEmailAsVerified();
        $user->verification_code = null;
        $user->verification_code_expires_at = null;
        $user->save();

        Auth::login($user);
        $request->session()->regenerate();

        $request->session()->forget('verifying_email');

        return response()->json([
            'message' => 'Email verified successfully.',
            'redirect' => route('home'),
        ]);
    }

    public function resend(Request $request)
    {
        $email = $request->session()->get('verifying_email');
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['error' => 'Session expired'], 401);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['error' => 'Email already verified'], 400);
        }

        $user->verification_code = rand(100000, 999999);
        $user->verification_code_expires_at = now()->addMinutes(15);
        $user->save();

        $user->sendEmailVerificationNotification();
        return response()->json(['message' => 'Verification email resent']);
    }
}

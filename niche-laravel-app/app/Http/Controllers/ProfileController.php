<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProfileController extends Controller
{
    public function showDashboard()
    {
        $user = auth()->user();
        $undergraduate = Program::undergraduate()->orderBy('name')->get();
        $graduate = Program::graduate()->orderBy('name')->get();

        return view('layouts.user-layout.user-dashboard', [
            'undergraduate' => $undergraduate,
            'graduate' => $graduate,
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id',
        ]);

        auth()->user()->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
        ]);
    }

    public function deactivate_account(Request $request)
    {
        $user = $request->user();

        // Check if user is already in a deactivated state
        if ($user->status !== 'active') {
            return response()->json(
                [
                    'success' => false,
                    'message' => match ($user->status) {
                        'deactivated' => 'Account is already deactivated',
                        'deleted' => 'Account has been permanently deleted',
                        default => 'Account is not in an active state',
                    },
                ],
                400,
            );
        }

        // Perform the deactivation
        $user->update([
            'status' => 'deactivated',
            'deactivated_at' => now(),
            'scheduled_for_deletion' => now()->addDays(30),
        ]);

        // Revoke all active tokens (if using Sanctum/Passport)
        $user->tokens()->delete();

        // Invalidate remember token
        $user->update(['remember_token' => null]);

        return response()->json([
            'success' => true,
            'message' => 'Account deactivated. You have until ' . $user->scheduled_for_deletion->format('M j, Y') . ' to reactivate by logging in.',
            'deadline' => $user->scheduled_for_deletion->format('Y-m-d\TH:i:s\Z'),
            'reactivation_method' => 'Simply log in with your credentials to reactivate',
        ]);
    }
}

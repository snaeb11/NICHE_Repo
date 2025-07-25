<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showAdminDashboard()
    {
        $user = auth()->user();

        return view('layouts.admin-layout.admin-dashboard', [
            'user' => $user,
        ]);
    }
    public function showUserDashboard()
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

        if (!$user) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'User not authenticated',
                ],
                401,
            );
        }

        // Update all deactivation fields
        $updateSuccess = $user->update([
            'status' => 'deactivated',
            'deactivated_at' => now(),
            'scheduled_for_deletion' => now()->addDays(30),
            'remember_token' => null,
        ]);

        if (!$updateSuccess) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Failed to update user record',
                ],
                500,
            );
        }

        // Logout the user
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Account deactivated successfully. You will be redirected shortly.',
            'redirect' => url('/'),
        ]);
    }
}

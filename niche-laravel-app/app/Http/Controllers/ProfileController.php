<?php

namespace App\Http\Controllers;

use App\Models\UserActivityLog;
use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showAdminDashboard()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Check if the user is logged in and has permission
        if (!$user || !$user->hasPermission('view-dashboard')) {
            return redirect()->route('home')->with('error', 'You are not authorized to access the admin dashboard.');
        }

        $role = $user->account_type ?? 'admin';

        $undergraduate = Program::undergraduate()->orderBy('name')->get();
        $graduate = Program::graduate()->orderBy('name')->get();

        return view('layouts.admin-layout.admin-dashboard', [
            'page' => 'home',
            'role' => $role,
            'undergraduate' => $undergraduate,
            'graduate' => $graduate,
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

        $user = auth()->user();

        // Store original values before update
        $originalValues = [
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'program_id' => $user->program_id,
        ];

        $user->update([
            'first_name' => Crypt::encrypt($validated['first_name']),
            'last_name' => Crypt::encrypt($validated['last_name']),
            'program_id' => $validated['program_id'],
        ]);

        // Determine which fields changed
        $changedFields = [];
        foreach ($originalValues as $field => $originalValue) {
            $changedFields[$field] = $originalValue !== $user->$field;
        }

        // Log profile update activity
        UserActivityLog::log($user, UserActivityLog::ACTION_PROFILE_UPDATED, $user, $user->program_id, [
            'changes' => $changedFields,
        ]);

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

        // Store relevant info before updating
        $originalStatus = $user->status;
        $deletionDate = now()->addDays(30);

        $updateSuccess = $user->update([
            'status' => 'deactivated',
            'deactivated_at' => now(),
            'scheduled_for_deletion' => $deletionDate,
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

        // Log deactivation activity
        UserActivityLog::log($user, UserActivityLog::ACTION_ACCOUNT_DEACTIVATED, $user, $user->program_id, [
            'system' => [
                'previous_status' => $originalStatus,
                'scheduled_deletion_date' => $deletionDate->format('Y-m-d'),
                'retention_days' => 30,
            ],
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json([
            'success' => true,
            'message' => 'Account deactivated successfully. You will be redirected shortly.',
            'redirect' => url('/'),
        ]);
    }

    //checker for same amoghus balls
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed', // Requires `new_password_confirmation`
            'first_name' => ['required', 'string', 'regex:/^[A-Za-z\s\'\-]+$/'],
            'last_name' => ['required', 'string', 'regex:/^[A-Za-z\s\'\-]+$/'],
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Your current password is incorrect.',
            ], 422);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
            'first_name' => Crypt::encrypt($request->first_name),
            'last_name' => Crypt::encrypt($request->last_name),
        ]);

        // Optional: Log update activity
        UserActivityLog::log($user, UserActivityLog::ACTION_PROFILE_UPDATED, $user, $user->program_id, [
            'updated_password' => true,
            'updated_name' => true,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Password and profile information updated successfully!',
        ]);
    }

}

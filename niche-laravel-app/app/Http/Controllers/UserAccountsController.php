<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserAccountsController extends Controller
{
    public function getAllUsers(Request $request)
    {
        $users = User::with('program')->get();

        // Transform the result
        $formatted = $users->map(function ($user) {
            $data = [
                'id' => $user->id,
                'first_name' => $user->decrypted_first_name,
                'last_name' => $user->decrypted_last_name,
                'email' => $user->email,
                'account_type' => ucfirst($user->account_type),
                'status' => ucfirst($user->status),
                'program_id' => $user->program_id,
            ];

            if ($user->account_type === 'student' && $user->program) {
                $data['program'] = $user->program->name;
                $data['degree'] = $user->program->degree;
            } else {
                $data['program'] = null;
                $data['degree'] = null;
            }

            return $data;
        });

        return response()->json($formatted);
    }

    public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'permissions' => 'nullable|string',
        ]);

        $user = new User();
        $user->first_name   = $validated['first_name'];
        $user->last_name    = $validated['last_name'];
        $user->email        = $validated['email'];
        $user->account_type = 'admin';
        $user->status       = 'active';
        $user->password     = bcrypt('default_password');
        $user->permissions  = $validated['permissions'] ?? '';

        $user->save();

        return response()->json([
            'message' => 'Admin created successfully',
            'user'    => $user,
        ]);
    } catch (ValidationException $e) {
        return response()->json([
            'errors' => $e->errors(),
        ], 422);
    }
    }

    public function updatePermissions(Request $request, $userId)
    {
        try {
            $validated = $request->validate([
                'permissions' => 'required|array',
                'permissions.*' => 'string'
            ]);

            $user = User::findOrFail($userId);
            
            $hyphenatedPermissions = array_map(function($permission) {
                return str_replace('_', '-', $permission);
            }, $validated['permissions']);
            
            $permissionsString = implode(', ', $hyphenatedPermissions);
            
            $user->update([
                'permissions' => $permissionsString
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Permissions updated successfully',
                'permissions' => $user->permissions
            ]);

        } catch (\Exception $e) {
            \Log::error('Permission update failed: ' . $e->getMessage());
            return response()->json([
                'error' => 'Server error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function getUserPermissions(User $user)
    {
        $currentUser = auth()->user();
        
        $currentPermissions = array_map(
            fn($p) => strtolower(trim($p)),
            explode(',', $currentUser->permissions)
        );

        \Log::debug('Final permission verification', [
            'user' => $currentUser->id,
            'permissions' => $currentPermissions,
            'check_for' => 'edit-permissions',
            'found' => in_array('edit-permissions', $currentPermissions)
        ]);

        if (!in_array('edit-permissions', $currentPermissions)) {
            \Log::error('Permission check failed despite debug showing permission exists');
            return response()->json([
                'error' => 'permission-check-failed',
                'debug_info' => [
                    'raw_permissions' => $currentUser->permissions,
                    'processed_permissions' => $currentPermissions,
                    'missing_permission' => 'edit-permissions',
                    'check_type' => gettype($currentPermissions[0])
                ]
            ], 403);
        }

        $targetPermissions = array_map(
            fn($p) => strtolower(trim($p)),
            explode(',', $user->permissions)
        );

        return response()->json([
            'permissions' => $targetPermissions,
            'debug_note' => 'Successfully loaded permissions'
        ]);
    }

}

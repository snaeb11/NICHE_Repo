<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAccountsController extends Controller
{
    public function getAllUsers(Request $request)
    {
        $users = User::with('program')->get();

        // Transform the result
        $formatted = $users->map(function ($user) {
            $data = [
                'id' => $user->id,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'account_type' => $user->account_type,
                'status' => $user->status,
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
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'permissions' => 'nullable|array',
        ]);

        $user = new User();
        $user->first_name = $validated['first_name'];
        $user->last_name  = $validated['last_name'];
        $user->email      = $validated['email'];
        $user->account_type = 'admin'; // default admin
        $user->status     = 'active';
        $user->password   = bcrypt('default_password'); // You may want to set a default or random one

        // Convert permission array to JSON
        $user->permissions = json_encode($validated['permissions'] ?? []);

        $user->save();

        return response()->json([
            'message' => 'Admin created successfully',
            'user'    => $user,
        ]);
    }

}

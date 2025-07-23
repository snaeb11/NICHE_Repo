<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

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

}

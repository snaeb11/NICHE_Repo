<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Program;

class AdminController extends Controller
{
    
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Check if the user is logged in and has permission
        if (!$user || !$user->hasPermission('view-dashboard')) {
            return redirect()->route('home')->with('error', 'You are not authorized to access the admin dashboard.');
        }

        $role = $user->account_type ?? 'admin';

        $undergraduate = Program::undergraduate()->orderBy('name')->get();
        $graduate      = Program::graduate()->orderBy('name')->get();

        return view('layouts.admin-layout.admin-dashboard', [
            'page'          => 'home',
            'role'          => $role,
            'undergraduate' => $undergraduate,
            'graduate'      => $graduate,
        ]);
    }

    

    public function updatePermissions(Request $request, $userId)
{
    $user = User::findOrFail($userId);
    $currentUser = auth()->user();

    // Debug output
    \Log::info('Updating permissions', [
        'admin' => $currentUser->id,
        'target' => $userId,
        'permissions' => $request->permissions
    ]);

    // Convert array to comma-separated string
    $permissionsString = implode(', ', $request->permissions);
    
    $user->update([
        'permissions' => $permissionsString
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Permissions updated',
        'permissions' => $user->permissions
    ]);
}

}

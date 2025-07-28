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

}

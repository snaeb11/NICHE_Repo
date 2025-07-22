<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Program;

class AdminController extends Controller
{
    public function index()
    {
        // You can pass user role if needed for dynamic sections
        $role = Auth::check() ? Auth::user()->getAttribute('account_type') : 'admin';

        return view('layouts.admin.admin-dashboard', [
            'page' => 'home',
            'role' => $role,
        ]);
    }

    public function showRegistrationForm()
    {
        $undergraduate = Program::undergraduate()->orderBy('name')->get();
        $graduate = Program::graduate()->orderBy('name')->get();

        return view('layouts.admin-layout.admin-dashboard', [
            'undergraduate' => $undergraduate,
            'graduate' => $graduate,
        ]);
    }
}

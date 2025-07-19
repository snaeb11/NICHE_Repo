<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}

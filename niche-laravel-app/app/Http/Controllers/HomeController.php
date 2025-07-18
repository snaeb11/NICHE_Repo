<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // You can pass user role if needed for dynamic sections
        $role = Auth::check() ? Auth::user()->account_type : 'guest';

        return view('layouts.landing.index', [
            'page' => 'home',
            'role' => $role,
        ]);
    }
}

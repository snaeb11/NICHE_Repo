<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Program;

class AdminController extends Controller
{
    
    public function index()
    {

        $role = Auth::check() ? Auth::user()->account_type : 'admin';

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

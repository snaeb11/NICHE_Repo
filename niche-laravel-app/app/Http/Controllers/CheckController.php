<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index()
    {
        return view('layouts.admin-layout.admin');
    }

    public function button()
    {
        return view('buttonCheck');
    }

    public function user()
    {
        return view('user');
    }
}

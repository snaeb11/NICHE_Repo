<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('layouts.landing.index', [
            'page' => 'home'
        ]);
    }
}

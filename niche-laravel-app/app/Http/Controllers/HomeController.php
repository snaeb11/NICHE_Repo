<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return View::make('index')
            ->with('name', 'Vunc')
            ->with('lastName', 'Arse')
            ->with('who', 'spider-man');

    }
}

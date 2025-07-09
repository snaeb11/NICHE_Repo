<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function index(){
        return view('admin');
    }

    public function button(){
        return view('buttonCheck');
    }
}

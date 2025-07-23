<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserAccountsController extends Controller
{
    public function getAllUsers()
    {
        return response()->json(User::all());
    }

}

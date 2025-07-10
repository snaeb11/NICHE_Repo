<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function showRegistrationForm()
    {
        $undergraduate = Program::undergraduate()->orderBy('name')->get();
        $graduate = Program::graduate()->orderBy('name')->get();

        return view('layouts.auth.signup', [
            'undergraduate' => $undergraduate,
            'graduate' => $graduate,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$/'],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'program_id' => 'required|exists:programs,id',
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'program_id' => $validated['program_id'],
            'account_type' => User::ROLE_STUDENT,
            'status' => 'active',
        ]);

        // You might want to send email verification here
        // $user->sendEmailVerificationNotification();

        // Redirect after successful registration
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
}

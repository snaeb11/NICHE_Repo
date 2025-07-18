<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

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
        // Validate email format first
        $emailValidator = Validator::make($request->only('email'), [
            'email' => ['required', 'string', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@usep\.edu\.ph$/'],
        ]);

        if ($emailValidator->fails()) {
            return redirect()->back()->withInput()->with('invalid_email', true);
        }

        // Check if email is already taken
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->with('email_taken', true);
        }

        // Validate the rest of the fields
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
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

        event(new Registered($user));
        $request->session()->put('verifying_email', $user->email);

        return redirect()
            ->route('signup')
            ->with([
                'account_created' => true,
                'account_name' => $validated['first_name'] . ' ' . $validated['last_name'],
                'account_email' => $validated['email'],
                'show_verification' => true,
            ]);
    }
}

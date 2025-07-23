<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class ProfileController extends Controller
{
    public function showDashboard()
    {
        $user = auth()->user();
        $undergraduate = Program::undergraduate()->orderBy('name')->get();
        $graduate = Program::graduate()->orderBy('name')->get();

        return view('layouts.user-layout.user-dashboard', [
            'undergraduate' => $undergraduate,
            'graduate' => $graduate,
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id',
        ]);

        auth()->user()->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully',
        ]);
    }
}

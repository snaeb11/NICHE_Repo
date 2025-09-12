<?php

namespace App\Http\Controllers;

use App\Models\Adviser;
use Illuminate\Http\Request;

class AdviserManagementController extends Controller
{
    public function index()
    {
        $this->authorizeModify();
        return response()->json(Adviser::with('program')->orderBy('name')->get());
    }

    public function store(Request $request)
    {
        $this->authorizeModify();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id',
        ]);
        $adviser = Adviser::create($validated);
        return response()->json($adviser->load('program'), 201);
    }

    public function update(Request $request, Adviser $adviser)
    {
        $this->authorizeModify();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'program_id' => 'required|exists:programs,id',
        ]);
        $adviser->update($validated);
        return response()->json($adviser->load('program'));
    }

    public function destroy(Adviser $adviser)
    {
        $this->authorizeModify();
        $adviser->delete();
        return response()->json(['deleted' => true]);
    }

    private function authorizeModify(): void
    {
        $user = auth()->user();
        abort_unless($user && $user->hasPermission('modify-advisers-list'), 403);
    }
}

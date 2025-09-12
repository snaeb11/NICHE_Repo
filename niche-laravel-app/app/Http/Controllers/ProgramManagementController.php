<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramManagementController extends Controller
{
    public function index()
    {
        $this->authorizeModify();
        return response()->json(Program::orderBy('degree')->orderBy('name')->get());
    }

    public function store(Request $request)
    {
        $this->authorizeModify();
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:programs,name',
            'degree' => 'required|string|in:Undergraduate,Graduate',
        ]);
        $program = Program::create($validated);
        return response()->json($program, 201);
    }

    public function update(Request $request, Program $program)
    {
        $this->authorizeModify();
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:programs,name,' . $program->id,
            'degree' => 'required|string|in:Undergraduate,Graduate',
        ]);
        $program->update($validated);
        return response()->json($program);
    }

    public function destroy(Program $program)
    {
        $this->authorizeModify();
        $program->delete();
        return response()->json(['deleted' => true]);
    }

    private function authorizeModify(): void
    {
        $user = auth()->user();
        abort_unless($user && $user->hasPermission('modify-programs-list'), 403);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'authors'        => 'required|string',
            'adviser'        => 'required|string|max:255',
            'abstract'       => 'required|string',
            'program_id'     => 'required|exists:programs,id',
            'academic_year'  => 'required|integer',
        ]);

        // Generate a unique inventory number
        $inventoryNumber = 'INV-' . strtoupper(uniqid());

        Inventory::create([
            'submission_id'     => 1, // You may change this dynamically
            'title'             => $validated['title'],
            'authors'           => $validated['authors'],
            'adviser'           => $validated['adviser'],
            'abstract'          => $validated['abstract'],
            'program_id'        => $validated['program_id'],
            'archived_path'     => 'N/A',
            'original_filename' => 'N/A',
            'file_size'         => 0,
            'file_hash'         => 'N/A',
            'academic_year'     => $validated['academic_year'],
            'inventory_number'  => $inventoryNumber,
            //'archived_by'       => auth()->id() ?? 1, // fallback to 1 if no auth
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        return redirect()->back()->with('success', 'Inventory added successfully!');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Inventory::with('program')
            ->where(function ($q) use ($query) {
            $q->where('title', 'like', "%$query%")
                ->orWhere('authors', 'like', "%$query%")
                ->orWhere('abstract', 'like', "%$query%")
                ->orWhere('adviser', 'like', "%$query%")
                ->orWhereHas('program', function ($q) use ($query) {
                    $q->where('name', 'like', "%$query%");
                })
                ->orWhere('academic_year', 'like', "%$query%");
            })
            ->get();

        return view('layouts.landing.index', compact('results', 'query'));
    }
}

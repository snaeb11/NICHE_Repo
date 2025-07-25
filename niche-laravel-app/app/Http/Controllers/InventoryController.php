<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Program;

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
            'archived_by'       => 1, // fallback to 1 if no auth
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);

        return redirect()->back()->with('success', 'Inventory added successfully!');
    }

// search results for landing page search
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

// inventory filters
    public function filtersInv()
    {
        $years = Inventory::distinct()->pluck('academic_year');
        return response()->json(['years' => $years]);
    }

// inventory table populate
    // inventory table populate
public function getInventoryData(Request $request)
{
    $query = Inventory::with(['program', 'submission.submitter', 'submission.reviewer', 'archivist']);

    if ($request->program) {
        $query->where('program_id', $request->program);
    }

    if ($request->year) {
        $query->where('academic_year', $request->year);
    }

    return $query->get()->map(fn ($inv) => [
        'id'               => $inv->id,
        'title'            => $inv->title,
        'authors'          => $inv->authors,
        'adviser'          => $inv->adviser,
        'abstract'         => $inv->abstract,
        'program'          => optional($inv->program)->name ?? '—',
        'academic_year'    => $inv->academic_year,
        'inventory_number' => $inv->inventory_number,
        'archived_at'      => optional($inv->archived_at)->toDateTimeString(),
        'archiver'         => optional($inv->archivist)->name ?? '—',

        // Rules you asked for:
        'submitted_by' => optional($inv->submission)->submitter->full_name ?? '—',
        'reviewed_by'  => $inv->submission
            ? optional($inv->submission->reviewer)->full_name ?? '—'
            : optional($inv->archivist)->full_name ?? '—',
    ]);
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Program;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;

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

        $inventoryNumber = 'INV-' . strtoupper(uniqid());

        Inventory::create([
            'submission_id'     => 1, // Dynamically assign in real usage
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
            'archived_by'       => 1,
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

    public function filtersInv()
    {
        $years = Inventory::distinct()->pluck('academic_year');
        return response()->json(['years' => $years]);
    }

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
            'submitted_by'     => optional($inv->submission)->submitter->full_name ?? '—',
            'reviewed_by'      => $inv->submission
                ? optional($inv->submission->reviewer)->full_name ?? '—'
                : optional($inv->archivist)->full_name ?? '—',
        ]);
    }

    public function exportInventoriesDocx()
    {
        $inventories = Inventory::with('program')->get();

        $templatePath = storage_path('app/templates/inventory_template.docx');
        if (!file_exists($templatePath)) {
            return response()->json(['error' => 'Template not found.'], 404);
        }

        $template = new TemplateProcessor($templatePath);
        $template->cloneRow('submission_id', $inventories->count());

        foreach ($inventories as $index => $item) {
            $i = $index + 1;

            $template->setValue("submission_id#$i", $item->submission_id);
            $template->setValue("title#$i", $item->title);
            $template->setValue("authors#$i", $item->authors);
            $template->setValue("adviser#$i", $item->adviser);
            $template->setValue("program#$i", $item->program->name ?? '—');
            $template->setValue("academic_year#$i", $item->academic_year);
            $template->setValue("inventory_number#$i", $item->inventory_number);
        }

        $filename = 'Inventory_Report_' . now()->format('Ymd_His') . '.docx';
        $exportPath = storage_path("app/exports/{$filename}");

        if (!Storage::exists('exports')) {
            Storage::makeDirectory('exports');
        }

        $template->saveAs($exportPath);

        return response()->download($exportPath)->deleteFileAfterSend(true);
    }
}

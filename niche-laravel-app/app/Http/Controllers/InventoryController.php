<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Program;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;

class InventoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'authors'       => 'required|string',
            'adviser'       => 'required|string|max:255',
            'abstract'      => 'required|string',
            'program_id'    => 'required|exists:programs,id',
            'academic_year' => 'required|integer',
            'document'      => 'required|file|mimes:pdf|max:10240',
        ]);

        // load the program so we can read its name
        $program = \App\Models\Program::findOrFail($validated['program_id']);
        $programCode = $program->name ?? 'GEN';        // e.g. "BSIT"
        $year        = $validated['academic_year'];    // e.g. 2023

        // next sequential number for this program-year pair
        $latest = \App\Models\Inventory::where('inventory_number', 'like', "{$programCode}-{$year}-%")
                                    ->orderBy('inventory_number', 'desc')
                                    ->value('inventory_number');

        $nextSerial = 1;
        if ($latest) {
            preg_match("/-(\d+)$/", $latest, $m);
            $nextSerial = ((int) $m[1]) + 1;
        }

        $inventoryNumber = sprintf('%s-%d-%03d', $programCode, $year, $nextSerial);

            // Handle file upload
            $file = $request->file('document');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $filePath = 'submissions/' . $fileName;

            Storage::put($filePath, file_get_contents($file));
            
        \App\Models\Inventory::create([
            'submission_id'         => null,
            'title'                 => $validated['title'],
            'authors'               => $validated['authors'],
            'adviser'               => $validated['adviser'],
            'abstract'              => $validated['abstract'],
            'program_id'            => $validated['program_id'],
            'manuscript_path'       => $filePath,
            'manuscript_filename'   => $file->getClientOriginalName(),
            'manuscript_size'       => $file->getSize(),
            'manuscript_mime'       => $file->getMimeType(),
            'academic_year'         => $validated['academic_year'],
            'inventory_number'      => $inventoryNumber,
            'archived_by'           => auth()->id() ?? 1,
            'archived_at'           => now(),
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

        return $query->get()->map(
            fn($inv) => [
                'id'                    => $inv->id,
                'title'                 => $inv->title,
                'authors'               => $inv->authors,
                'adviser'               => $inv->adviser,
                'abstract'              => $inv->abstract,
                'program'               => optional($inv->program)->name ?? '—',
                'academic_year'         => $inv->academic_year,
                'manuscript_path'       => $inv->manuscript_path,
                'manuscript_filename'   => $inv->manuscript_filename,
                'manuscript_size'       => $inv->manuscript_size,
                'manuscript_mime'       => $inv->manuscript_mime,
                'inventory_number'      => $inv->inventory_number,
                'archived_at'           => optional($inv->archived_at)->toDateTimeString(),
                'archiver'              => optional($inv->archivist)->name ?? '—',
                'submitted_by'          => optional($inv->submission)->submitter->full_name ?? '—',
                'reviewed_by'           => $inv->submission ? optional($inv->submission->reviewer)->full_name ?? '—' : optional($inv->archivist)->full_name ?? '—',
                'can_edit'              => $inv->submission_id === null
                    && auth()->user()?->hasPermission('edit-inventory'),
            ],
        );
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

    public function exportInventoriesPdf()
    {
        $inventories = Inventory::with('program')->get();
        $year = date('Y');
        $timestamp = now()->format('Ymd_His');

        $logo = base64_encode(file_get_contents(public_path('assets/usep-logo.png')));
        $footerImage = base64_encode(file_get_contents(public_path('assets/full-footer.png')));

        $output =
            '
    <html>
    <head>
        <style>
            @page {
                size: A4 landscape;
                margin: 120px 40px 100px 40px;
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 11px;
            }

            header {
                position: fixed;
                top: -100px;
                left: 0;
                right: 0;
                height: 100px;
                text-align: center;
                display: block;
            }

            .header-content {
                display: block;
            }

            header img {
                width: 100px;
            }

            .usep-name {
                font-family: "Old English Text MT", serif;
                font-size: 20px;
            }

            footer {
                position: fixed;
                bottom: -80px;
                left: 0;
                right: 0;
                height: 80px;
                text-align: center;
            }

            footer img {
                width: 100%;
                height: auto;
                border: none;
            }

            .first-page-header {
                display: block;
            }

            .spacer {
                height: 110px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
                page-break-inside: auto;
            }

            thead {
                display: table-header-group;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }

            th, td {
                border: 1px solid #ccc;
                padding: 6px;
                font-size: 11px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <!-- Header only on first page -->
        <div class="first-page-header">
            <header>
                <div class="header-content">
                    <img src="data:image/png;base64,' .
            $logo .
            '" alt="USEP Logo"><br>
                    <div class="usep-name">University of Southeastern Philippines</div>
                    <i>Office of the Student Affairs and Services - Tagum-Mabini Campus</i><br>
                    <h2>Inventory Report - ' .
            $year .
            '</h2>
                </div>
            </header>
            <div class="spacer"></div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Submission ID</th>
                    <th>Title</th>
                    <th>Authors</th>
                    <th>Adviser</th>
                    <th>Program</th>
                    <th>Year</th>
                    <th>Inventory #</th>
                </tr>
            </thead>
            <tbody>';

        foreach ($inventories as $inv) {
            $output .=
                '
                <tr>
                    <td>' .
                $inv->submission_id .
                '</td>
                    <td>' .
                $inv->title .
                '</td>
                    <td>' .
                $inv->authors .
                '</td>
                    <td>' .
                $inv->adviser .
                '</td>
                    <td>' .
                ($inv->program->name ?? '—') .
                '</td>
                    <td>' .
                $inv->academic_year .
                '</td>
                    <td>' .
                $inv->inventory_number .
                '</td>
                </tr>';
        }

        $output .=
            '
            </tbody>
        </table>

        <!-- Footer appears on ALL pages -->
        <footer>
            <img src="data:image/png;base64,' .
            $footerImage .
            '" alt="Full Footer">
        </footer>

    </body>
    </html>';

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->loadHtml($output);
        $dompdf->render();

        return $dompdf->stream("Inventory_Report_{$timestamp}.pdf");
    }

    //update func :33
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'authors'       => 'required|string',
            'adviser'       => 'required|string|max:255',
            'abstract'      => 'required|string',
            'program_id'    => 'required|exists:programs,id',
            'academic_year' => 'required|integer',
        ]);

        $inventory = Inventory::findOrFail($id);

        // Only update the inventory number if program or year changed
        if ($inventory->program_id != $validated['program_id'] || 
            $inventory->academic_year != $validated['academic_year']) {
            
            $program = Program::findOrFail($validated['program_id']);
            $programCode = $program->name ?? 'GEN';
            $year = $validated['academic_year'];

            // Get the next sequential number for the new program-year pair
            $latest = Inventory::where('inventory_number', 'like', "{$programCode}-{$year}-%")
                            ->orderBy('inventory_number', 'desc')
                            ->value('inventory_number');

            $nextSerial = 1;
            if ($latest) {
                preg_match("/-(\d+)$/", $latest, $m);
                $nextSerial = ((int) $m[1]) + 1;
            }

            $inventoryNumber = sprintf('%s-%d-%03d', $programCode, $year, $nextSerial);
            $inventory->inventory_number = $inventoryNumber;
        }

        $inventory->update([
            'title'         => $validated['title'],
            'authors'       => $validated['authors'],
            'adviser'       => $validated['adviser'],
            'abstract'      => $validated['abstract'],
            'program_id'    => $validated['program_id'],
            'academic_year' => $validated['academic_year'],
        ]);

        return response()->json(['success' => 'Inventory updated successfully!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\InventoryExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;   // <-- add this

class InventoryExportController extends Controller
{
    public function pdf(): StreamedResponse          // <-- change here
    {
        $inventories = Inventory::with('program')->get();
        $pdf = Pdf::loadView('exports.inventory_pdf', compact('inventories'))
            ->setPaper('a4', 'landscape');

        return response()->streamDownload(
            fn () => print($pdf->output()),
            'inventories.pdf'
        );
    }

    public function excel(): BinaryFileResponse
    {
        return Excel::download(new InventoryExport, 'inventories.xlsx');
    }
}
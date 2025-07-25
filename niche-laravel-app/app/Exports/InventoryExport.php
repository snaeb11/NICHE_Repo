<?php

namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return Inventory::query()->with('program');
    }

    public function headings(): array
    {
        return [
            'ID',
            'Submission ID',
            'Title',
            'Authors',
            'Adviser',
            'Abstract',
            'Program',
            'Academic Year',
            'Inventory Number',
            'Archived At',
        ];
    }
}
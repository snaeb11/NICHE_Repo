<?php

namespace App\Imports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class InventoryImport implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;

    /**
     * Validation rules for every row
     */
    public function rules(): array
    {
        return [
            'submission_id'   => 'required|integer',
            'title'           => 'required|string|max:255',
            'authors'         => 'required|string',
            'adviser'         => 'required|string|max:255',
            'abstract'        => 'required|string',
            'program_id'      => 'required|integer|exists:programs,id',
            'academic_year'   => 'required|integer|min:2000|max:3000',
            'inventory_number'=> 'required|string|unique:inventory,inventory_number',
        ];
    }

    /**
     * Custom attribute names for nicer error messages
     */
    public function customValidationAttributes()
    {
        return [
            'submission_id'   => 'Submission ID',
            'title'           => 'Title',
            'authors'         => 'Authors',
            'adviser'         => 'Adviser',
            'abstract'        => 'Abstract',
            'program_id'      => 'Program',
            'academic_year'   => 'Academic Year',
            'inventory_number'=> 'Inventory Number',
        ];
    }

    /**
     * Map every valid row to an Eloquent model
     */
    public function model(array $row)
    {
        $fileName = $row['original_filename'] ?? 'imported_file.xlsx';
        $filePath = 'inventory/' . uniqid() . '_' . $fileName;
        Storage::disk('local')->put($filePath, 'dummy');

        return new Inventory([
            'submission_id'   => $row['submission_id'],
            'title'           => $row['title'],
            'authors'         => $row['authors'],
            'adviser'         => $row['adviser'],
            'abstract'        => $row['abstract'],
            'program_id'      => $row['program_id'],
            'archived_path'   => $filePath,
            'original_filename' => $fileName,
            'file_size'       => Storage::disk('local')->size($filePath),
            'file_hash'       => Hash::make($filePath),
            'academic_year'   => $row['academic_year'],
            'inventory_number'=> $row['inventory_number'],
            'archived_by'     => 1,
            'archived_at'     => now(),
        ]);
    }
}
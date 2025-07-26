<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class BackupController extends Controller
{
    /* ───────────────────────────────
       1. Create & download a full dump
    ─────────────────────────────── */
    public function download(): StreamedResponse
    {
        $fileName = 'backup_' . now()->format('Y-m-d_H-i-s') . '.sql';

        return response()->streamDownload(function () {
            $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'");
            $tables = array_map(fn($table) => $table->name, $tables);

            $output = fopen('php://output', 'w');

            foreach ($tables as $table) {
                $this->dumpTable($table, $output);
            }

            fclose($output);
        }, $fileName);
    }


    /* ───────────────────────────────
       2. Restore from .sql / .sqlite
    ─────────────────────────────── */
    public function restore(Request $request)
    {
        $request->validate(['backup_file' => 'required|file|mimes:sql,sqlite']);

        $path = $request->file('backup_file')->getRealPath();
        DB::unprepared(file_get_contents($path));

        return back()->with('success', 'Database restored successfully!');
    }

    /* ───────────────────────────────
       3. Backup + TRUNCATE (soft-reset)
    ─────────────────────────────── */
    public function backupAndReset()
    {
        // 1. Create a dump on disk (optional)
        $fileName = 'backup_reset_' . now()->format('Y-m-d_H-i-s') . '.sql';
        $dumpPath = storage_path('app/backups/' . $fileName);
        if (!is_dir(dirname($dumpPath))) mkdir(dirname($dumpPath), 0755, true);

        file_put_contents($dumpPath, '');
        $output = fopen($dumpPath, 'w');
        foreach (DB::connection()->getDoctrineSchemaManager()->listTableNames() as $table) {
            $this->dumpTable($table, $output);
        }
        fclose($output);

        // 2. Wipe all tables (except migrations)
        $tables = DB::select('SELECT name FROM sqlite_master WHERE type="table" AND name != "migrations"');
        foreach ($tables as $table) {
            DB::statement('DELETE FROM ' . $table->name);
        }

        return back()->with('success', 'Backup created & database reset!');
    }

    /* ───────────────────────────────
       Helper: dump CREATE + INSERT
    ─────────────────────────────── */
    private function dumpTable(string $table, $output)
    {
        fwrite($output, "-- Table: {$table}\n");

        // CREATE
        $create = DB::select("SELECT sql FROM sqlite_master WHERE type='table' AND name=?", [$table])[0]->sql;
        fwrite($output, "{$create};\n");

        // INSERTs
        $rows = DB::table($table)->get();
        foreach ($rows as $row) {
            $values = collect($row)->map(fn ($v) => is_null($v) ? 'NULL' : "'" . addslashes($v) . "'")->implode(',');
            fwrite($output, "INSERT INTO {$table} VALUES ({$values});\n");
        }
    }
}
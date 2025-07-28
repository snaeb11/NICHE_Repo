<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class BackupController extends Controller
{
    //backup only
    public function download(): StreamedResponse
    {
        $fileName = 'backup_' . now()->format('Y-m-d_H-i-s') . '.sqlite';

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

    //restore only
public function restore(Request $request)
{
    $request->validate([
        'backup_file' => 'required|file|mimes:sqlite',
    ]);

    $path = $request->file('backup_file')->getRealPath();
    $sql = file_get_contents($path);

    try {
        // Disable foreign keys
        DB::statement('PRAGMA foreign_keys = OFF');

        // Drop all user tables
        $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'");
        foreach ($tables as $table) {
            DB::statement("DROP TABLE IF EXISTS {$table->name}");
        }

        // Execute SQL dump safely
        $sql = preg_replace('/\R/', "\n", $sql); // Normalize line endings
        $statements = array_filter(array_map('trim', explode(";\n", $sql)));

        foreach ($statements as $statement) {
            if (!empty($statement)) {
                DB::unprepared($statement . ';');
            }
        }

        // Re-enable foreign keys
        DB::statement('PRAGMA foreign_keys = ON');

        return back()->with('success', 'Database restored successfully!');
    } catch (\Exception $e) {
        DB::statement('PRAGMA foreign_keys = ON'); // Always re-enable
        return back()->with('error', 'Restore failed: ' . $e->getMessage());
    }
}



    //backup + resets tbales
    public function backupAndReset(): BinaryFileResponse
    {
        // 1. Backup to file
        $fileName = 'backup_reset_' . now()->format('Y-m-d_H-i-s') . '.sqlite';
        $dumpPath = storage_path("app/backups/{$fileName}");
        if (!is_dir(dirname($dumpPath))) {
            mkdir(dirname($dumpPath), 0755, true);
        }

        $output = fopen($dumpPath, 'w');
        $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'");

        foreach ($tables as $table) {
            $this->dumpTable($table->name, $output);
        }
        fclose($output);

        // 2. Truncate all except migrations, respecting FK order
        $deletionOrder = ['submissions', 'users']; // adjust as needed
        DB::statement('PRAGMA foreign_keys = OFF');
        foreach ($deletionOrder as $table) {
            if (in_array($table, array_column($tables, 'name'))) {
                DB::statement("DELETE FROM {$table}");
            }
        }
        DB::statement('PRAGMA foreign_keys = ON');

        // 3. Return file as download
        return response()->download($dumpPath)->deleteFileAfterSend();
    }

    /* ───────────────────────────────
       Helper: dump CREATE + INSERT
    ─────────────────────────────── */
    private function dumpTable(string $table, $output)
    {
        fwrite($output, "-- Table: {$table}\n");
        fwrite($output, "DROP TABLE IF EXISTS {$table};\n");  // ✅ Force overwrite

        $create = DB::select("SELECT sql FROM sqlite_master WHERE type='table' AND name=?", [$table])[0]->sql;
        fwrite($output, "{$create};\n");

        $rows = DB::table($table)->get();
        foreach ($rows as $row) {
            $values = collect($row)->map(fn ($v) => is_null($v) ? 'NULL' : "'" . addslashes($v) . "'")->implode(',');
            fwrite($output, "INSERT INTO {$table} VALUES ({$values});\n");
        }
    }

}
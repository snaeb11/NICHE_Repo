<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('advisers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('program_id')->constrained('programs')->onDelete('cascade');
            $table->timestamps();
        });

        // Insert realistic adviser names
        if (DB::table('advisers')->count() === 0) {
            $programs = DB::table('programs')->get();

            // Sample adviser names for each program
            $adviserNames = [
                'BEEd' => ['Dr. Maria Santos', 'Prof. Juan Dela Cruz', 'Dr. Ana Reyes'],
                'BSIT' => ['Engr. Roberto Garcia', 'Prof. Carmen Lopez', 'Dr. Manuel Torres'],
                'BTVTEd' => ['Prof. Elena Mendoza', 'Dr. Carlos Aquino', 'Prof. Sofia Rivera'],
                'BECEd' => ['Dr. Patricia Cruz', 'Prof. Antonio Santos', 'Dr. Isabel Morales'],
                'BSNEd' => ['Prof. Rosa Martinez', 'Dr. Fernando Reyes', 'Prof. Lucia Gomez'],
                'BSEd Mathematics' => ['Dr. Jose Santos', 'Prof. Maria Garcia', 'Dr. Pedro Lopez'],
                'BSEd English' => ['Prof. Ana Torres', 'Dr. Roberto Cruz', 'Prof. Carmen Santos'],
                'BSEd Filipino' => ['Dr. Manuel Reyes', 'Prof. Elena Garcia', 'Dr. Carlos Santos'],
                'EdD' => ['Dr. Sofia Aquino', 'Prof. Juan Morales', 'Dr. Patricia Torres'],
                'MEEM' => ['Engr. Roberto Santos', 'Prof. Maria Cruz', 'Dr. Antonio Garcia'],
            ];

            foreach ($programs as $program) {
                if (isset($adviserNames[$program->name])) {
                    foreach ($adviserNames[$program->name] as $adviserName) {
                        DB::table('advisers')->insert([
                            'name' => $adviserName,
                            'program_id' => $program->id,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advisers');
    }
};

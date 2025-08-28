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

        // Insert some sample advisers
        if (DB::table('advisers')->count() === 0) {
            $programs = DB::table('programs')->get();

            foreach ($programs as $program) {
                // Add 2-3 advisers per program
                for ($i = 1; $i <= rand(2, 3); $i++) {
                    DB::table('advisers')->insert([
                        'name' => 'Adviser ' . $i . ' - ' . $program->name,
                        'program_id' => $program->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
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

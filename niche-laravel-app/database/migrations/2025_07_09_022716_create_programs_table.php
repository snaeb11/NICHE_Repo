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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->enum('degree', ['Undergraduate', 'Graduate']);
            $table->timestamps();
        });

        if (DB::table('programs')->count() === 0) {
            DB::table('programs')->insert([
                // Undergraduate Programs
                ['name' => 'BEEd', 'degree' => 'Undergraduate'],
                ['name' => 'BSIT', 'degree' => 'Undergraduate'],
                ['name' => 'BTVTEd', 'degree' => 'Undergraduate'],
                ['name' => 'BECEd', 'degree' => 'Undergraduate'],
                ['name' => 'BSNEd', 'degree' => 'Undergraduate'],
                ['name' => 'BSEd Mathematics', 'degree' => 'Undergraduate'],
                ['name' => 'BSEd English', 'degree' => 'Undergraduate'],
                ['name' => 'BSEd Filipino', 'degree' => 'Undergraduate'],

                // Graduate Programs
                ['name' => 'EdD', 'degree' => 'Graduate'],
                ['name' => 'MEEM', 'degree' => 'Graduate'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // First drop foreign key constraints from other tables
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['program_id']);
        });

        Schema::table('submissions', function (Blueprint $table) {
            $table->dropForeign(['program_id']);
        });

        Schema::table('inventory', function (Blueprint $table) {
            $table->dropForeign(['program_id']);
        });
        Schema::dropIfExists('programs');
    }
};

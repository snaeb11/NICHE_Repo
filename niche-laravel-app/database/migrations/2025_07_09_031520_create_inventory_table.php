<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('submission_id')->nullable()->unique();
            $table->string('title');
            $table->text('authors');
            $table->string('adviser');
            $table->text('abstract');
            $table->unsignedBigInteger('program_id')->nullable();
            $table->string('archived_path')->comment('Permanent storage path in secure archive');
            $table->string('original_filename');
            $table->unsignedInteger('file_size')->comment('Bytes');
            $table->string('file_hash', 64)->comment('SHA-256 checksum for integrity');
            $table->year('academic_year')->index();
            $table->string('inventory_number')->unique()->comment('BSIT-2023-001');
            $table->timestamp('archived_at')->useCurrent();
            $table->unsignedBigInteger('archived_by');
            $table->index('title');
            $table->index('abstract(100)');
            $table->index(['program_id', 'academic_year']);
            $table->index('inventory_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};

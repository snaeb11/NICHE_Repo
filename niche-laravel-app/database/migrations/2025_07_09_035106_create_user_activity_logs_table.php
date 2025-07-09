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
        Schema::create('admin_activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users')->onDelete('restrict');
            $table->enum('action', ['created', 'updated', 'deleted', 'approved', 'rejected', 'archived', 'restored'])->comment('Predefined admin actions');
            $table->string('target_table', 50)->comment('e.g., submissions, inventory, users');
            $table->unsignedBigInteger('target_id')->comment('ID of the affected record');
            $table->timestamp('performed_at')->useCurrent();
            $table->index(['admin_id', 'performed_at']);
            $table->index(['target_table', 'target_id', 'performed_at']);
            $table->index('action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activity_logs');
    }
};

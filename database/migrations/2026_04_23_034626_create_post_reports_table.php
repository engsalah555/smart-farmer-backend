<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->string('reason'); // e.g., 'spam', 'inappropriate', 'not_agricultural'
            $table->text('details')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'action_taken'])->default('pending');
            $table->timestamps();

            // Prevent multiple reports from same user for same post
            $table->unique(['user_id', 'post_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_reports');
    }
};

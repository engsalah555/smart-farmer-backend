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
        // 1. Rename existing custom notifications table
        if (Schema::hasTable('notifications') && ! Schema::hasColumn('notifications', 'notifiable_type')) {
            Schema::rename('notifications', 'app_notifications');
        }

        // 2. Create standard Laravel notifications table
        if (! Schema::hasTable('notifications')) {
            Schema::create('notifications', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('type');
                $table->morphs('notifiable');
                $table->text('data');
                $table->timestamp('read_at')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
        if (Schema::hasTable('app_notifications')) {
            Schema::rename('app_notifications', 'notifications');
        }
    }
};

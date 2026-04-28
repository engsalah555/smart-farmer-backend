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
        Schema::create('iot_devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('device_id')->unique();
            $table->string('name')->default('نظام الري الذكي');
            $table->enum('status', ['active', 'inactive', 'maintenance'])->default('inactive');
            $table->timestamp('last_sync_at')->nullable();
            $table->boolean('is_irrigation_on')->default(false);
            $table->boolean('auto_irrigation')->default(true);
            $table->decimal('water_consumption', 10, 2)->default(0.00);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('iot_devices');
    }
};

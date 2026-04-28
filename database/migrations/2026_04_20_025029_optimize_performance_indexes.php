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
        Schema::table('iot_devices', function (Blueprint $table) {
            $table->index('device_id');
            $table->index('status');
            $table->index('is_irrigation_on');
            $table->index('auto_irrigation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iot_devices', function (Blueprint $table) {
            $table->dropIndex(['device_id']);
            $table->dropIndex(['status']);
            $table->dropIndex(['is_irrigation_on']);
            $table->dropIndex(['auto_irrigation']);
        });
    }
};

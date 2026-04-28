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
            $table->decimal('temperature', 8, 2)->nullable()->after('water_consumption');
            $table->decimal('humidity', 8, 2)->nullable()->after('temperature');
            $table->decimal('soil_moisture', 8, 2)->nullable()->after('humidity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iot_devices', function (Blueprint $table) {
            $table->dropColumn(['temperature', 'humidity', 'soil_moisture']);
        });
    }
};

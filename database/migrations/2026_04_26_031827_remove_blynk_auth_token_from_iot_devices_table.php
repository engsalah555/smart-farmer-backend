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
            if (Schema::hasColumn('iot_devices', 'blynk_auth_token')) {
                $table->dropColumn('blynk_auth_token');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iot_devices', function (Blueprint $table) {
            $table->string('blynk_auth_token')->nullable()->after('device_id')->comment('API Token given by Blynk to control the device');
        });
    }
};

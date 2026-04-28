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
        Schema::table('crop_guides', function (Blueprint $table) {
            $table->string('category')->nullable()->after('name');
            $table->text('benefits')->nullable()->after('description');
            $table->text('uses')->nullable()->after('benefits');
            $table->string('watering_schedule')->nullable()->after('water_needs');
            $table->string('sunlight_requirement')->nullable()->after('watering_schedule');
            $table->string('temperature')->nullable()->after('sunlight_requirement');
            $table->string('humidity')->nullable()->after('temperature');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crop_guides', function (Blueprint $table) {
            $table->dropColumn([
                'category',
                'benefits',
                'uses',
                'watering_schedule',
                'sunlight_requirement',
                'temperature',
                'humidity'
            ]);
        });
    }
};

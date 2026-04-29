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
        Schema::table('plants', function (Blueprint $table) {
            $table->text('scientific_definition')->nullable()->after('scientific_name');
            $table->text('growing_conditions')->nullable()->after('growth_guide');
            $table->text('soil_and_ph')->nullable()->after('growing_conditions');
            $table->text('uses')->nullable()->after('soil_and_ph');
            $table->text('pests_and_diseases')->nullable()->after('uses');
            $table->text('harvesting_and_storage')->nullable()->after('pests_and_diseases');
            $table->string('water_needs')->nullable()->after('planting_season');
            $table->string('fertilizer_needs')->nullable()->after('harvest_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropColumn([
                'scientific_definition',
                'growing_conditions',
                'soil_and_ph',
                'uses',
                'pests_and_diseases',
                'harvesting_and_storage',
                'water_needs',
                'fertilizer_needs',
            ]);
        });
    }
};

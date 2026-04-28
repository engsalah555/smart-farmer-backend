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
            $table->text('scientific_definition')->nullable();
            $table->text('growing_conditions')->nullable();
            $table->text('soil_and_ph')->nullable();
            $table->text('pests_and_diseases')->nullable();
            $table->text('harvesting_and_storage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('crop_guides', function (Blueprint $table) {
            $table->dropColumn([
                'scientific_definition',
                'growing_conditions',
                'soil_and_ph',
                'pests_and_diseases',
                'harvesting_and_storage'
            ]);
        });
    }
};

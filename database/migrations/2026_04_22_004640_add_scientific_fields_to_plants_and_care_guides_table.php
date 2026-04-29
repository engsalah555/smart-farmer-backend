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
            $table->text('benefits')->nullable()->after('description');
            $table->text('growth_guide')->nullable()->after('benefits');
        });

        Schema::table('care_guides', function (Blueprint $table) {
            // 1. Ideal Growth Conditions
            $table->float('min_temp')->nullable()->after('humidity');
            $table->float('max_temp')->nullable()->after('min_temp');
            $table->string('light_type')->nullable()->after('max_temp');
            $table->string('rainfall')->nullable()->after('light_type');
            $table->float('min_humidity')->nullable()->after('rainfall');
            $table->float('max_humidity')->nullable()->after('min_humidity');
            $table->string('irrigation_level')->nullable()->after('max_humidity');

            // 2. Cultivation Data
            $table->string('life_cycle')->nullable()->after('irrigation_level');
            $table->string('cultivation_method')->nullable()->after('life_cycle');
            $table->string('planting_depth')->nullable()->after('cultivation_method');

            // 3. Soil Standards
            $table->string('soil_texture')->nullable()->after('planting_depth');
            $table->float('min_ph')->nullable()->after('soil_texture');
            $table->float('max_ph')->nullable()->after('min_ph');

            // 4. Fertilization & Seeding
            $table->string('seed_rate')->nullable()->after('max_ph');
            $table->float('n_amount')->nullable()->after('seed_rate');
            $table->float('p_amount')->nullable()->after('n_amount');
            $table->float('k_amount')->nullable()->after('p_amount');

            // 5. Plant Compatibility
            $table->text('companion_plants')->nullable()->after('k_amount');
            $table->text('combative_plants')->nullable()->after('companion_plants');
            $table->text('management_tips')->nullable()->after('combative_plants');

            // 6. Crop Rotation
            $table->text('succeeding_crops')->nullable()->after('management_tips');
            $table->text('forbidden_crops')->nullable()->after('succeeding_crops');
            $table->text('rotation_recommendation')->nullable()->after('forbidden_crops');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plants', function (Blueprint $table) {
            $table->dropColumn(['benefits', 'growth_guide']);
        });

        Schema::table('care_guides', function (Blueprint $table) {
            $table->dropColumn([
                'min_temp', 'max_temp', 'light_type', 'rainfall', 'min_humidity',
                'max_humidity', 'irrigation_level', 'life_cycle', 'cultivation_method',
                'planting_depth', 'soil_texture', 'min_ph', 'max_ph', 'seed_rate',
                'n_amount', 'p_amount', 'k_amount', 'companion_plants',
                'combative_plants', 'management_tips', 'succeeding_crops',
                'forbidden_crops', 'rotation_recommendation',
            ]);
        });
    }
};

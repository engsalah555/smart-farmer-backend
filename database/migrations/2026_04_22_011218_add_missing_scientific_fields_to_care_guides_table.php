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
        Schema::table('care_guides', function (Blueprint $table) {
            $table->text('pests_and_diseases')->nullable()->after('management_tips');
            $table->text('harvesting_and_storage')->nullable()->after('pests_and_diseases');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('care_guides', function (Blueprint $table) {
            $table->dropColumn(['pests_and_diseases', 'harvesting_and_storage']);
        });
    }
};

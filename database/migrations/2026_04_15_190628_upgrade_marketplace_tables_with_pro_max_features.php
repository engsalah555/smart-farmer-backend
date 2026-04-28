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
        // --- STORES ---
        Schema::table('stores', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('store_name');
            $table->softDeletes()->after('updated_at');
        });

        // --- STORE CATALOGS ---
        Schema::table('store_catalogs', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('name');
            $table->softDeletes()->after('updated_at');
        });

        // --- PRODUCTS ---
        Schema::table('products', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('name');
            $table->boolean('is_featured')->default(false)->after('image_url');
            $table->softDeletes()->after('updated_at');
            
            // إضافة Index على الـ slug والـ is_featured للسرعة
            $table->index('slug');
            $table->index('is_featured');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['is_featured']);
            $table->dropColumn(['slug', 'is_featured', 'deleted_at']);
        });

        Schema::table('store_catalogs', function (Blueprint $table) {
            $table->dropColumn(['slug', 'deleted_at']);
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['slug', 'deleted_at']);
        });
    }
};

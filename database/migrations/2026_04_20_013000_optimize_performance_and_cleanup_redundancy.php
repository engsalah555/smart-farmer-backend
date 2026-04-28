<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * تحسينات الأداء وتنظيف الجداول:
     * 1. إضافة Indexes لسرعة التقارير (created_at).
     * 2. حذف الأعمدة المتكررة التي استبدلت بـ Media Library.
     */
    public function up(): void
    {
        // --- تحسين أداء البحث والتقارير ---
        Schema::table('users', function (Blueprint $table) {
            $table->index('created_at');
            $table->index('user_type');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->index('created_at');
            $table->index('price');
            // حذف العمود القديم غير المستخدم (التكرار يسبب تضخم)
            if (Schema::hasColumn('products', 'image_url')) {
                $table->dropColumn('image_url');
            }
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->index('created_at');
            $table->index('status');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->index('created_at');
        });

        // --- تنظيف جدول المتاجر ---
        Schema::table('stores', function (Blueprint $table) {
            if (Schema::hasColumn('stores', 'logo')) {
                $table->dropColumn('logo');
            }
            if (Schema::hasColumn('stores', 'cover_image')) {
                $table->dropColumn('cover_image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->string('logo')->nullable();
            $table->string('cover_image')->nullable();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
            $table->dropIndex(['status']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->string('image_url')->nullable();
            $table->dropIndex(['created_at']);
            $table->dropIndex(['price']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['created_at']);
            $table->dropIndex(['user_type']);
        });
    }
};

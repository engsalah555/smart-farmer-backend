<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: تحسين هيكل قاعدة البيانات للكتالوجات والمنتجات
 *
 * يضيف:
 * 1. عمود sort_order لكتالوجات المتجر (ترتيب مخصص)
 * 2. Composite Index على (store_id, sort_order) في store_catalogs
 * 3. Index على catalog_id في products
 * 4. Composite Index على (store_id, catalog_id) في products
 */
return new class extends Migration
{
    public function up(): void
    {
        // --- تحسينات جدول store_catalogs ---
        Schema::table('store_catalogs', function (Blueprint $table) {
            // ترتيب مخصص للكتالوجات داخل المتجر
            $table->unsignedSmallInteger('sort_order')->default(0)->after('image_url');

            // Index مركّب: تسريع جلب كتالوجات متجر معين مرتبة
            $table->index(['store_id', 'sort_order'], 'idx_catalogs_store_order');
        });

        // --- تحسينات جدول products ---
        Schema::table('products', function (Blueprint $table) {
            // Index على catalog_id: تسريع جلب منتجات كتالوج معين
            $table->index('catalog_id', 'idx_products_catalog');

            // Composite Index: تسريع جلب منتجات متجر معين مقسّمة على كتالوجاتها
            $table->index(['store_id', 'catalog_id'], 'idx_products_store_catalog');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_products_store_catalog');
            $table->dropIndex('idx_products_catalog');
        });

        Schema::table('store_catalogs', function (Blueprint $table) {
            $table->dropIndex('idx_catalogs_store_order');
            $table->dropColumn('sort_order');
        });
    }
};

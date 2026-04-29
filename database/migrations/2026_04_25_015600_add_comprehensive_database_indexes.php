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
        // 1. Stores Table
        Schema::table('stores', function (Blueprint $table) {
            // Speed up relation lookups
            if (Schema::hasColumn('stores', 'user_id')) {
                $table->index('user_id', 'idx_stores_user_id');
            }
        });

        // 2. Products Table
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'store_id')) {
                $table->index('store_id', 'idx_products_store_id');
            }
            if (Schema::hasColumn('products', 'catalog_id')) {
                $table->index('catalog_id', 'idx_products_catalog_id');
            }
            if (Schema::hasColumn('products', 'is_featured')) {
                $table->index('is_featured', 'idx_products_is_featured');
            }
        });

        // 3. Orders Table
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'store_id')) {
                $table->index('store_id', 'idx_orders_store_id');
            }
        });

        // 4. Order Items Table
        Schema::table('order_items', function (Blueprint $table) {
            if (Schema::hasColumn('order_items', 'order_id')) {
                $table->index('order_id', 'idx_order_items_order_id');
            }
            if (Schema::hasColumn('order_items', 'product_id')) {
                $table->index('product_id', 'idx_order_items_product_id');
            }
        });

        // 5. Product Reviews Table
        Schema::table('product_reviews', function (Blueprint $table) {
            if (Schema::hasColumn('product_reviews', 'product_id')) {
                $table->index('product_id', 'idx_product_reviews_product_id');
            }
            if (Schema::hasColumn('product_reviews', 'user_id')) {
                $table->index('user_id', 'idx_product_reviews_user_id');
            }
        });

        // 6. Iot Devices Table
        Schema::table('iot_devices', function (Blueprint $table) {
            if (Schema::hasColumn('iot_devices', 'status')) {
                $table->index('status', 'idx_iot_devices_status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iot_devices', function (Blueprint $table) {
            $table->dropIndex('idx_iot_devices_status');
        });

        Schema::table('product_reviews', function (Blueprint $table) {
            $table->dropIndex('idx_product_reviews_user_id');
            $table->dropIndex('idx_product_reviews_product_id');
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropIndex('idx_order_items_product_id');
            $table->dropIndex('idx_order_items_order_id');
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropIndex('idx_orders_store_id');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_products_is_featured');
            $table->dropIndex('idx_products_catalog_id');
            $table->dropIndex('idx_products_store_id');
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->dropIndex('idx_stores_user_id');
        });
    }
};

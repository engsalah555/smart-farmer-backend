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
        // 1. Crops Table Optimization
        Schema::table('crops', function (Blueprint $table) {
            // Speed up fetching user crops
            $table->index(['user_id', 'created_at'], 'idx_crops_user_date');
        });

        // 2. Orders Table Optimization
        Schema::table('orders', function (Blueprint $table) {
            // Speed up user order history with status filtering
            if (Schema::hasColumn('orders', 'status')) {
                $table->index(['user_id', 'status', 'created_at'], 'idx_orders_user_status_date');
            } else {
                $table->index(['user_id', 'created_at'], 'idx_orders_user_date');
            }
        });

        // 3. Products Table Optimization
        Schema::table('products', function (Blueprint $table) {
            // Speed up price range filtering within categories
            if (Schema::hasColumn('products', 'category_id') && Schema::hasColumn('products', 'price')) {
                $table->index(['category_id', 'price'], 'idx_products_cat_price');
            }
        });

        // 4. Irrigation Logs Optimization
        Schema::table('irrigation_logs', function (Blueprint $table) {
            // Speed up fetching logs for a specific device by date
            if (Schema::hasColumn('irrigation_logs', 'iot_device_id')) {
                $table->index(['iot_device_id', 'created_at'], 'idx_logs_device_date');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('irrigation_logs', function (Blueprint $table) {
            $table->dropIndex('idx_logs_device_date');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropIndex('idx_products_cat_price');
        });

        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'status')) {
                $table->dropIndex('idx_orders_user_status_date');
            } else {
                $table->dropIndex('idx_orders_user_date');
            }
        });

        Schema::table('crops', function (Blueprint $table) {
            $table->dropIndex('idx_crops_user_date');
        });
    }
};

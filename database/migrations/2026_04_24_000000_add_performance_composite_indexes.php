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
        Schema::table('posts', function (Blueprint $table) {
            // Index for user feed filtering + sorting
            $table->index(['user_id', 'created_at']);
            // Index for moderation/hidden status
            $table->index(['is_hidden', 'created_at']);
        });

        Schema::table('likes', function (Blueprint $table) {
            // Speed up checking if a user liked a specific post
            $table->index(['post_id', 'user_id']);
        });

        Schema::table('saved_posts', function (Blueprint $table) {
            // Speed up checking if a user saved a specific post
            $table->index(['post_id', 'user_id']);
        });

        Schema::table('products', function (Blueprint $table) {
            // Speed up category browsing with sorting
            if (Schema::hasColumn('products', 'category_id')) {
                $table->index(['category_id', 'created_at']);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'category_id')) {
                $table->dropIndex(['category_id', 'created_at']);
            }
        });

        Schema::table('saved_posts', function (Blueprint $table) {
            $table->dropIndex(['post_id', 'user_id']);
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->dropIndex(['post_id', 'user_id']);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'created_at']);
            $table->dropIndex(['is_hidden', 'created_at']);
        });
    }
};

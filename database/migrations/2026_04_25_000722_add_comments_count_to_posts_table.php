<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('comments_count')->default(0)->after('likes_count');
        });

        // مزامنة أعداد التعليقات الحالية (Data Integrity)
        $posts = DB::table('posts')->select('id')->get();
        foreach ($posts as $post) {
            $count = DB::table('comments')->where('post_id', $post->id)->count();
            DB::table('posts')->where('id', $post->id)->update(['comments_count' => $count]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('comments_count');
        });
    }
};

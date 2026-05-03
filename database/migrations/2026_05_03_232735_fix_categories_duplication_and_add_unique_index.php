<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Normalize and Merge common variations
        $this->renameAndMerge('محاصيل', 'منتجات زراعية');
        $this->renameAndMerge('معدات', 'معدات وأدوات');
        $this->renameAndMerge('اسمدة', 'أسمدة');
        $this->renameAndMerge('انظمة ري وطاقة', 'أنظمة ري وطاقة');
        $this->renameAndMerge('انظمة', 'أنظمة ري وطاقة');

        // 2. Deduplicate all categories (by name and type)
        $duplicates = DB::table('categories')
            ->select('name', 'type', DB::raw('COUNT(*) as count'))
            ->groupBy('name', 'type')
            ->having('count', '>', 1)
            ->get();

        foreach ($duplicates as $dup) {
            $ids = DB::table('categories')
                ->where('name', $dup->name)
                ->where('type', $dup->type)
                ->orderBy('id', 'asc')
                ->pluck('id');

            $keepId = $ids->shift(); // Keep the first one

            // Update related tables
            if (Schema::hasColumn('products', 'category_id')) {
                DB::table('products')->whereIn('category_id', $ids)->update(['category_id' => $keepId]);
            }
            
            if (Schema::hasColumn('plants', 'category_id')) {
                DB::table('plants')->whereIn('category_id', $ids)->update(['category_id' => $keepId]);
            }

            // Delete duplicates
            DB::table('categories')->whereIn('id', $ids)->delete();
        }

        // 3. Add Unique Constraint
        Schema::table('categories', function (Blueprint $table) {
            $table->unique(['name', 'type']);
        });
    }

    private function renameAndMerge(string $oldName, string $newName)
    {
        $oldCat = DB::table('categories')->where('name', $oldName)->where('type', 'marketplace')->first();
        $newCat = DB::table('categories')->where('name', $newName)->where('type', 'marketplace')->first();

        // Always update products category string if it exists
        if (Schema::hasColumn('products', 'category')) {
            DB::table('products')->where('category', $oldName)->update(['category' => $newName]);
        }

        if ($oldCat && $newCat) {
            // Merge products and plants
            if (Schema::hasColumn('products', 'category_id')) {
                DB::table('products')->where('category_id', $oldCat->id)->update(['category_id' => $newCat->id]);
            }
            if (Schema::hasColumn('plants', 'category_id')) {
                DB::table('plants')->where('category_id', $oldCat->id)->update(['category_id' => $newCat->id]);
            }
            // Delete old
            DB::table('categories')->where('id', $oldCat->id)->delete();
        } elseif ($oldCat && !$newCat) {
            // Just rename
            DB::table('categories')->where('id', $oldCat->id)->update(['name' => $newName]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropUnique(['name', 'type']);
        });
    }
};

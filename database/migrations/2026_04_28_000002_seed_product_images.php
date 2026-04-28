<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Modules\Marketplace\Domain\Models\Product;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Get all files in public/storage/products
        $files = Storage::disk('public')->files('products');
        
        if (empty($files)) {
            return;
        }

        $products = Product::whereNull('image_url')->get();
        
        foreach ($products as $index => $product) {
            // Assign an image if available
            if (isset($files[$index])) {
                $product->image_url = $files[$index];
                $product->save();
            } else {
                // If we run out of unique images, just pick the first one as fallback
                $product->image_url = $files[0];
                $product->save();
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

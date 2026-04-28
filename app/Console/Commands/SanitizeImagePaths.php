<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SanitizeImagePaths extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sanitize-image-paths';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up image paths in the database (remove redundant /storage/ prefixes and malformed absolute URLs)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting image path sanitation...');

        // 1. Sanitize Store logos and cover images
        \App\Models\Store::all()->each(function ($store) {
            if (\Illuminate\Support\Facades\Schema::hasColumn('stores', 'logo') || \Illuminate\Support\Facades\Schema::hasColumn('stores', 'cover_image')) {
                $oldLogo = $store->logo;
                $oldCover = $store->cover_image;

                $store->logo = $this->sanitize($store->logo);
                $store->cover_image = $this->sanitize($store->cover_image);

                if ($store->isDirty()) {
                    $store->save();
                    $this->line("Updated Store ID {$store->id}: {$oldLogo} -> {$store->logo}");
                }
            }
        });

        // 2. Sanitize Product image_url
        \App\Models\Product::all()->each(function ($product) {
            if (\Illuminate\Support\Facades\Schema::hasColumn('products', 'image_url')) {
                $oldImage = $product->image_url;
                $product->image_url = $this->sanitize($product->image_url);

                if ($product->isDirty()) {
                    $product->save();
                    $this->line("Updated Product ID {$product->id}: {$oldImage} -> {$product->image_url}");
                }
            }
        });

        // 3. Sanitize StoreCatalog image_url
        \App\Models\StoreCatalog::all()->each(function ($catalog) {
            if (\Illuminate\Support\Facades\Schema::hasColumn('store_catalogs', 'image_url')) {
                $oldImage = $catalog->image_url;
                $catalog->image_url = $this->sanitize($catalog->image_url);

                if ($catalog->isDirty()) {
                    $catalog->save();
                    $this->line("Updated Catalog ID {$catalog->id}: {$oldImage} -> {$catalog->image_url}");
                }
            }
        });

        $this->info('Sanitation complete!');
    }

    private function sanitize($path)
    {
        if (empty($path)) return $path;

        // Pattern 1: Remove full URL up to /storage/
        // Matches http://192.168.0.27:8000/storage/products/abc.jpg -> products/abc.jpg
        $path = preg_replace('/^https?:\/\/[^\/]+\/storage\//', '', $path);

        // Pattern 2: Remove leading /storage/ or storage/ if it's still there
        $path = ltrim($path, '/');
        if (str_starts_with($path, 'storage/')) {
            $path = substr($path, 8);
        }

        // Final trimming
        return ltrim($path, '/');
    }
}

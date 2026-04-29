<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Store;
use App\Models\StoreCatalog;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class MigrateOldMedia extends Command
{
    protected $signature = 'media:migrate-old';

    protected $description = 'Migrate old images from string columns to Spatie MediaLibrary';

    public function handle()
    {
        $this->info('Starting media migration...');

        // 1. Migrate Stores
        $this->info('Migrating Stores...');
        Store::all()->each(function ($store) {
            if (Schema::hasColumn('stores', 'logo') && $store->logo && $store->getMedia('logo')->isEmpty()) {
                $this->addMediaFromUrl($store, $store->logo, 'logo');
            }
            if (Schema::hasColumn('stores', 'cover_image') && $store->cover_image && $store->getMedia('cover')->isEmpty()) {
                $this->addMediaFromUrl($store, $store->cover_image, 'cover');
            }
        });

        // 2. Migrate Catalogs
        $this->info('Migrating Catalogs...');
        StoreCatalog::all()->each(function ($catalog) {
            if (Schema::hasColumn('store_catalogs', 'image_url') && $catalog->image_url && $catalog->getMedia('catalog_image')->isEmpty()) {
                $this->addMediaFromUrl($catalog, $catalog->image_url, 'catalog_image');
            }
        });

        // 3. Migrate Products
        $this->info('Migrating Products...');
        Product::all()->each(function ($product) {
            if (Schema::hasColumn('products', 'image_url') && $product->image_url && $product->getMedia('main_image')->isEmpty()) {
                $this->addMediaFromUrl($product, $product->image_url, 'main_image');
            }
        });

        $this->info('Migration completed successfully!');
    }

    private function addMediaFromUrl($model, $url, $collection)
    {
        try {
            // Convert URL to relative path
            $path = ltrim(str_replace('/storage/', '', parse_url($url, PHP_URL_PATH)), '/');

            if (Storage::disk('public')->exists($path)) {
                $fullPath = storage_path('app/public/'.$path);
                $model->addMedia($fullPath)
                    ->preservingOriginal()
                    ->toMediaCollection($collection);

                $this->line("Migrated {$collection} for ".get_class($model)." ID: {$model->id}");
            } else {
                $this->warn("File not found for ID: {$model->id} - Path: {$path}");
            }
        } catch (\Exception $e) {
            $this->error("Error migrating ID: {$model->id} - ".$e->getMessage());
        }
    }
}

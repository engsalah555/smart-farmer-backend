<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{
    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        \Illuminate\Support\Facades\Cache::forget('app_metadata');
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        \Illuminate\Support\Facades\Cache::forget('app_metadata');
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        \Illuminate\Support\Facades\Cache::forget('app_metadata');
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        \Illuminate\Support\Facades\Cache::forget('app_metadata');
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        \Illuminate\Support\Facades\Cache::forget('app_metadata');
    }
}

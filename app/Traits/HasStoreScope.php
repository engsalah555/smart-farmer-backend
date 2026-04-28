<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Filament\Facades\Filament;

trait HasStoreScope
{
    /**
     * Boot the trait to apply a global scope.
     */
    protected static function bootHasStoreScope(): void
    {
        static::addGlobalScope('store_scope', function (Builder $builder) {
            // 1. If in Filament and a tenant is set, Filament handles it.
            // But we can reinforce it here if needed.
            if (app()->bound('filament') && Filament::getTenant()) {
                $builder->where('store_id', Filament::getTenant()->id);
                return;
            }

            // 2. If it's an API request or regular web request (non-Filament)
            if (auth()->check()) {
                $user = auth()->user();

                // Only apply if we are in a "management" context for sellers
                // This prevents sellers from being restricted when they act as buyers on public routes
                $isSellerManagement = request()->is('api/marketplace/seller/*') || 
                                     request()->is('seller/*') ||
                                     request()->header('X-Seller-Context') === 'true';

                if ($isSellerManagement && $user->user_type === 'seller' && $user->store) {
                    $builder->where('store_id', $user->store->id);
                }
            }
        });
    }

    /**
     * Scope a query to only include items belonging to the given store.
     */
    public function scopeForStore(Builder $query, int $storeId): Builder
    {
        return $query->where('store_id', $storeId);
    }
}

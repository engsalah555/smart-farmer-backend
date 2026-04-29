<?php

namespace App\Http\Resources;

use App\Models\Store;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * StoreResource — استجابة متجر كاملة.
 *
 * @mixin Store
 */
class StoreResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'user_id' => $this->user_id,
            'store_name' => $this->store_name,
            'store_type' => $this->store_type,
            'description' => $this->description,
            'address' => $this->address,
            'latitude' => $this->latitude ? (float) $this->latitude : null,
            'longitude' => $this->longitude ? (float) $this->longitude : null,
            'rating' => $this->avg_rating,  // محسوب من تقييمات المنتجات الفعلية
            'logo' => $this->logo_url,
            'cover_image' => $this->cover_url,
            'products_count' => (int) ($this->products_count ?? 0),
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),

            // كتالوجات المتجر مع عدد منتجاتها
            'catalogs' => CatalogResource::collection($this->whenLoaded('catalogs')),

            // منتجات المتجر (تُحمَّل فقط عند getStoreDetails)
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}

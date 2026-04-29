<?php

namespace App\Http\Resources;

use App\Models\StoreCatalog;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * CatalogResource — استجابة كتالوج واحد.
 *
 * products_count يأتي من withCount('products') ولا يُطلق query إضافية.
 * products تُعبّأ فقط عند whenLoaded (Nested Eager Loading).
 *
 * @mixin StoreCatalog
 */
class CatalogResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'store_id' => $this->store_id,
            'name' => $this->name,
            'description' => $this->description,
            'image_url' => $this->getFirstMediaUrl('catalog_image', 'thumb')
                ?: ($this->getFirstMediaUrl('catalog_image')
                ?: ($this->image_url ? (str_starts_with($this->image_url, 'http') ? $this->image_url : url('storage/'.$this->image_url)) : null)),
            'sort_order' => (int) $this->sort_order,
            // products_count: يأتي من withCount ولا يُطلق query
            'products_count' => (int) ($this->products_count ?? 0),
            'created_at' => $this->created_at?->toISOString(),
            'updated_at' => $this->updated_at?->toISOString(),

            // منتجات الكتالوج — تُحمَّل فقط عند الطلب الصريح
            'products' => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}

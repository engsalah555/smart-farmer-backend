<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * ProductResource — استجابة خفيفة لمنتج واحد.
 *
 * @mixin \App\Models\Product
 */
class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'slug'           => $this->slug,
            'store_id'       => $this->store_id,
            'catalog_id'     => $this->catalog_id,
            'name'           => $this->name,
            'description'    => $this->description,
            'price'          => (float) $this->price,
            'unit'           => $this->unit,
            'stock_quantity' => (int) $this->stock_quantity,
            'category'       => $this->category ?? 'شامل',
            'image_url'      => $this->image_url,
            'thumbnail_url'  => $this->getFirstMediaUrl('main_image', 'thumb') ?: $this->image_url,
            'is_featured'    => (bool) $this->is_featured,
            'paymentMethods' => ['cash', 'bank_transfer'], // Default satisfied for now
            'phoneNumber'    => $this->whenLoaded('store', fn() => $this->store->user?->phone ?? ''),
            'avg_rating'     => (float) ($this->reviews_avg_rating ?? $this->avg_rating ?? 0),
            'reviews_count'  => (int) ($this->reviews_count ?? 0),
            'created_at'     => $this->created_at?->toISOString(),
            'updated_at'     => $this->updated_at?->toISOString(),

            // علاقة الكتالوج — محمّلة فقط عند whenLoaded
            'catalog' => $this->when(
                $this->relationLoaded('catalog') && $this->catalog,
                fn() => [
                    'id'   => $this->catalog->id,
                    'slug' => $this->catalog->slug,
                    'name' => $this->catalog->name,
                ]
            ),

            // معلومات المتجر مقتضبة — بدون N+1
            'store' => $this->when(
                $this->relationLoaded('store') && $this->store,
                fn() => [
                    'id'          => $this->store->id,
                    'user_id'     => $this->store->user_id,
                    'slug'        => $this->store->slug,
                    'store_name'  => $this->store->store_name,
                    'address'     => $this->store->address,
                    // ✅ استخدام الـ accessors التي تدعم fallback للعمود المباشر
                    'logo'        => $this->store->logo_url,
                    'cover_image' => $this->store->cover_url,
                ]
            ),

            // الصور الإضافية — محمّلة من MediaLibrary
            'additional_images' => $this->when(
                $this->relationLoaded('media'),
                fn() => $this->getMedia('gallery')->map(fn($media) => $media->getUrl())->toArray()
            ),
        ];
    }
}

<?php

namespace App\Http\Resources\Marketplace;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Order
 */
class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            // Buyer info — used by seller dashboard to show who placed the order
            'user_id' => $this->user_id,
            'user_name' => $this->user?->name ?? 'مستخدم',
            'phone_number' => $this->user?->phone ?? $this->phone_number ?? null,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'status_label' => $this->status_label,
            'shipping_address' => $this->shipping_address,
            'notes' => $this->notes,
            'payment_method' => $this->payment_method,
            'payment_status' => $this->payment_status,
            'receipt_image' => $this->receipt_image,
            'related_order_ids' => $this->related_order_ids ?? [$this->id],
            'created_at' => $this->created_at?->toIso8601String(),
            'items' => $this->whenLoaded('items', fn () => $this->items->map(fn ($item) => [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'product_name' => $item->product?->name,
                'product_image' => $item->product?->getFirstMediaUrl('main_image'),
                'quantity' => $item->quantity,
                'price' => $item->price_at_purchase,
            ])
            ),
        ];
    }
}

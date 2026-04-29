<?php

namespace App\Modules\Marketplace\Domain\Models;

use App\Models\User;
use App\Traits\HasStoreScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasStoreScope;

    protected $fillable = [
        'user_id',
        'store_id',
        'total_price',
        'status',
        'shipping_address',
        'phone_number',   // added: required for buyer contact display in seller dashboard
        'notes',
        'payment_method',
        'payment_status',
        'transaction_id',
        'receipt_image',
    ];

    // =========================================================
    // RELATIONSHIPS
    // =========================================================

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // =========================================================
    // QUERY SCOPES
    // =========================================================

    /** Filter orders by status */
    public function scopeWithStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    // Handled by HasStoreScope trait

    // =========================================================
    // ACCESSORS
    // =========================================================

    /** Human-readable status label in Arabic */
    public function getStatusLabelAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'قيد الانتظار',
            'confirmed' => 'تم التأكيد',   // added: matches Flutter OrderStatus
            'processing' => 'قيد التجهيز',
            'shipped' => 'تم الشحن',
            'delivered' => 'تم التوصيل',
            'cancelled' => 'ملغي',
            default => $this->status,
        };
    }
}

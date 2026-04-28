<?php

namespace App\Modules\Iot\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IrrigationLog extends Model
{
    protected $fillable = [
        'iot_device_id',
        'action',
        'duration',
        'water_used',
    ];

    protected $casts = [
        'water_used' => 'decimal:2',
    ];

    public function device(): BelongsTo
    {
        return $this->belongsTo(IotDevice::class, 'iot_device_id');
    }
}

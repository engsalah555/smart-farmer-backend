<?php

namespace App\Modules\Iot\Domain\Models;

use App\Events\DeviceStatusUpdated;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IotDevice extends Model
{
    protected $fillable = [
        'user_id',
        'device_id',
        'name',
        'status',
        'last_sync_at',
        'is_irrigation_on',
        'auto_irrigation',
        'water_consumption',
        'temperature',
        'humidity',
        'soil_moisture',
        'soil_temperature',
        'rain_detected',
        'water_level',
        'auto_threshold',
    ];

    protected $casts = [
        'last_sync_at' => 'datetime',
        'is_irrigation_on' => 'boolean',
        'auto_irrigation' => 'boolean',
        'rain_detected' => 'boolean',
        'water_consumption' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function logs(): HasMany
    {
        return $this->hasMany(IrrigationLog::class);
    }

    public function schedules(): HasMany
    {
        return $this->hasMany(IrrigationSchedule::class);
    }

    protected static function booted()
    {
        static::updated(function ($device) {
            if ($device->wasChanged('status')) {
                event(new DeviceStatusUpdated($device));
            }
        });
    }
}

<?php

namespace App\Modules\PlantGuide\Domain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warning extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'message',
        'type', // e.g., 'weather', 'pest', 'general'
        'severity', // e.g., 'low', 'medium', 'high', 'critical'
        'location', // e.g., 'كل المناطق', 'منطقة صنعاء'
        'active', // boolean
        'expires_at', // datetime
    ];

    protected $casts = [
        'active' => 'boolean',
        'expires_at' => 'datetime',
    ];
}

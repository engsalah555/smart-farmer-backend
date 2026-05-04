<?php

namespace App\Modules\PlantGuide\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    protected $fillable = [
        'user_id',
        'plant_id',
        'name',
        'crop_type',
        'plantation_date',
        'health_status',
        'needs_irrigation',
        'last_irrigation',
    ];

    protected $casts = [
        'plantation_date' => 'date',
        'last_irrigation' => 'datetime',
        'needs_irrigation' => 'boolean',
        'health_status' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }
}

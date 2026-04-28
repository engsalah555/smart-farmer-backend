<?php

namespace App\Modules\Iot\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class IotDeviceRequest extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

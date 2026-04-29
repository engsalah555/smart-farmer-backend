<?php

namespace App\Models;

use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'type', 'icon', 'description'];

    public function scopeMarketplace($query)
    {
        return $query->where('type', 'marketplace');
    }

    public function scopeCrop($query)
    {
        return $query->where('type', 'crop');
    }

    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
}

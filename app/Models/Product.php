<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

#[ObservedBy(ProductObserver::class)]
class Product extends Model
{
    protected $casts = [
        'sizes' => 'array',
        'colors' => 'array',
    ];

    protected $fillable = [
        'name',
        'slug',
        'price',
        'sale_price',
        'category_id',
        'alert_quantity',
        'colors',
        'sizes',
        'images',
        'status',
        'description',
        'details',
    ];

    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}

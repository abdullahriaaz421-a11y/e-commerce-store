<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Laravel\Scout\Searchable;
class Product extends Model
{
    use Searchable;

    protected $casts = [
        'sizes'  => 'array',
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

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'details' => $this->details,
            'slug' => $this->slug,
            'price' => $this->price,
            'sale_price' => $this->sale_price,
        ];
    }
    public function images(): MorphMany
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}

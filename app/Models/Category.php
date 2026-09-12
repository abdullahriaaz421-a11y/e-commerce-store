<?php

namespace App\Models;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

#[ObservedBy([CategoryObserver::class])]
class Category extends Model
{
    protected $fillable = [
        'category_name',
        'status',
        'slug',
    ];

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}

<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CategoryObserver
{
    public function clearCache()
    {
        Cache::forget('categories');
    }

    public function creating(Category $category): void
    {
        $category->slug = Str::slug($category->category_name);
    }

    public function created(Category $category): void
    {
        // Cache::forget('categories');
        // cache()->forget('categories');
        $this->clearCache();
    }

    /**
     * Handle the category "updated" event.
     */
    public function updated(Category $category): void
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        Cache::forget('categories');
    }

    /**
     * Handle the category "restored" event.
     */
    public function restored(Category $category): void
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        //
    }
}

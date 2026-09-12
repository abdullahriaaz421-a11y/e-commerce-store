<?php

namespace App\Repositories\Services;

use App\Models\Category;
use App\Notifications\CategoryNotification;
use App\Repositories\Interfaces\CategoryInterface;

class CategoryService implements CategoryInterface
{
    public function allCategories()
    {
        return Category::select('id', 'category_name', 'status')->get();
    }

    public function getAllPaginatedCategories()
    {
        return Category::with('image')->select('id', 'category_name', 'status')->paginate(config('app.pagination_limit'));
        // return dd($data);
    }

    public function createCategory(array $data)
    {
        $image = $data['image'] ?? null;
        unset($data['image']);
        $category = Category::create($data);
        if ($image) {
            $fileName = $image->getClientOriginalName();
            $image->storeAs('uploads', $fileName, 'public');

            $category->image()->create([
                'image_name' => $fileName,
            ]);
        }
        $user = auth()->user();

        $user->notify(new CategoryNotification(
            $user->name . ' added category "' . $category->category_name . '"',
        ));

        return redirect()->route('admin.categories.index')->withSuccess('Category created Successfully!');
    }

    public function updateCategory(Category $category, array $data)
    {
        $image = $data['image'] ?? null;
        unset($data['image']);

        $category->update($data);
        if ($image) {
            $fileName = $image->getClientOriginalName();
            $image->storeAs('uploads', $fileName, 'public');

            $category->image()->create([
                'image_name' => $fileName,
            ]);
        }
        $user = auth()->user();

        $user->notify(new CategoryNotification(
            $user->name . ' Updated Category "' . $category->category_name . '"',
        ));

        return redirect()->route('admin.categories.index')->withSuccess('Category Updated Successfully!');
    }

    public function deleteCategory(Category $category)
    {
        $category->delete();

        $user = auth()->user();
        $user->notify(new CategoryNotification(
            $user->name . ' Deleted Category "' . $category->category_name . '"',
        ));

        return redirect()->route('admin.categories.index')->withSuccess('Category Deleted Successfully!');
    }
}

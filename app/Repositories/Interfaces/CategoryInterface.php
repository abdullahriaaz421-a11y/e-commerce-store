<?php

namespace App\Repositories\Interfaces;

use App\Models\Category;

interface CategoryInterface
{
    public function allCategories();

    public function getAllPaginatedCategories();

    public function createCategory(array $data);

    public function updateCategory(Category $category, array $data);

    public function deleteCategory(Category $category);
}

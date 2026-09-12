<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    public function __construct(private CategoryInterface $categoryRepo) {}

    public function index()
    {
        $categories = $this->categoryRepo->getAllPaginatedCategories();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        return $this->categoryRepo->createCategory($request->validated());
    }

    public function show(string $id) {}

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        return $this->categoryRepo->updateCategory($category, $request->validated());
    }

    public function destroy(Category $category)
    {
        return $this->categoryRepo->deleteCategory($category);
    }
}

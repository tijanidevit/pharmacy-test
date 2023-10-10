<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Category\AddCategoryRequest;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService) {}

    public function index() : View
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.categories.index', compact('categories'));
    }

    public function create() : View
    {
        return view('admin.categories.create');
    }

    public function store(AddCategoryRequest $request): RedirectResponse
    {
        $this->categoryService->addCategory($request->validated());
        return to_route('category.index')->with('success', 'Category added successfully!');
    }

    public function show(Category $category) : View
    {
        $category = $this->categoryService->getCategory($category);
        $stocks = $category->stocks;
        return view('admin.categories.show', compact('category','stocks'));
    }

    public function destroy(Category $category)
    {
        $category = $this->categoryService->deleteCategory($category);
        return to_route('category.index')->with('success', 'Category deleted successfully!');
    }
}

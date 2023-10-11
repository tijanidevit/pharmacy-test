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
        return to_route('admin.category.index')->with('success', 'Category added successfully!');
    }

    public function show($category) : View
    {
        $category = $this->categoryService->getCategory($category);
        if(!$category){
            abort(404, 'Category not found');
        }
        return view('admin.categories.show', compact('category'));
    }

    public function destroy($category)
    {
        $category = $this->categoryService->deleteCategory($category);
        return to_route('admin.category.index')->with('success', 'Category deleted successfully!');
    }
}

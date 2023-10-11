<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Services\ProductService;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\AddProductRequest;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService,protected CategoryService $categoryService) {}

    public function index() : View
    {
        $products = $this->productService->getAllProducts();
        return view('admin.products.index', compact('products'));
    }

    public function create() : View
    {
        $categories = $this->categoryService->getAllCategories();
        return view('admin.products.create', compact('categories'));
    }

    public function store(AddProductRequest $request): RedirectResponse
    {
        $this->productService->addProduct($request->validated());
        return to_route('admin.product.index')->with('success', 'Product added successfully!');
    }

    public function show($id) : View
    {
        $product = $this->productService->getProduct($id);
        return view('admin.products.show', compact('product'));
    }

    public function destroy($id)
    {
        $this->productService->deleteProduct($id);
        return to_route('admin.product.index')->with('success', 'Product deleted successfully!');
    }
}

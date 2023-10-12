<?php

namespace App\Http\Controllers\User;

use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService) {}

    public function index() : View
    {
        $products = $this->productService->getAllProducts();
        return view('user.products.index', compact('products'));
    }

    public function show($id) : View
    {
        $product = $this->productService->getProduct($id);
        return view('user.products.show', compact('product'));
    }

    public function buy($id, Request $request)
    {
        $paymentResponse = $this->productService->buyProduct($id, $request->quantity);
        if (!$paymentResponse) {
            return back()->with('error', 'Unable to complete payment');
        }
        return redirect($paymentResponse);
    }
}

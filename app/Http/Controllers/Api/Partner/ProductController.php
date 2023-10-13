<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use App\Services\ProductService;
use App\Http\Resources\ProductResource;
use App\Http\Requests\Product\AddProductRequest;

class ProductController extends Controller
{
    use ResponseTrait;
    public function __construct(protected ProductService $productService) {}

    public function index()
    {
        try {
            $products = $this->productService->getAllProducts(auth()->id());
            return $this->successResponse('Products retrieved', ProductResource::collection($products));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), 422);
        }
    }

    public function store(AddProductRequest $request)
    {
        try {
            $product = $this->productService->addProduct($request->validated());
            return $this->successResponse('Products added successfully', new ProductResource($product));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), 422);
        }
    }
}

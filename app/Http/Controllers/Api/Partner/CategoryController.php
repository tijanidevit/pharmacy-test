<?php

namespace App\Http\Controllers\Api\Partner;

use App\Http\Controllers\Controller;
use App\Traits\ResponseTrait;
use App\Services\CategoryService;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    use ResponseTrait;
    public function __construct(protected CategoryService $categoryService) {}

    public function index()
    {
        try {
            $categories = $this->categoryService->getAllCategories();
            return $this->successResponse('Categories retrieved', CategoryResource::collection($categories));
        } catch (Exception $ex) {
            return $this->errorResponse($ex->getMessage(), 422);
        }
    }
}

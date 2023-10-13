<?php

use App\Http\Controllers\Api\Partner\AuthController;
use App\Http\Controllers\Api\Partner\CategoryController;
use App\Http\Controllers\Api\Partner\ProductController;
use App\Http\Controllers\Api\Partner\SaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api')->as('api.')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth:sanctum')->as('api.')->group(function () {
    Route::get('categories', [CategoryController::class, 'index'])->name('category.index');

    Route::get('sales', [SaleController::class, 'index'])->name('sale.index');


    Route::prefix('products')->as('product.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::post('', [ProductController::class, 'store'])->name('store');
    });
});


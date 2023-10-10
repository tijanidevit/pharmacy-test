<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return to_route('login');
})->name('welcome');



Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('',function () {
        return to_route('dashboard');
    })->name('home');
    Route::get('dashboard',[DashboardController::class,'getDashboardPage'])->name('dashboard');
    Route::get('notidications',[DashboardController::class,'getSearchResult'])->name('notifications');

    // Route::get('settings',[SettingController::class,'getSettingsPage'])->name('settings');

    Route::get('logout',[LoginController::class,'logout'])->name('logout');

    Route::prefix('products')->as('product.')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('index');
        Route::get('new', [ProductController::class, 'create'])->name('create');
        Route::post('', [ProductController::class, 'store'])->name('store');
        Route::delete('{product}', [ProductController::class, 'destroy'])->name('delete');
        Route::get('{product}', [ProductController::class, 'show'])->name('show');
    });

    Route::prefix('categories')->as('category.')->group(function () {
        Route::get('', [CategoryController::class, 'index'])->name('index');
        Route::get('new', [CategoryController::class, 'create'])->name('create');
        Route::post('', [CategoryController::class, 'store'])->name('store');
        Route::get('{category}', [CategoryController::class, 'show'])->name('show');
        Route::delete('{category}', [CategoryController::class, 'destroy'])->name('delete');
    });

    Route::prefix('sales')->as('sale.')->group(function () {
        Route::get('', [SaleController::class, 'index'])->name('index');
        Route::get('new', [SaleController::class, 'create'])->name('create');
        Route::post('', [SaleController::class, 'store'])->name('store');
        Route::post('{sale}', [SaleController::class, 'store'])->name('show');
        Route::delete('{sale}', [SaleController::class, 'destroy'])->name('delete');
    });

    Route::prefix('notifications')->as('notification.')->group(function () {
        Route::get('', [NotificationController::class, 'index'])->name('index');
    });
});


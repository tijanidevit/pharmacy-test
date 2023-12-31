<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\SaleController as AdminSaleController;
use App\Http\Controllers\Admin\CustomerController as AdminCustomerController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;


//User Controllers
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\SaleController as UserSaleController;
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

Route::middleware('guest')->group(function () {
    Route::view('login', 'auth.login')->name('login');
    Route::post('login',[AuthController::class,'loginAction'])->name('loginAction');
});


Route::middleware('auth')->group(function () {

    Route::get('logout',[AuthController::class,'logout'])->name('logout');

    Route::prefix('admin')->as('admin.')->middleware(['isAdmin'])->group(function () {
        Route::get('',function () {
            return to_route('dashboard');
        })->name('home');
        Route::get('dashboard',[AdminDashboardController::class,'getDashboardPage'])->name('dashboard');
        Route::get('search',[AdminDashboardController::class,'getSearchResult'])->name('notifications');

        // Route::get('settings',[SettingController::class,'getSettingsPage'])->name('settings');


        Route::prefix('products')->as('product.')->group(function () {
            Route::get('', [AdminProductController::class, 'index'])->name('index');
            Route::get('new', [AdminProductController::class, 'create'])->name('create');
            Route::post('', [AdminProductController::class, 'store'])->name('store');
            Route::delete('{id}', [AdminProductController::class, 'destroy'])->name('delete');
            Route::get('{id}', [AdminProductController::class, 'show'])->name('show');
        });

        Route::prefix('categories')->as('category.')->group(function () {
            Route::get('', [AdminCategoryController::class, 'index'])->name('index');
            Route::get('new', [AdminCategoryController::class, 'create'])->name('create');
            Route::post('', [AdminCategoryController::class, 'store'])->name('store');
            Route::get('{id}', [AdminCategoryController::class, 'show'])->name('show');
            Route::delete('{id}', [AdminCategoryController::class, 'destroy'])->name('delete');
        });

        Route::prefix('sales')->as('sale.')->group(function () {
            Route::get('', [AdminSaleController::class, 'index'])->name('index');
            Route::get('new', [AdminSaleController::class, 'create'])->name('create');
            Route::post('', [AdminSaleController::class, 'store'])->name('store');
            Route::get('{id}', [AdminSaleController::class, 'store'])->name('show');
        });

        Route::prefix('customers')->as('customer.')->group(function () {
            Route::get('', [AdminCustomerController::class, 'index'])->name('index');
            Route::get('new', [AdminCustomerController::class, 'create'])->name('create');
            Route::post('', [AdminCustomerController::class, 'store'])->name('store');
            // Route::get('{id}', [AdminCustomerController::class, 'show'])->name('show');
        });

        Route::prefix('notifications')->as('notification.')->group(function () {
            Route::get('', [AdminNotificationController::class, 'index'])->name('index');
        });
    });

    Route::prefix('customer')->as('customer.')->middleware(['isCustomer'])->group(function () {
        Route::get('',function () {
            return to_route('product.index');
        })->name('home');

        Route::prefix('products')->as('product.')->group(function () {
            Route::get('', [UserProductController::class, 'index'])->name('index');
            Route::get('{id}', [UserProductController::class, 'show'])->name('show');

            Route::post('{id}/buy', [UserProductController::class, 'buy'])->name('buy');
        });

        Route::prefix('purchases')->as('purchase.')->group(function () {
            Route::get('', [UserSaleController::class, 'index'])->name('index');
        });
    });

});


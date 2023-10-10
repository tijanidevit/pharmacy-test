<?php


namespace App\Services;

use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;

class DashboardService {
    public function __construct(protected Stock $stock,protected Category $category,protected Product $product) {}

    public function getDashboardData() : array {
        $recentStocks = $this->stock->with('product')->latest('purchase_date')->limit(5)->get();
        $expiringStocks = $this->stock->expiryThreeMonth()->with('product')->orderBy('expiry_date')->limit(5)->get();
        $recentCategories = $this->category->latest('id')->limit(10)->get();

        return compact('recentCategories', 'recentStocks', 'expiringStocks');
    }
}

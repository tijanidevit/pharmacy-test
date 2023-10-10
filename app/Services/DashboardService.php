<?php


namespace App\Services;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class DashboardService {

    public function __construct(protected User $user,protected Category $category,protected Product $product) {
    }

    public function getDashboardData() : array {
        $customersCount = $this->user->onlyCustomers()->count();
        $partnersCount = $this->user->onlyPartners()->count();
        $productsCount = $this->product->where('owner_id', auth()->id())->count();
        return compact('customersCount', 'partnersCount', 'productsCount');
    }
}

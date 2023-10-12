<?php

namespace App\Http\Controllers\User;

use App\Services\SaleService;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    public function __construct(protected SaleService $saleService) {}

    public function index() : View
    {
        $sales = $this->saleService->getCustomerPurchases(auth()->id());
        return view('user.sales.index', compact('sales'));
    }
}

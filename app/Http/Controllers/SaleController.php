<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Services\ProductService;
use App\Services\SaleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\AddSaleRequest;

class SaleController extends Controller
{
    public function __construct(protected SaleService $saleService,protected ProductService $productService) {}

    public function index() : View
    {
        $sales = $this->saleService->getAllSales();
        return view('admin.sales.index', compact('sales'));
    }

    public function create() : View
    {
        $products = $this->productService->getAllProducts();
        return view('admin.sales.create', compact('products'));
    }

    public function store(AddSaleRequest $request): RedirectResponse
    {
        $this->saleService->addSale($request->validated());
        return to_route('sale.index')->with('success', 'Sales added successfully!');
    }

    public function destroy(Sale $sale)
    {
        $sale = $this->saleService->deleteSale($sale);
        return redirect()->back()->with('success', 'Sales deleted successfully!');
    }
}

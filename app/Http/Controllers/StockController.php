<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Services\StockService;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Stock\AddStockRequest;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct(protected StockService $stockService,protected ProductService $productService) {}

    public function index() : View
    {
        $stocks = $this->stockService->getAllStocks();
        return view('admin.stocks.index', compact('stocks'));
    }

    public function create() : View
    {
        $products = $this->productService->getAllProducts();
        return view('admin.stocks.create', compact('products'));
    }

    public function store(AddStockRequest $request): RedirectResponse
    {
        $this->stockService->addStock($request->validated());
        return to_route('stock.index')->with('success', 'Stock added successfully!');
    }

    public function show(Stock $stock) : View
    {
        $stock = $this->stockService->getStock($stock);
        return view('admin.stocks.show', compact('stock','stocks'));
    }

    public function destroy(Stock $stock)
    {
        $stock = $this->stockService->deleteStock($stock);
        return redirect()->back()->with('success', 'Stock deleted successfully!');
    }

    public function search(Request $request): View
    {
        $stocks = $this->stockService->searchStock($request->q);
        return view('admin.stocks.search', compact('stocks'))->with('success', 'Your search result');
    }
}

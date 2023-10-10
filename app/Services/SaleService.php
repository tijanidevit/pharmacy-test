<?php


namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Collection;

class SaleService {

    public function __construct(protected Sale $sale, protected Stock $stock) {}

    public function addSale($data) : Sale {
        return DB::transaction(function () use($data) {
            $data['added_by'] = auth()->id();
            $sale = $this->sale->create($data);
            $this->updateStockQuantity($data['stock_id'], $data['quantity']);
            return $sale;
        });
    }

    public function getSale($sale) : Sale {
        return $sale->load('stock','product');
    }

    public function deleteSale($sale) : bool {
        return $sale->delete();
    }

    public function getAllSales() : Collection {
        return $this->sale->with('stock','product')->latest('id')->get();
    }

    function updateStockQuantity($stockId, $quantity) : bool {
        return $this->stock->where('id', $stockId)->decrement('remaining_quantity',$quantity);
    }
}

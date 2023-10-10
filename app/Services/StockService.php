<?php


namespace App\Services;

use App\Models\Stock;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class StockService {

    public function __construct(protected Stock $stock) {}

    public function addStock($data) : Stock {
        $data['batch_no'] = Str::random(2). '-'. rand(1111111,999999);
        $data['added_by'] = auth()->id();
        $data['remaining_quantity'] = $data['quantity'];
        return $this->stock->create($data);
    }

    public function getStock($stock) : Stock {
        return $stock->load('stocks');
    }

    public function deleteStock($stock) : bool {
        return $stock->delete();
    }

    public function getByParam($param) : Stock {
        return $this->stock->where($param)->first();
    }

    public function getAllStocks() : Collection {
        return $this->stock->with('product')->latest('id')->get();
    }

    public function searchStock($searchQuery) : Collection {
        return $this->stock->with('product')->where('batch_no','like',"%$searchQuery%")->latest('batch_no')->get();
    }
}

<?php


namespace App\Services;

use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class SaleService {

    public function __construct(protected Sale $sale, protected Product $product) {}

    public function addSale($data) : Sale {
        return DB::transaction(function () use($data) {
            $data['added_by'] = auth()->id();
            $sale = $this->sale->create($data);
            $this->updateProductQuantity($data['product_id'], $data['quantity']);
            return $sale;
        });
    }

    public function getSale($id) : Sale {
        return $this->sale->whereId()->load('product','product');
    }

    public function deleteSale($sale) : bool {
        return $sale->delete();
    }

    public function getAllSales() : Collection {
        return $this->sale->with('product','product')->latest('id')->get();
    }

    public function getCustomerPurchases($customerId) {
        return $this->sale->with('product')->whereCustomerId($customerId)->latest('id')->get();
    }

    function updateProductQuantity($productId, $quantity) : bool {
        return $this->product->where('id', $productId)->decrement('quantity',$quantity);
    }


}

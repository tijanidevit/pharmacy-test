<?php


namespace App\Services;

use App\Models\Product;
use App\Traits\FileTrait;
use Illuminate\Database\Eloquent\Collection;

class ProductService {
    use FileTrait;

    public function __construct(protected Product $product) {}

    public function addProduct($data) : Product {
        $data['image'] = $this->uploadFile('images/products/',$data['image']);
        $data['added_by'] = auth()->id();
        return $this->product->create($data);
    }

    public function getProduct($product) : Product {
        return $product->load('stocks');
    }

    public function deleteProduct($product) : bool {
        return $product->delete();
    }

    public function getProductStocks($product) : Collection {
        return $product->stocks()->get();
    }

    public function getAllProducts() : Collection {
        return $this->product->with('category')->latest('id')->get();
    }
}

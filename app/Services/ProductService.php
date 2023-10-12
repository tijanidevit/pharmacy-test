<?php


namespace App\Services;

use App\Models\Product;
use App\Traits\FileTrait;
use App\Notifications\Customer\ProductOrderedNotification;
use Illuminate\Database\Eloquent\Collection;

class ProductService {
    use FileTrait;

    public function __construct(protected Product $product, protected PaystackService $paystackService) {}

    public function addProduct($data) : Product {
        $data['image'] = $this->uploadFile('images/products/',$data['image']);
        $data['owner_id'] = auth()->id();
        return $this->product->create($data);
    }

    public function getProduct($id) : Product|null {
        return $this->product->with('owner', 'category', 'sales')->whereId($id)->first();
    }

    public function deleteProduct($id) : bool {
        return $this->product->whereId($id)->delete();
    }

    public function getProductStocks($product) : Collection {
        return $product->stocks()->get();
    }

    public function getAllProducts() : Collection {
        return $this->product->with('category')->latest('id')->get();
    }



    public function buyProduct($id, $quantity) {
        $paystackResponse = json_decode($this->paystackService->acceptPayment(3000));
        if (!$paystackResponse || !$paystackResponse->status) {
            return false;
        }
        else{
            //Assumes the payment is successful and add new sales
            $product = $this->product->whereId($id)->first();
            $price = $quantity * $product->price;
            $product->sales()->create([
                'customer_id' => auth()->id(),
                'quantity' => $quantity,
                'price' => $price
            ]);

            //deduct the product quantity
            $product->decrement('quantity', $quantity);

            auth()->user()->notify(new ProductOrderedNotification($product, $quantity, $price));
            return $paystackResponse->data->authorization_url;
            //Could not complete the payment due to issue with callback Url on the payment gateway for confirmation of payment
        }


    }
}

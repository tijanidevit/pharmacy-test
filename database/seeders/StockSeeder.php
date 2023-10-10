<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::insert(
            [
                [
                    'added_by' => User::inRandomOrder()->first()->id,
                    'product_id' => Product::inRandomOrder()->first()->id,
                    'batch_no' => Str::random(2). '-'. rand(1111111,999999),
                    'price' => rand(1000, 9999),
                    'quantity' => rand(10, 99),
                    'purchase_date' => today(),
                    'expiry_date' => today(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'added_by' => User::inRandomOrder()->first()->id,
                    'product_id' => Product::inRandomOrder()->first()->id,
                    'batch_no' => Str::random(2). '-'. rand(1111111,999999),
                    'price' => rand(1000, 9999),
                    'quantity' => rand(10, 99),
                    'purchase_date' => today(),
                    'expiry_date' => today(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'added_by' => User::inRandomOrder()->first()->id,
                    'product_id' => Product::inRandomOrder()->first()->id,
                    'batch_no' => Str::random(2). '-'. rand(1111111,999999),
                    'price' => rand(1000, 9999),
                    'quantity' => rand(10, 99),
                    'purchase_date' => today(),
                    'expiry_date' => today(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'added_by' => User::inRandomOrder()->first()->id,
                    'product_id' => Product::inRandomOrder()->first()->id,
                    'batch_no' => Str::random(2). '-'. rand(1111111,999999),
                    'price' => rand(1000, 9999),
                    'quantity' => rand(10, 99),
                    'purchase_date' => today(),
                    'expiry_date' => today(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'added_by' => User::inRandomOrder()->first()->id,
                    'product_id' => Product::inRandomOrder()->first()->id,
                    'batch_no' => Str::random(2). '-'. rand(1111111,999999),
                    'price' => rand(1000, 9999),
                    'quantity' => rand(10, 99),
                    'purchase_date' => today(),
                    'expiry_date' => today(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'added_by' => User::inRandomOrder()->first()->id,
                    'product_id' => Product::inRandomOrder()->first()->id,
                    'batch_no' => Str::random(2). '-'. rand(1111111,999999),
                    'price' => rand(1000, 9999),
                    'quantity' => rand(10, 99),
                    'purchase_date' => today(),
                    'expiry_date' => today(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'added_by' => User::inRandomOrder()->first()->id,
                    'product_id' => Product::inRandomOrder()->first()->id,
                    'batch_no' => Str::random(2). '-'. rand(1111111,999999),
                    'price' => rand(1000, 9999),
                    'quantity' => rand(10, 99),
                    'purchase_date' => today(),
                    'expiry_date' => today(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::insert(
            [
                [
                    'name' => 'Carrot',
                    'added_by' => User::inRandomOrder()->first()->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'image' => url('storage/images/categories/vegetable.svg'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Cup 2',
                    'added_by' => User::inRandomOrder()->first()->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'image' => url('storage/images/categories/cup.svg'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Cup 3',
                    'added_by' => User::inRandomOrder()->first()->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'image' => url('storage/images/categories/cup.svg'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Cup ',
                    'added_by' => User::inRandomOrder()->first()->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'image' => url('storage/images/categories/cup.svg'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Cup  4',
                    'added_by' => User::inRandomOrder()->first()->id,
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'image' => url('storage/images/categories/cup.svg'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}

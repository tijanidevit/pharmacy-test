<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();
        Category::insert(
            [
                [
                    'name' => 'Groceries',
                    'added_by' => User::inRandomOrder()->first()->id,
                    'image' => url('storage/images/categories/vegetable.svg'), //$faker->image('public/storage/images/categories',640,480, null, false),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Beverages',
                    'added_by' => User::inRandomOrder()->first()->id,
                    'image' => url('storage/images/categories/cup.svg'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}

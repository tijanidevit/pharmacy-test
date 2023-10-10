<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Enums\UserRoleEnum;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Jendol Admin',
            'email' => 'admin@jendol.com',
            'role' => UserRoleEnum::ADMIN,
        ]); //Add Admin

        User::factory(5)->create(); //Add sub admin

        // $this->call(CategorySeeder::class);
        // $this->call(ProductSeeder::class);
        // $this->call(SettingSeeder::class);
        // $this->call(StockSeeder::class);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Enums\UserRoleEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Lytton Pharmacy',
            'email' => 'admin@lytton.com',
            'role' => UserRoleEnum::ADMIN,
            'password' => Hash::make('password') //can be changed later on,
        ]); //Add Admin
    }
}

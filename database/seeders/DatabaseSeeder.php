<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(PurchaseSeeder::class);
        $this->call(RentalSeeder::class);
        $this->call(AccountSeeder::class);
    }
}


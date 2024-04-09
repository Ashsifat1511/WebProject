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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Md Ashrarul Haque Sifat',
            'username' => 'sifatashrarul',
            'email' => 'sifatashrarul@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'Admin',
        ]);
        User::factory()->create([
            'name' => 'Md Ashrarul Haque Sifat',
            'username' => 'sifatashrarul09',
            'email' => 'sifatashrarul09@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'Employee',
        ]);
        $this->call(CustomerSeeder::class);
        $this->call(ItemSeeder::class);
        $this->call(PurchaseSeeder::class);
    }
}


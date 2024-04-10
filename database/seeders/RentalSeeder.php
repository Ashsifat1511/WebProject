<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RentalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rentals = [
            [
                'rentalDate' => '2024-04-10',
                'returnDate' => '2024-04-17',
                'quantity' => 1,
                'paid' => 1000,
                'amountDue' => 0,
                'User_username' => 'sifatashrarul',
                'Item_itemID' => 1,
                'Customers_customerID' => 1,
            ],
            [
                'rentalDate' => '2024-04-10',
                'returnDate' => '2024-04-17',
                'quantity' => 1,
                'paid' => 1000,
                'amountDue' => 0,
                'User_username' => 'sifatashrarul',
                'Item_itemID' => 2,
                'Customers_customerID' => 2,
            ],
            [
                'rentalDate' => '2024-04-10',
                'returnDate' => '2024-04-17',
                'quantity' => 1,
                'paid' => 1000,
                'amountDue' => 0,
                'User_username' => 'sifatashrarul09',
                'Item_itemID' => 2,
                'Customers_customerID' => 3,
            ],
        ];

        DB::table('rentals')->insert($rentals);
    }
}

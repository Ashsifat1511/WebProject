<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $purchases = [
            [
                'purchaseDate' => '2021-01-01',
                'purchaseQuantity' => 5,
                'Item_itemID' => 2,
                'Customers_customerID' => 1,
                'payAmount' => 10000.00,
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'purchaseDate' => '2021-01-02',
                'purchaseQuantity' => 2,
                'Item_itemID' => 2,
                'Customers_customerID' => 2,
                'payAmount' => 4000.00,
                'created_at' => '2021-01-02 00:00:00',
                'updated_at' => '2021-01-02 00:00:00',
            ],
        ];

        // Insert the purchases into the database
        DB::table('purchases')->insert($purchases);
    }
}

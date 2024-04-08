<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the data for items
        $items = [
            [
                'itemName' => 'Item 1',
                'stock' => 10,
                'rentalOrSale' => 'Rental',
                'salePrice' => 0.00, // Assuming 'Item 1' is not for sale
                'rentRate' => 500.00,
                'photo' => 'item1.jpg', // Assuming the photo is stored in 'public/storage/item1.jpg'
                'itemType' => 'Electronics',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'itemName' => 'Item 2',
                'stock' => 10,
                'rentalOrSale' => 'Sale',
                'salePrice' => 20000.00, // Assuming 'Item 2' is for sale
                'rentRate' => 0.00, // Assuming no rent rate for 'Item 2'
                'photo' => 'item2.jpg', // Assuming the photo is stored in 'public/storage/item2.jpg'
                'itemType' => 'Gaming',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            // Add more items as needed
        ];

        // Insert the items into the database
        DB::table('items')->insert($items);
    }
}


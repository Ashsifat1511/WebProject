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
                'itemName' => 'Car',
                'stock' => 10,
                'rentalOrSale' => 'Rental',
                'price' => 100.00, // Assuming the rental rate for 'Item 1' is $100.00
                'photo' => 'car.jpg', // Assuming the photo is stored in 'public/storage/item1.jpg'
                'itemType' => 'Others',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'itemName' => 'Computer',
                'stock' => 10,
                'rentalOrSale' => 'Sale',
                'price' => 500.00, // Assuming the sale price for 'Item 2' is $500.00
                'photo' => 'computer.jpg', // Assuming the photo is stored in 'public/storage/item2.jpg'
                'itemType' => 'Electronics',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ],
            [
                'itemName' => 'Fifa 24',
                'stock' => 100,
                'rentalOrSale' => 'Sale',
                'price' => 50.00, 
                'photo' => 'fifa24.jpg', 
                'itemType' => 'Gaming',
                'created_at' => '2021-01-01 00:00:00',
                'updated_at' => '2021-01-01 00:00:00',
            ]
        ];

        // Insert the items into the database
        DB::table('items')->insert($items);
    }
}


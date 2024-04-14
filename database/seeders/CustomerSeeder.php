<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'first_name' => 'Amit',
                'last_name' => 'Kiary',
                'address' => 'Dhaka, Bangladesh',
                'phone' => '01700000000',
                'email' => 'amit@email.com',
                'photo' => 'amit.jpg',
                'gender' => 'Male',
            ],
            [
                'first_name' => 'Anto Kumar',
                'last_name' => 'Paul',
                'address' => 'Dhaka, Bangladesh',
                'phone' => '01700000000',
                'email' => 'anto@email.com',
                'photo' => 'anto.jpg',
                'gender' => 'Male',
            ],
            [
                'first_name' => 'Tanjim',
                'last_name' => 'Raj',
                'address' => 'Dhaka, Bangladesh',
                'phone' => '01700000000',
                'email' => 'tanjim@email.com',
                'photo' => 'tanjim.jpg',
                'gender' => 'Male',
            ]
        ];

        DB::table('customers')->insert($customers);
    }
}

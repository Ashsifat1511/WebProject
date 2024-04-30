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
                'username' => 'amit',
                'address' => 'Dhaka, Bangladesh',
                'phone' => '01700000000',
                'email' => 'amit@email.com',
                'password' => bcrypt('password'),
                'photo' => 'amit.jpg',
                'gender' => 'Male',
            ],
            [
                'first_name' => 'Anto Kumar',
                'last_name' => 'Paul',
                'username' => 'antokumarpaul',
                'address' => 'Dhaka, Bangladesh',
                'phone' => '01700000000',
                'email' => 'anto@email.com',
                'password' => bcrypt('password'),
                'photo' => 'anto.jpg',
                'gender' => 'Male',
            ],
            [
                'first_name' => 'Tanjim',
                'last_name' => 'Raj',
                'username' => 'tanjimraj',
                'address' => 'Dhaka, Bangladesh',
                'phone' => '01700000000',
                'email' => 'tanjim@email.com',
                'password' => bcrypt('password'),
                'photo' => 'tanjim.jpg',
                'gender' => 'Male',
            ]
        ];

        DB::table('customers')->insert($customers);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =[
            [
                'name' => 'Md Ashrarul Haque Sifat',
                'username' => 'sifatashrarul',
                'email' => 'sifatashrarul@gmail.com',
                'cid' => null,
                'password' => bcrypt('1234'),
                'role' => 'Admin',
                'photo' => 'sifat.jpg',
            ],
            [
                'name' => 'Md Ashrarul Haque Sifat',
                'username' => 'sifatashrarul09',
                'email' => 'sifatashrarul09@gmail.com',
                'cid' => null,
                'password' => bcrypt('1234'),
                'role' => 'Employee',
                'photo' => 'sifat.jpg',
            ],
            [
                'name' => 'Efty Hasan',
                'username' => 'efty',
                'email' => 'eft@email.com',
                'cid' => null,
                'password' => bcrypt('1234'),
                'role' => 'Admin',
                'photo' => 'efty.jpg',
            ],
            [
                'name' => 'Amit Kiary',
                'username' => 'amit',
                'email' => 'amit@email.com',
                'cid' => 1,
                'password' => bcrypt('1234'),
                'role' => 'Customer',
                'photo' => 'amit.jpg',
            ],
            [
                'name' => 'Anto Kumar Paul',
                'username' => 'antokumarpaul',
                'email' => 'anto@email.com',
                'cid' => 2, 
                'password' => bcrypt('1234'),
                'role' => 'Customer',
                'photo' => 'anto.jpg',
            ],
            [
                'name' => 'Tanjim Raj',
                'username' => 'tanjimraj',
                'email' => 'tanjim@email.com',
                'cid' => 3,
                'password' => bcrypt('1234'),
                'role' => 'Customer',
                'photo' => 'tanjim.jpg',
            ]
        ];

        DB::table('users')->insert($users);
    }
}

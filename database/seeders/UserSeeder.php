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
                'password' => bcrypt('1234'),
                'role' => 'Admin',
            ],
            [
                'name' => 'Md Ashrarul Haque Sifat',
                'username' => 'sifatashrarul09',
                'email' => 'sifatashrarul09@gmail.com',
                'password' => bcrypt('1234'),
                'role' => 'Employee',
            ],
            [
                'name' => 'Efty Hasan',
                'username' => 'efty',
                'email' => 'eft@email.com',
                'password' => bcrypt('1234'),
                'role' => 'Admin',
            ],
        ];

        DB::table('users')->insert($users);
    }
}

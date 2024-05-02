<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            [
                'accountName' => 'Account 1',
                'accountDetails' => 'Details for Account 1',
                'Customers_customerID' => 1,
                'payMethod' => 'Cheque',
            ],
            [
                'accountName' => 'Account 2',
                'accountDetails' => 'Details for Account 2',
                'Customers_customerID' => 2,
                'payMethod' => 'Cash',
            ],
            [
                'accountName' => 'Account 3',
                'accountDetails' => 'Details for Account 3',
                'Customers_customerID' => 3,
                'payMethod' => 'Card',
            ],
        ];

        DB::table('accounts')->insert($accounts);
    }
}

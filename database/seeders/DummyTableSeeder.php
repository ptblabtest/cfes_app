<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DummyTableSeeder extends Seeder
{

    public function run()
    {
        // Accounts
        $accounts = [
            [
                'account_number' => '123456',
                'name' => 'Account A',
                'type' => 'Savings',
                'is_active' => true,
            ],
            [
                'account_number' => '789012',
                'name' => 'Account B',
                'type' => 'Checking',
                'is_active' => false,
            ],
        ];

        foreach ($accounts as $account) {
            DB::table('accounts')->updateOrInsert(
                ['account_number' => $account['account_number']],
                $account
            );
        }

        // Customers
        $customers = [
            [
                'name' => 'John Doe',
                'address' => '1234 Main St, Anytown, USA',
                'phone' => '555-1234',
                'email' => 'johndoe@example.com',
            ],
            [
                'name' => 'Jane Smith',
                'address' => '5678 Market St, Anycity, USA',
                'phone' => '555-5678',
                'email' => 'janesmith@example.com',
            ],
        ];

        foreach ($customers as $customer) {
            DB::table('customers')->updateOrInsert(
                ['email' => $customer['email']],
                $customer
            );
        }

        // Vendors
        $vendors = [
            [
                'name' => 'Vendor One',
                'address' => '100 Side St, Cityville, USA',
                'phone' => '555-1001',
                'email' => 'contact@vendorone.com',
            ],
            [
                'name' => 'Vendor Two',
                'address' => '200 Another Rd, Townsville, USA',
                'phone' => '555-2002',
                'email' => 'info@vendortwo.com',
            ],
        ];

        foreach ($vendors as $vendor) {
            DB::table('vendors')->updateOrInsert(
                ['email' => $vendor['email']],
                $vendor
            );
        }

        // Products
        $products = [
            [
                'name' => 'Product A',
                'description' => 'Description of product A',
                'is_active' => true,
            ],
            [
                'name' => 'Product B',
                'description' => 'Description of product B',
                'is_active' => false,
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->updateOrInsert(
                ['name' => $product['name']],
                $product
            );
        }
    }
}

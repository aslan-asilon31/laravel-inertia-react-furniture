<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CustomerAddressesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 20 customer address records
        $addresses = [
            [
                'customer_id' => \App\Models\Customer::first()->id, // First customer
                'type' => 'shipping',
                'address_line_1' => '123 Main St',
                'address_line_2' => 'Apt 4B',
                'city' => 'Jakarta',
                'state' => 'DKI Jakarta',
                'postal_code' => '12345',
                'country' => 'Indonesia',
                'is_default' => true,
            ],
            [
                'customer_id' => \App\Models\Customer::skip(1)->first()->id, // Second customer
                'type' => 'billing',
                'address_line_1' => '456 Oak St',
                'address_line_2' => 'Suite 2C',
                'city' => 'Surabaya',
                'state' => 'East Java',
                'postal_code' => '67890',
                'country' => 'Indonesia',
                'is_default' => false,
            ],
            [
                'customer_id' => \App\Models\Customer::skip(2)->first()->id, // Third customer
                'type' => 'shipping',
                'address_line_1' => '789 Pine St',
                'address_line_2' => 'Floor 3',
                'city' => 'Bandung',
                'state' => 'West Java',
                'postal_code' => '11223',
                'country' => 'Indonesia',
                'is_default' => true,
            ],
            [
                'customer_id' => \App\Models\Customer::skip(3)->first()->id, // Fourth customer
                'type' => 'billing',
                'address_line_1' => '101 Maple St',
                'address_line_2' => 'Block A',
                'city' => 'Medan',
                'state' => 'North Sumatra',
                'postal_code' => '44556',
                'country' => 'Indonesia',
                'is_default' => false,
            ],
            [
                'customer_id' => \App\Models\Customer::skip(4)->first()->id, // Fifth customer
                'type' => 'shipping',
                'address_line_1' => '202 Cedar St',
                'address_line_2' => '',
                'city' => 'Denpasar',
                'state' => 'Bali',
                'postal_code' => '33445',
                'country' => 'Indonesia',
                'is_default' => true,
            ],
            [
                'customer_id' => \App\Models\Customer::skip(5)->first()->id, // Sixth customer
                'type' => 'billing',
                'address_line_1' => '303 Birch St',
                'address_line_2' => 'Room 5',
                'city' => 'Yogyakarta',
                'state' => 'DIY',
                'postal_code' => '55667',
                'country' => 'Indonesia',
                'is_default' => false,
            ],
            [
                'customer_id' => \App\Models\Customer::skip(6)->first()->id, // Seventh customer
                'type' => 'shipping',
                'address_line_1' => '404 Elm St',
                'address_line_2' => '',
                'city' => 'Malang',
                'state' => 'East Java',
                'postal_code' => '77889',
                'country' => 'Indonesia',
                'is_default' => true,
            ],
            [
                'customer_id' => \App\Models\Customer::skip(7)->first()->id, // Eighth customer
                'type' => 'billing',
                'address_line_1' => '505 Willow St',
                'address_line_2' => 'Flat 8A',
                'city' => 'Semarang',
                'state' => 'Central Java',
                'postal_code' => '88990',
                'country' => 'Indonesia',
                'is_default' => false,
            ],
            [
                'customer_id' => \App\Models\Customer::skip(8)->first()->id, // Ninth customer
                'type' => 'shipping',
                'address_line_1' => '606 Ash St',
                'address_line_2' => 'Unit 12',
                'city' => 'Makassar',
                'state' => 'South Sulawesi',
                'postal_code' => '12321',
                'country' => 'Indonesia',
                'is_default' => true,
            ],
            [
                'customer_id' => \App\Models\Customer::skip(9)->first()->id, // Tenth customer
                'type' => 'billing',
                'address_line_1' => '707 Pine St',
                'address_line_2' => 'Tower B',
                'city' => 'Palembang',
                'state' => 'South Sumatra',
                'postal_code' => '43210',
                'country' => 'Indonesia',
                'is_default' => false,
            ],
            // Add 10 more similar address records...
        ];

        foreach ($addresses as $address) {
            DB::table('customer_addresses')->insert([
                'id' => (string) Str::uuid(),
                'customer_id' => $address['customer_id'],
                'type' => $address['type'],
                'address_line_1' => $address['address_line_1'],
                'address_line_2' => $address['address_line_2'],
                'city' => $address['city'],
                'state' => $address['state'],
                'postal_code' => $address['postal_code'],
                'country' => $address['country'],
                'is_default' => $address['is_default'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

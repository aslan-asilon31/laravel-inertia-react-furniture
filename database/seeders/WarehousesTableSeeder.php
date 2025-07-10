<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WarehousesTableSeeder extends Seeder
{
    public function run()
    {
        $warehouses = [
            ['name' => 'Warehouse 1', 'address' => '123 Main St', 'city' => 'Jakarta', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 2', 'address' => '456 Oak St', 'city' => 'Surabaya', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 3', 'address' => '789 Pine St', 'city' => 'Bandung', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 4', 'address' => '101 Maple St', 'city' => 'Medan', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 5', 'address' => '202 Cedar St', 'city' => 'Denpasar', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 6', 'address' => '303 Birch St', 'city' => 'Yogyakarta', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 7', 'address' => '404 Elm St', 'city' => 'Malang', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 8', 'address' => '505 Willow St', 'city' => 'Semarang', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 9', 'address' => '606 Ash St', 'city' => 'Makassar', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 10', 'address' => '707 Pine St', 'city' => 'Palembang', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 11', 'address' => '808 Oak St', 'city' => 'Surabaya', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 12', 'address' => '909 Maple St', 'city' => 'Bogor', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 13', 'address' => '1011 Cedar St', 'city' => 'Sidoarjo', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 14', 'address' => '1213 Birch St', 'city' => 'Bekasi', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 15', 'address' => '1415 Elm St', 'city' => 'Tangerang', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 16', 'address' => '1617 Willow St', 'city' => 'Depok', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 17', 'address' => '1819 Ash St', 'city' => 'Solo', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 18', 'address' => '2021 Pine St', 'city' => 'Cimahi', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 19', 'address' => '2223 Oak St', 'city' => 'Balikpapan', 'country' => 'Indonesia'],
            ['name' => 'Warehouse 20', 'address' => '2425 Maple St', 'city' => 'Pontianak', 'country' => 'Indonesia'],
        ];

        foreach ($warehouses as $warehouse) {
            DB::table('warehouses')->insert([
                'id' => (string) Str::uuid(),
                'name' => $warehouse['name'],
                'address' => $warehouse['address'],
                'city' => $warehouse['city'],
                'country' => $warehouse['country'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

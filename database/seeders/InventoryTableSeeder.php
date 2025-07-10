<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InventoryTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 20 inventory records
        $inventoryData = [
            [
                'product_variant_id' => \App\Models\ProductVariant::first()->id,
                'warehouse_id' => \App\Models\Warehouse::first()->id,
                'quantity' => 100,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(1)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(1)->first()->id,
                'quantity' => 150,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(2)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(2)->first()->id,
                'quantity' => 200,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(3)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(3)->first()->id,
                'quantity' => 50,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(4)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(4)->first()->id,
                'quantity' => 75,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(5)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(5)->first()->id,
                'quantity' => 90,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(6)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(6)->first()->id,
                'quantity' => 120,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(7)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(7)->first()->id,
                'quantity' => 110,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(8)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(8)->first()->id,
                'quantity' => 130,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(9)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(9)->first()->id,
                'quantity' => 140,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(10)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(10)->first()->id,
                'quantity' => 150,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(11)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(11)->first()->id,
                'quantity' => 100,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(12)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(12)->first()->id,
                'quantity' => 90,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(13)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(13)->first()->id,
                'quantity' => 160,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(14)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(14)->first()->id,
                'quantity' => 50,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(15)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(15)->first()->id,
                'quantity' => 200,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(16)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(16)->first()->id,
                'quantity' => 70,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(17)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(17)->first()->id,
                'quantity' => 90,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(18)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(18)->first()->id,
                'quantity' => 80,
            ],
            [
                'product_variant_id' => \App\Models\ProductVariant::skip(19)->first()->id,
                'warehouse_id' => \App\Models\Warehouse::skip(19)->first()->id,
                'quantity' => 150,
            ],
        ];

        foreach ($inventoryData as $inventory) {
            DB::table('inventory')->insert([
                'id' => (string) Str::uuid(),
                'product_variant_id' => $inventory['product_variant_id'],
                'warehouse_id' => $inventory['warehouse_id'],
                'quantity' => $inventory['quantity'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

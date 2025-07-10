<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderItemsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 20 order item records
        $orderItems = [
            [
                'order_id' => \App\Models\Order::first()->id, // First order
                'product_variant_id' => \App\Models\ProductVariant::first()->id,
                'quantity' => 2,
                'price' => 250.00,
            ],
            [
                'order_id' => \App\Models\Order::skip(1)->first()->id, // Second order
                'product_variant_id' => \App\Models\ProductVariant::skip(1)->first()->id,
                'quantity' => 1,
                'price' => 150.00,
            ],
            [
                'order_id' => \App\Models\Order::skip(2)->first()->id, // Third order
                'product_variant_id' => \App\Models\ProductVariant::skip(2)->first()->id,
                'quantity' => 3,
                'price' => 200.00,
            ],
            [
                'order_id' => \App\Models\Order::skip(3)->first()->id, // Fourth order
                'product_variant_id' => \App\Models\ProductVariant::skip(3)->first()->id,
                'quantity' => 5,
                'price' => 100.00,
            ],
            [
                'order_id' => \App\Models\Order::skip(4)->first()->id, // Fifth order
                'product_variant_id' => \App\Models\ProductVariant::skip(4)->first()->id,
                'quantity' => 2,
                'price' => 180.00,
            ],
            [
                'order_id' => \App\Models\Order::skip(5)->first()->id, // Sixth order
                'product_variant_id' => \App\Models\ProductVariant::skip(5)->first()->id,
                'quantity' => 4,
                'price' => 120.00,
            ],
            [
                'order_id' => \App\Models\Order::skip(6)->first()->id, // Seventh order
                'product_variant_id' => \App\Models\ProductVariant::skip(6)->first()->id,
                'quantity' => 1,
                'price' => 300.00,
            ],
            [
                'order_id' => \App\Models\Order::skip(7)->first()->id, // Eighth order
                'product_variant_id' => \App\Models\ProductVariant::skip(7)->first()->id,
                'quantity' => 3,
                'price' => 250.00,
            ],
            [
                'order_id' => \App\Models\Order::skip(8)->first()->id, // Ninth order
                'product_variant_id' => \App\Models\ProductVariant::skip(8)->first()->id,
                'quantity' => 2,
                'price' => 350.00,
            ],
            [
                'order_id' => \App\Models\Order::skip(9)->first()->id, // Tenth order
                'product_variant_id' => \App\Models\ProductVariant::skip(9)->first()->id,
                'quantity' => 6,
                'price' => 200.00,
            ],
            // Add more order item records as needed...
        ];

        foreach ($orderItems as $orderItem) {
            DB::table('order_items')->insert([
                'id' => (string) Str::uuid(),
                'order_id' => $orderItem['order_id'],
                'product_variant_id' => $orderItem['product_variant_id'],
                'quantity' => $orderItem['quantity'],
                'price' => $orderItem['price'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

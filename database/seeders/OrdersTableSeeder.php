<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrdersTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 10 orders
        $orders = [
            [
                'customer_id' => \App\Models\Customer::first()->id,
                'order_number' => 'ORD0001',
                'subtotal' => 500.00,
                'tax' => 50.00,
                'shipping_cost' => 20.00,
                'total' => 570.00,
                'status' => 'pending',
                'shipping_address_id' => \App\Models\CustomerAddress::first()->id,
                'billing_address_id' => \App\Models\CustomerAddress::skip(1)->first()->id,
                'notes' => 'Urgent delivery, please handle with care.',
            ],
            [
                'customer_id' => \App\Models\Customer::skip(1)->first()->id,
                'order_number' => 'ORD0002',
                'subtotal' => 750.00,
                'tax' => 75.00,
                'shipping_cost' => 25.00,
                'total' => 850.00,
                'status' => 'processing',
                'shipping_address_id' => \App\Models\CustomerAddress::skip(2)->first()->id,
                'billing_address_id' => \App\Models\CustomerAddress::skip(3)->first()->id,
                'notes' => 'Gift wrapping requested.',
            ],
            [
                'customer_id' => \App\Models\Customer::skip(2)->first()->id,
                'order_number' => 'ORD0003',
                'subtotal' => 300.00,
                'tax' => 30.00,
                'shipping_cost' => 15.00,
                'total' => 345.00,
                'status' => 'shipped',
                'shipping_address_id' => \App\Models\CustomerAddress::skip(4)->first()->id,
                'billing_address_id' => \App\Models\CustomerAddress::skip(5)->first()->id,
                'notes' => 'Standard delivery.',
            ],
            [
                'customer_id' => \App\Models\Customer::skip(3)->first()->id,
                'order_number' => 'ORD0004',
                'subtotal' => 1000.00,
                'tax' => 100.00,
                'shipping_cost' => 30.00,
                'total' => 1130.00,
                'status' => 'delivered',
                'shipping_address_id' => \App\Models\CustomerAddress::skip(6)->first()->id,
                'billing_address_id' => \App\Models\CustomerAddress::skip(7)->first()->id,
                'notes' => 'Please call before delivery.',
            ],
            [
                'customer_id' => \App\Models\Customer::skip(4)->first()->id,
                'order_number' => 'ORD0005',
                'subtotal' => 1200.00,
                'tax' => 120.00,
                'shipping_cost' => 50.00,
                'total' => 1370.00,
                'status' => 'cancelled',
                'shipping_address_id' => \App\Models\CustomerAddress::skip(8)->first()->id,
                'billing_address_id' => \App\Models\CustomerAddress::skip(9)->first()->id,
                'notes' => 'Order was cancelled before shipment.',
            ],
            // Add 5 more order records here...
        ];

        foreach ($orders as $order) {
            DB::table('orders')->insert([
                'id' => (string) Str::uuid(),
                'customer_id' => $order['customer_id'],
                'order_number' => $order['order_number'],
                'subtotal' => $order['subtotal'],
                'tax' => $order['tax'],
                'shipping_cost' => $order['shipping_cost'],
                'total' => $order['total'],
                'status' => $order['status'],
                'shipping_address_id' => $order['shipping_address_id'],
                'billing_address_id' => $order['billing_address_id'],
                'notes' => $order['notes'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

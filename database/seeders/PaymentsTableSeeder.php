<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 10 payment records
        $payments = [
            [
                'order_id' => \App\Models\Order::first()->id, // First order
                'transaction_id' => 'TXN0001',
                'payment_method' => 'paypal',
                'amount' => 570.00,
                'status' => 'completed',
            ],
            [
                'order_id' => \App\Models\Order::skip(1)->first()->id, // Second order
                'transaction_id' => 'TXN0002',
                'payment_method' => 'credit_card',
                'amount' => 850.00,
                'status' => 'failed',
            ],
            [
                'order_id' => \App\Models\Order::skip(2)->first()->id, // Third order
                'transaction_id' => 'TXN0003',
                'payment_method' => 'paypal',
                'amount' => 345.00,
                'status' => 'completed',
            ],
            [
                'order_id' => \App\Models\Order::skip(3)->first()->id, // Fourth order
                'transaction_id' => 'TXN0004',
                'payment_method' => 'credit_card',
                'amount' => 1130.00,
                'status' => 'completed',
            ],
            [
                'order_id' => \App\Models\Order::skip(4)->first()->id, // Fifth order
                'transaction_id' => 'TXN0005',
                'payment_method' => 'paypal',
                'amount' => 1370.00,
                'status' => 'waiting-for-payment',
            ],
            [
                'order_id' => \App\Models\Order::skip(5)->first()->id, // Sixth order
                'transaction_id' => 'TXN0006',
                'payment_method' => 'credit_card',
                'amount' => 500.00,
                'status' => 'completed',
            ],
            [
                'order_id' => \App\Models\Order::skip(6)->first()->id, // Seventh order
                'transaction_id' => 'TXN0007',
                'payment_method' => 'paypal',
                'amount' => 750.00,
                'status' => 'completed',
            ],
            [
                'order_id' => \App\Models\Order::skip(7)->first()->id, // Eighth order
                'transaction_id' => 'TXN0008',
                'payment_method' => 'credit_card',
                'amount' => 350.00,
                'status' => 'failed',
            ],
            [
                'order_id' => \App\Models\Order::skip(8)->first()->id, // Ninth order
                'transaction_id' => 'TXN0009',
                'payment_method' => 'paypal',
                'amount' => 800.00,
                'status' => 'completed',
            ],
            [
                'order_id' => \App\Models\Order::skip(9)->first()->id, // Tenth order
                'transaction_id' => 'TXN0010',
                'payment_method' => 'credit_card',
                'amount' => 950.00,
                'status' => 'completed',
            ],
        ];

        foreach ($payments as $payment) {
            DB::table('payments')->insert([
                'id' => (string) Str::uuid(),
                'order_id' => $payment['order_id'],
                'transaction_id' => $payment['transaction_id'],
                'payment_method' => $payment['payment_method'],
                'amount' => $payment['amount'],
                'status' => $payment['status'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

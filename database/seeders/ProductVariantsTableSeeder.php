<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductVariantsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 10 product variants
        $productVariants = [
            [
                'product_id' => \App\Models\Product::first()->id, // First product
                'sku' => 'SKU0001',
                'price_modifier' => 50.00,
                'quantity' => 100,
                'image' => 'path_to_image/variant1.jpg',
            ],
            [
                'product_id' => \App\Models\Product::skip(1)->first()->id, // Second product
                'sku' => 'SKU0002',
                'price_modifier' => 75.00,
                'quantity' => 150,
                'image' => 'path_to_image/variant2.jpg',
            ],
            [
                'product_id' => \App\Models\Product::skip(2)->first()->id, // Third product
                'sku' => 'SKU0003',
                'price_modifier' => 100.00,
                'quantity' => 200,
                'image' => 'path_to_image/variant3.jpg',
            ],
            [
                'product_id' => \App\Models\Product::skip(3)->first()->id, // Fourth product
                'sku' => 'SKU0004',
                'price_modifier' => 120.00,
                'quantity' => 50,
                'image' => 'path_to_image/variant4.jpg',
            ],
            [
                'product_id' => \App\Models\Product::skip(4)->first()->id, // Fifth product
                'sku' => 'SKU0005',
                'price_modifier' => 30.00,
                'quantity' => 75,
                'image' => 'path_to_image/variant5.jpg',
            ],
            [
                'product_id' => \App\Models\Product::skip(5)->first()->id, // Sixth product
                'sku' => 'SKU0006',
                'price_modifier' => 60.00,
                'quantity' => 90,
                'image' => 'path_to_image/variant6.jpg',
            ],
            [
                'product_id' => \App\Models\Product::skip(6)->first()->id, // Seventh product
                'sku' => 'SKU0007',
                'price_modifier' => 80.00,
                'quantity' => 120,
                'image' => 'path_to_image/variant7.jpg',
            ],
            [
                'product_id' => \App\Models\Product::skip(7)->first()->id, // Eighth product
                'sku' => 'SKU0008',
                'price_modifier' => 55.00,
                'quantity' => 140,
                'image' => 'path_to_image/variant8.jpg',
            ],
            [
                'product_id' => \App\Models\Product::skip(8)->first()->id, // Ninth product
                'sku' => 'SKU0009',
                'price_modifier' => 110.00,
                'quantity' => 50,
                'image' => 'path_to_image/variant9.jpg',
            ],
            [
                'product_id' => \App\Models\Product::skip(9)->first()->id, // Tenth product
                'sku' => 'SKU0010',
                'price_modifier' => 65.00,
                'quantity' => 110,
                'image' => 'path_to_image/variant10.jpg',
            ],
        ];

        foreach ($productVariants as $variant) {
            DB::table('product_variants')->insert([
                'id' => (string) Str::uuid(),
                'product_id' => $variant['product_id'],
                'sku' => $variant['sku'],
                'price_modifier' => $variant['price_modifier'],
                'quantity' => $variant['quantity'],
                'image' => $variant['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

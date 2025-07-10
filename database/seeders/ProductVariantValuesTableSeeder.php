<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductVariantValuesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 10 product variant values
        $variantValues = [
            [
                'product_id' => \App\Models\Product::first()->id, // First product
                'attribute_id' => \App\Models\Attribute::where('name', 'Color')->first()->id,
            ],
            [
                'product_id' => \App\Models\Product::skip(1)->first()->id, // Second product
                'attribute_id' => \App\Models\Attribute::where('name', 'Size')->first()->id,
            ],
            [
                'product_id' => \App\Models\Product::skip(2)->first()->id, // Third product
                'attribute_id' => \App\Models\Attribute::where('name', 'Material')->first()->id,
            ],
            [
                'product_id' => \App\Models\Product::skip(3)->first()->id, // Fourth product
                'attribute_id' => \App\Models\Attribute::where('name', 'Weight')->first()->id,
            ],
            [
                'product_id' => \App\Models\Product::skip(4)->first()->id, // Fifth product
                'attribute_id' => \App\Models\Attribute::where('name', 'Brand')->first()->id,
            ],
            [
                'product_id' => \App\Models\Product::skip(5)->first()->id, // Sixth product
                'attribute_id' => \App\Models\Attribute::where('name', 'Color')->first()->id,
            ],
            [
                'product_id' => \App\Models\Product::skip(6)->first()->id, // Seventh product
                'attribute_id' => \App\Models\Attribute::where('name', 'Size')->first()->id,
            ],
            [
                'product_id' => \App\Models\Product::skip(7)->first()->id, // Eighth product
                'attribute_id' => \App\Models\Attribute::where('name', 'Material')->first()->id,
            ],
            [
                'product_id' => \App\Models\Product::skip(8)->first()->id, // Ninth product
                'attribute_id' => \App\Models\Attribute::where('name', 'Weight')->first()->id,
            ],
            [
                'product_id' => \App\Models\Product::skip(9)->first()->id, // Tenth product
                'attribute_id' => \App\Models\Attribute::where('name', 'Brand')->first()->id,
            ],
        ];

        foreach ($variantValues as $variantValue) {
            DB::table('product_variant_values')->insert([
                'id' => (string) Str::uuid(),
                'product_id' => $variantValue['product_id'],
                'attribute_id' => $variantValue['attribute_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

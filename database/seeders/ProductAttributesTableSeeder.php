<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductAttributesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 10 product attributes
        $productAttributes = [
            ['product_id' => \App\Models\Product::first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Color')->first()->id],
            ['product_id' => \App\Models\Product::first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Size')->first()->id],
            ['product_id' => \App\Models\Product::skip(1)->first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Material')->first()->id],
            ['product_id' => \App\Models\Product::skip(1)->first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Weight')->first()->id],
            ['product_id' => \App\Models\Product::skip(2)->first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Brand')->first()->id],
            ['product_id' => \App\Models\Product::skip(2)->first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Color')->first()->id],
            ['product_id' => \App\Models\Product::skip(3)->first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Size')->first()->id],
            ['product_id' => \App\Models\Product::skip(3)->first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Material')->first()->id],
            ['product_id' => \App\Models\Product::skip(4)->first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Weight')->first()->id],
            ['product_id' => \App\Models\Product::skip(4)->first()->id, 'attribute_id' => \App\Models\Attribute::where('name', 'Brand')->first()->id],
        ];

        foreach ($productAttributes as $productAttribute) {
            DB::table('product_attributes')->insert([
                'id' => (string) Str::uuid(),
                'product_id' => $productAttribute['product_id'],
                'attribute_id' => $productAttribute['attribute_id'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

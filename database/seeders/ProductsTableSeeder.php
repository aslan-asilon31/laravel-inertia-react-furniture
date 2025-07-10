<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 20 products
        for ($i = 1; $i <= 20; $i++) {
            DB::table('products')->insert([
                'id' => (string) Str::uuid(),
                'name' => 'Product ' . $i,
                'sku' => 'SKU' . $i,
                'slug' => 'product-' . $i,
                'description' => 'This is the description for product ' . $i,
                'long_description' => 'This is a long description for product ' . $i . '. It contains more detailed information about the product.',
                'price' => rand(10000, 100000) / 100,
                'category_id' =>  '4f8a8028-5a93-4403-9ae0-9a0483b06774',
                'main_image' => 'path_to_image/product_image_' . $i . '.jpg',
                'gallery_images' => json_encode([
                    'path_to_gallery_image_1_' . $i . '.jpg',
                    'path_to_gallery_image_2_' . $i . '.jpg'
                ]),
                'is_active' => true,
                'is_featured' => $i % 2 == 0 ? true : false, // Mark even-numbered products as featured
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

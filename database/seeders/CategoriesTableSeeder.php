<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 10 categories
        $categories = [
            [
                'name' => 'Furniture',
                'slug' => 'furniture',
                'description' => 'Furniture items for the home and office',
                'parent_id' => null,
                'image' => 'path_to_image/furniture_image.jpg',
            ],
            [
                'name' => 'Living Room Furniture',
                'slug' => 'living-room-furniture',
                'description' => 'Furniture for the living room, including sofas, chairs, and tables.',
                'parent_id' => null,
                'image' => 'path_to_image/living_room_image.jpg',
            ],
            [
                'name' => 'Bedroom Furniture',
                'slug' => 'bedroom-furniture',
                'description' => 'Furniture for the bedroom, including beds, nightstands, and wardrobes.',
                'parent_id' => null,
                'image' => 'path_to_image/bedroom_image.jpg',
            ],
            [
                'name' => 'Office Furniture',
                'slug' => 'office-furniture',
                'description' => 'Furniture for office spaces, including desks, chairs, and cabinets.',
                'parent_id' => null,
                'image' => 'path_to_image/office_image.jpg',
            ],
            [
                'name' => 'Kitchen Furniture',
                'slug' => 'kitchen-furniture',
                'description' => 'Furniture for the kitchen, including dining tables, chairs, and storage.',
                'parent_id' => null,
                'image' => 'path_to_image/kitchen_image.jpg',
            ],
            [
                'name' => 'Outdoor Furniture',
                'slug' => 'outdoor-furniture',
                'description' => 'Furniture for outdoor spaces, including garden chairs, tables, and benches.',
                'parent_id' => null,
                'image' => 'path_to_image/outdoor_image.jpg',
            ],
            [
                'name' => 'Storage Furniture',
                'slug' => 'storage-furniture',
                'description' => 'Furniture for storage, such as cabinets, shelves, and wardrobes.',
                'parent_id' => null,
                'image' => 'path_to_image/storage_image.jpg',
            ],
            [
                'name' => 'Bathroom Furniture',
                'slug' => 'bathroom-furniture',
                'description' => 'Furniture for the bathroom, including vanities, mirrors, and cabinets.',
                'parent_id' => null,
                'image' => 'path_to_image/bathroom_image.jpg',
            ],
            [
                'name' => 'Lighting',
                'slug' => 'lighting',
                'description' => 'Lighting solutions, including lamps, chandeliers, and ceiling lights.',
                'parent_id' => null,
                'image' => 'path_to_image/lighting_image.jpg',
            ],
            [
                'name' => 'Decor',
                'slug' => 'decor',
                'description' => 'Home decor items such as vases, wall art, and mirrors.',
                'parent_id' => null,
                'image' => 'path_to_image/decor_image.jpg',
            ]
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'id' => (string) Str::uuid(),
                'name' => $category['name'],
                'slug' => $category['slug'],
                'description' => $category['description'],
                'parent_id' => $category['parent_id'],
                'image' => $category['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

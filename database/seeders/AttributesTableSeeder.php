<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributesTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 10 attributes for product variations
        $attributes = [
            ['name' => 'Color', 'type' => 'text'],
            ['name' => 'Size', 'type' => 'text'],
            ['name' => 'Material', 'type' => 'text'],
            ['name' => 'Weight', 'type' => 'text'],
            ['name' => 'Brand', 'type' => 'text'],
            ['name' => 'Width', 'type' => 'text'],
            ['name' => 'Height', 'type' => 'text'],
            ['name' => 'Length', 'type' => 'text'],
            ['name' => 'Pattern', 'type' => 'text'],
            ['name' => 'Style', 'type' => 'text'],
        ];

        foreach ($attributes as $attribute) {
            DB::table('attributes')->insert([
                'id' => (string) Str::uuid(),
                'name' => $attribute['name'],
                'type' => $attribute['type'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

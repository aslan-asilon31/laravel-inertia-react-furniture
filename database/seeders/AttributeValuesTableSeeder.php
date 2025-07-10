<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AttributeValuesTableSeeder extends Seeder
{
    public function run()
    {
        $attributeValues = [
            // Color attribute values
            ['attribute_id' => $this->getAttributeIdByName('Color'), 'value' => 'Red', 'code' => '#FF0000'],
            ['attribute_id' => $this->getAttributeIdByName('Color'), 'value' => 'Blue', 'code' => '#0000FF'],
            ['attribute_id' => $this->getAttributeIdByName('Color'), 'value' => 'Green', 'code' => '#00FF00'],
            // Lanjutkan untuk atribut lainnya...
        ];

        foreach ($attributeValues as $value) {
            if ($value['attribute_id']) {
                DB::table('attribute_values')->insert([
                    'id' => (string) Str::uuid(),
                    'attribute_id' => $value['attribute_id'],
                    'value' => $value['value'],
                    'code' => $value['code'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    private function getAttributeIdByName($name)
    {
        $attribute = \App\Models\Attribute::where('name', $name)->first();
        return $attribute ? $attribute->id : null; // Jika tidak ditemukan, kembalikan null
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 10 review records
        $reviews = [
            [
                'product_id' => \App\Models\Product::first()->id,
                'customer_id' => \App\Models\Customer::first()->id,
                'rating' => 5,
                'comment' => 'Excellent product! Highly recommend.',
                'is_approved' => true,
            ],
            [
                'product_id' => \App\Models\Product::skip(1)->first()->id,
                'customer_id' => \App\Models\Customer::skip(1)->first()->id,
                'rating' => 4,
                'comment' => 'Very good quality, but a bit pricey.',
                'is_approved' => true,
            ],
            [
                'product_id' => \App\Models\Product::skip(2)->first()->id,
                'customer_id' => \App\Models\Customer::skip(2)->first()->id,
                'rating' => 3,
                'comment' => 'The product is decent, but it could be improved.',
                'is_approved' => true,
            ],
            [
                'product_id' => \App\Models\Product::skip(3)->first()->id,
                'customer_id' => \App\Models\Customer::skip(3)->first()->id,
                'rating' => 2,
                'comment' => 'Not satisfied with the product, it did not meet my expectations.',
                'is_approved' => false,
            ],
            [
                'product_id' => \App\Models\Product::skip(4)->first()->id,
                'customer_id' => \App\Models\Customer::skip(4)->first()->id,
                'rating' => 1,
                'comment' => 'Terrible product! Would not recommend to anyone.',
                'is_approved' => false,
            ],
            [
                'product_id' => \App\Models\Product::skip(5)->first()->id,
                'customer_id' => \App\Models\Customer::skip(5)->first()->id,
                'rating' => 4,
                'comment' => 'Good product, would buy again.',
                'is_approved' => true,
            ],
            [
                'product_id' => \App\Models\Product::skip(6)->first()->id,
                'customer_id' => \App\Models\Customer::skip(6)->first()->id,
                'rating' => 5,
                'comment' => 'Amazing product! Worth every penny.',
                'is_approved' => true,
            ],
            [
                'product_id' => \App\Models\Product::skip(7)->first()->id,
                'customer_id' => \App\Models\Customer::skip(7)->first()->id,
                'rating' => 3,
                'comment' => 'It works well, but the delivery was delayed.',
                'is_approved' => true,
            ],
            [
                'product_id' => \App\Models\Product::skip(8)->first()->id,
                'customer_id' => \App\Models\Customer::skip(8)->first()->id,
                'rating' => 4,
                'comment' => 'Good quality overall, but could improve the packaging.',
                'is_approved' => true,
            ],
            [
                'product_id' => \App\Models\Product::skip(9)->first()->id,
                'customer_id' => \App\Models\Customer::skip(9)->first()->id,
                'rating' => 2,
                'comment' => 'Not as expected, the product is slightly damaged.',
                'is_approved' => false,
            ],
        ];

        foreach ($reviews as $review) {
            DB::table('reviews')->insert([
                'id' => (string) Str::uuid(),
                'product_id' => $review['product_id'],
                'customer_id' => $review['customer_id'],
                'rating' => $review['rating'],
                'comment' => $review['comment'],
                'is_approved' => $review['is_approved'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

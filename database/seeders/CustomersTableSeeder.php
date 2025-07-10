<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        // Insert 20 customer records
        $customers = [
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john.doe@example.com',
                'phone' => '081234567890',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Doe',
                'email' => 'jane.doe@example.com',
                'phone' => '081234567891',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Alex',
                'last_name' => 'Smith',
                'email' => 'alex.smith@example.com',
                'phone' => '081234567892',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Emma',
                'last_name' => 'Johnson',
                'email' => 'emma.johnson@example.com',
                'phone' => '081234567893',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Michael',
                'last_name' => 'Brown',
                'email' => 'michael.brown@example.com',
                'phone' => '081234567894',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Sophia',
                'last_name' => 'Williams',
                'email' => 'sophia.williams@example.com',
                'phone' => '081234567895',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'James',
                'last_name' => 'Davis',
                'email' => 'james.davis@example.com',
                'phone' => '081234567896',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Olivia',
                'last_name' => 'Martinez',
                'email' => 'olivia.martinez@example.com',
                'phone' => '081234567897',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Liam',
                'last_name' => 'Garcia',
                'email' => 'liam.garcia@example.com',
                'phone' => '081234567898',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Ava',
                'last_name' => 'Rodriguez',
                'email' => 'ava.rodriguez@example.com',
                'phone' => '081234567899',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Ethan',
                'last_name' => 'Hernandez',
                'email' => 'ethan.hernandez@example.com',
                'phone' => '081234567900',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Isabella',
                'last_name' => 'Lopez',
                'email' => 'isabella.lopez@example.com',
                'phone' => '081234567901',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Lucas',
                'last_name' => 'Gonzalez',
                'email' => 'lucas.gonzalez@example.com',
                'phone' => '081234567902',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Mia',
                'last_name' => 'Wilson',
                'email' => 'mia.wilson@example.com',
                'phone' => '081234567903',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Benjamin',
                'last_name' => 'Anderson',
                'email' => 'benjamin.anderson@example.com',
                'phone' => '081234567904',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Charlotte',
                'last_name' => 'Thomas',
                'email' => 'charlotte.thomas@example.com',
                'phone' => '081234567905',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Henry',
                'last_name' => 'Taylor',
                'email' => 'henry.taylor@example.com',
                'phone' => '081234567906',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Amelia',
                'last_name' => 'Moore',
                'email' => 'amelia.moore@example.com',
                'phone' => '081234567907',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Daniel',
                'last_name' => 'Jackson',
                'email' => 'daniel.jackson@example.com',
                'phone' => '081234567908',
                'password' => Hash::make('password123')
            ],
            [
                'first_name' => 'Harper',
                'last_name' => 'Martin',
                'email' => 'harper.martin@example.com',
                'phone' => '081234567909',
                'password' => Hash::make('password123')
            ],
        ];

        foreach ($customers as $customer) {
            DB::table('customers')->insert([
                'id' => (string) Str::uuid(),
                'first_name' => $customer['first_name'],
                'last_name' => $customer['last_name'],
                'email' => $customer['email'],
                'email_verified_at' => now(),
                'password' => $customer['password'],
                'phone' => $customer['phone'],
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

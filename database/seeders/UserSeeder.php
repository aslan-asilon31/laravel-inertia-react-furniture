<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name' => 'Andi Setiawan', 'email' => 'andi.setiawan@example.com'],
            ['name' => 'Budi Santoso', 'email' => 'budi.santoso@example.com'],
            ['name' => 'Citra Dewi', 'email' => 'citra.dewi@example.com'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi.lestari@example.com'],
            ['name' => 'Eka Prasetya', 'email' => 'eka.prasetya@example.com'],
            ['name' => 'Fajar Hidayat', 'email' => 'fajar.hidayat@example.com'],
            ['name' => 'Gina Susanti', 'email' => 'gina.susanti@example.com'],
            ['name' => 'Hadi Wijaya', 'email' => 'hadi.wijaya@example.com'],
            ['name' => 'Ika Puspita', 'email' => 'ika.puspita@example.com'],
            ['name' => 'Joko Susilo', 'email' => 'joko.susilo@example.com'],
            ['name' => 'Kiki Maulana', 'email' => 'kiki.maulana@example.com'],
            ['name' => 'Lina Oktaviani', 'email' => 'lina.oktaviani@example.com'],
            ['name' => 'Maya Sari', 'email' => 'maya.sari@example.com'],
            ['name' => 'Nina Kurniawati', 'email' => 'nina.kurniawati@example.com'],
            ['name' => 'Oka Rendra', 'email' => 'oka.rendra@example.com'],
            ['name' => 'Putri Rahayu', 'email' => 'putri.rahayu@example.com'],
            ['name' => 'Rudi Hartono', 'email' => 'rudi.hartono@example.com'],
            ['name' => 'Sari Wulandari', 'email' => 'sari.wulandari@example.com'],
            ['name' => 'Tika Ayu', 'email' => 'tika.ayu@example.com'],
            ['name' => 'Umar Fauzi', 'email' => 'umar.fauzi@example.com'],

            ['name' => 'Admin', 'email' => 'admin@example.com', 'role' => 'admin'],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('123456'),
            ]);
        }
    }
}

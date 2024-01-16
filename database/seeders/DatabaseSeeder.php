<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRole;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::create([
            'name' => 'Test admin',
            'nomor_induk' => '001',
            'email' => 'admin@example.com',
            'password' => bcrypt('testuser'),
            'role' => UserRole::Admin,
        ]);
        \App\Models\User::create([
            'name' => 'Test wakur',
            'nomor_induk' => '002',
            'email' => 'wakur@example.com',
            'password' => bcrypt('testuser'),
            'role' => UserRole::WakilKurikulum,
        ]);
    }
}

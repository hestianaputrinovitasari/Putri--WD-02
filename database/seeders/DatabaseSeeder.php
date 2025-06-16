<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PoliSeeder::class,              // ✅ Tambahkan ini
            UserSeeder::class,
            ObatSeeder::class,
            JadwalPeriksaSeeder::class,
        ]);
    }
}

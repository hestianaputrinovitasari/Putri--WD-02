<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('poli')->insert([
            [
                'nama' => 'Poli Gigi', // <-- pakai awalan Poli
                'deskripsi' => 'Pelayanan pemeriksaan dan perawatan gigi serta mulut.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Poli Anak',
                'deskripsi' => 'Pelayanan kesehatan untuk bayi dan anak-anak.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Poli Penyakit Dalam',
                'deskripsi' => 'Menangani penyakit organ dalam seperti jantung, paru-paru, ginjal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        
    }
}

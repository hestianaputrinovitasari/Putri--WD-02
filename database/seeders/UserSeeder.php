<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Poli;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil ID poli berdasarkan nama
        $poliGigi = Poli::where('nama', 'Poli Gigi')->first()->id ?? null;
        $poliAnak = Poli::where('nama', 'Poli Anak')->first()->id ?? null;
        $poliPenyakitDalam = Poli::where('nama', 'Poli Penyakit Dalam')->first()->id ?? null;

        // Seeder Dokter
        User::create([
            'role' => 'dokter',
            'nama' => 'Dr. Andi Wijaya',
            'email' => 'andi@klinik.test',
            'password' => bcrypt('password'),
            'alamat' => 'Jl. Kesehatan No. 10',
            'no_ktp' => '1234567890123456',
            'no_hp' => '081234567890',
            'no_rm' => null,
            'id_poli' => $poliGigi,
        ]);

        User::create([
            'role' => 'dokter',
            'nama' => 'Dr. Siti Hidayah',
            'email' => 'siti@klinik.test',
            'password' => bcrypt('password'),
            'alamat' => 'Jl. Sehat Selalu No. 5',
            'no_ktp' => '2345678901234567',
            'no_hp' => '081298765432',
            'no_rm' => null,
            'id_poli' => $poliAnak,
        ]);

        User::create([
            'role' => 'dokter',
            'nama' => 'Dr. Hestiana, S.pd',
            'email' => 'hestiana@gmail.com',
            'password' => bcrypt('anakkedua02'),
            'alamat' => 'Jl. Kesehatan No. 10',
            'no_ktp' => '1234567890123456',
            'no_hp' => '081234567890',
            'no_rm' => null,
            'id_poli' => $poliPenyakitDalam,
        ]);

        // Seeder Pasien
        User::create([
            'role' => 'pasien',
            'nama' => 'Ahmad Fauzi',
            'email' => 'ahmad@klinik.test',
            'password' => bcrypt('password'),
            'alamat' => 'Jl. Melati No. 3',
            'no_ktp' => '3456789012345678',
            'no_hp' => '082134567890',
            'no_rm' => 'RM001',
            'id_poli' => null,
        ]);

        User::create([
            'role' => 'pasien',
            'nama' => 'Rina Kartika',
            'email' => 'rina@klinik.test',
            'password' => bcrypt('password'),
            'alamat' => 'Jl. Mawar No. 7',
            'no_ktp' => '4567890123456789',
            'no_hp' => '083245678901',
            'no_rm' => 'RM002',
            'id_poli' => null,
        ]);
    }
}

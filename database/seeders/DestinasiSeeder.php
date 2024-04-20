<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DestinasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('destinasi')->insert([
            [
                'destinasi_awal' => 'Jakarta',
                'destinasi_akhir' => 'Bandung',
                'jenis_kendaraan' => 'Bus',
                'no_plat' => 'B 1234 AB',
                'hari_berangkat' => '2024-04-20',
                'jumlah_kursi' => 50,
                'jumlah_bagasi' => 20,
                'foto' => 'jakarta_bandung_bus.jpg',
                'deskripsi' => 'Perjalanan dari Jakarta ke Bandung menggunakan bus ini memakan waktu sekitar 3 jam.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'destinasi_awal' => 'Surabaya',
                'destinasi_akhir' => 'Malang',
                'jenis_kendaraan' => 'Kereta Api',
                'no_plat' => 'K 5678 CD',
                'hari_berangkat' => '2024-04-22',
                'jumlah_kursi' => 100,
                'jumlah_bagasi' => 10,
                'foto' => 'surabaya_malang_train.jpg',
                'deskripsi' => 'Perjalanan dari Surabaya ke Malang menggunakan kereta api ini memakan waktu sekitar 2 jam.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}

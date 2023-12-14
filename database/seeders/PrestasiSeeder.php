<?php

namespace Database\Seeders;

use App\Models\Prestasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prestasi::create([
            'siswa_id'          => '78791950',
            'jenis_prestasi'    => 'Non-Akademik',
            'deskripsi'         => 'Karate',
            'tanggal'           => '2023-10-12',
        ]);
    }
}

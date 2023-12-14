<?php

namespace Database\Seeders;

use App\Models\TahunAjaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TahunAjaran::create([
            'tahun_ajaran'      => '2022/2023',
            'semester'          => 'Ganjil',
            'tanggal_mulai'     => '2022-07-12',
            'tanggal_selesai'   => '2022-12-26',
        ]);

        TahunAjaran::create([
            'tahun_ajaran'      => '2022/2023',
            'semester'          => 'Genap',
            'tanggal_mulai'     => '2023-01-10',
            'tanggal_selesai'   => '2023-06-28',
        ]);

        TahunAjaran::create([
            'tahun_ajaran'      => '2023/2024',
            'semester'          => 'Ganjil',
            'tanggal_mulai'     => '2023-07-12',
            'tanggal_selesai'   => '2023-12-26',
        ]);

        TahunAjaran::create([
            'tahun_ajaran'      => '2023/2024',
            'semester'          => 'Genap',
            'tanggal_mulai'     => '2024-01-12',
            'tanggal_selesai'   => '2024-06-26',
        ]);
    }
}

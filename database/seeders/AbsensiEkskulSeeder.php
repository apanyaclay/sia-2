<?php

namespace Database\Seeders;

use App\Models\AbsensiEkskul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiEkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AbsensiEkskul::create([
            'tanggal'       => '2023-11-06',
            'ekskul_siswa_id'       => '1',
            'status'       => 'Hadir',
        ]);

        AbsensiEkskul::create([
            'tanggal'       => '2023-11-13',
            'ekskul_siswa_id'       => '1',
            'status'       => 'Hadir',
        ]);

        AbsensiEkskul::create([
            'tanggal'       => '2023-11-20',
            'ekskul_siswa_id'       => '1',
            'status'       => 'Hadir',
        ]);

        AbsensiEkskul::create([
            'tanggal'       => '2023-11-27',
            'ekskul_siswa_id'       => '1',
            'status'       => 'Hadir',
        ]);

        AbsensiEkskul::create([
            'tanggal'       => '2023-12-04',
            'ekskul_siswa_id'       => '1',
            'status'       => 'Hadir',
        ]);
    }
}

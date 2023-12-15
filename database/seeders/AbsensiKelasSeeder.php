<?php

namespace Database\Seeders;

use App\Models\AbsensiKelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AbsensiKelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AbsensiKelas::create([
            'tanggal'       => '2023-12-15',
            'siswa_id'       => '78791950',
            'status'       => 'Hadir',
        ]);

        AbsensiKelas::create([
            'tanggal'       => '2023-12-16',
            'siswa_id'       => '78791950',
            'status'       => 'Hadir',
        ]);

        AbsensiKelas::create([
            'tanggal'       => '2023-12-17',
            'siswa_id'       => '78791950',
            'status'       => 'Hadir',
        ]);

        AbsensiKelas::create([
            'tanggal'       => '2023-12-18',
            'siswa_id'       => '78791950',
            'status'       => 'Hadir',
        ]);

        AbsensiKelas::create([
            'tanggal'       => '2023-12-19',
            'siswa_id'       => '78791950',
            'status'       => 'Hadir',
        ]);
    }
}

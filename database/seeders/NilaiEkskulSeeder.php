<?php

namespace Database\Seeders;

use App\Models\NilaiEkskul;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiEkskulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NilaiEkskul::create([
            'ekskul_siswa_id'   => '1',
            'nilai'             => 'A',
            'keterangan'        => 'Sering Mengikuti Kegiatan Ekstrakulikuler',
        ]);

        NilaiEkskul::create([
            'ekskul_siswa_id'   => '2',
            'nilai'             => 'A',
            'keterangan'        => 'Sering Mengikuti Kegiatan Ekstrakulikuler',
        ]);

        NilaiEkskul::create([
            'ekskul_siswa_id'   => '3',
            'nilai'             => 'A',
            'keterangan'        => 'Sering Mengikuti Kegiatan Ekstrakulikuler',
        ]);

        NilaiEkskul::create([
            'ekskul_siswa_id'   => '4',
            'nilai'             => 'A',
            'keterangan'        => 'Sering Mengikuti Kegiatan Ekstrakulikuler',
        ]);

        NilaiEkskul::create([
            'ekskul_siswa_id'   => '5',
            'nilai'             => 'A',
            'keterangan'        => 'Sering Mengikuti Kegiatan Ekstrakulikuler',
        ]);
    }
}

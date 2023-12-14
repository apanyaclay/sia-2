<?php

namespace Database\Seeders;

use App\Models\KepalaSekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KepalaSekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KepalaSekolah::create([
            'id_kepsek'             => '15312312',
            'user_id'               => '1',
            'nama_kepsek'           => 'SYAFRIZAL',
            'jenjang_pendidikan'    => 'S-1 EKONOMI',
            'jenis_kelamin'         => 'L',
            'tempat_lahir'          => 'MEDAN DENAI',
            'tanggal_lahir'         => '1993-06-17',
            'tmt_kerja'             => '2016-07-18',
            'status'                => 'Aktif',
        ]); 
    }
}

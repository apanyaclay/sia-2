<?php

namespace Database\Seeders;

use App\Models\TataUsaha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TataUsahaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TataUsaha::create([
            'id_pegawai'            => '19880834',
            'user_id'               => '2',
            'nama_pegawai'          => 'CHANDRA',
            'jenis_kelamin'         => 'L',
            'tmt_kerja'             => '2010-10-11',
            'tempat_lahir'          => 'MEDAN',
            'tanggal_lahir'         => '1988-02-23',
            'jenjang_pendidikan'    => 'D-3 ILMU KOMPUTER',
            'status'                => 'Aktif',
        ]);

        TataUsaha::create([
            'id_pegawai'            => '19880835',
            'user_id'               => '3',
            'nama_pegawai'          => 'Nabila',
            'jenis_kelamin'         => 'P',
            'tmt_kerja'             => '2010-10-11',
            'tempat_lahir'          => 'MEDAN DENAI',
            'tanggal_lahir'         => '1988-02-23',
            'jenjang_pendidikan'    => 'D-3 ILMU KOMPUTER',
            'status'                => 'Aktif',
        ]);
    }
}

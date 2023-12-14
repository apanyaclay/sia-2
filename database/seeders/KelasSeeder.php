<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'guru_id'                 => '1148770671130093',
            'nama_kelas'               => 'Kelas 7-1',
            'tingkatan'                   => '7',
            'kelompok_kelas'             => 'A',
        ]);

        Kelas::create([
            'guru_id'                 => '5853776677230002',
            'nama_kelas'               => 'Kelas 7-2',
            'tingkatan'                   => '7',
            'kelompok_kelas'             => 'B',
        ]);

        Kelas::create([
            'guru_id'                 => '7545772673130023',
            'nama_kelas'               => 'Kelas 8-1',
            'tingkatan'                   => '8',
            'kelompok_kelas'             => 'A',
        ]);

        Kelas::create([
            'guru_id'                 => '9261764666210083',
            'nama_kelas'               => 'Kelas 8-2',
            'tingkatan'                   => '8',
            'kelompok_kelas'             => 'B',
        ]);

        Kelas::create([
            'guru_id'                 => '9736764665230312',
            'nama_kelas'               => 'Kelas 9-1',
            'tingkatan'                   => '9',
            'kelompok_kelas'             => 'A',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\MataPelajaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MataPelajaran::create([
            'nama_mapel'    => 'BAHASA INDONESIA',
            'kkm'           => '75',
            'guru_id'       => '1148770671130093',
        ]);

        MataPelajaran::create([
            'nama_mapel'    => 'BAHASA INGGRIS',
            'kkm'           => '70',
            'guru_id'       => '7545772673130023',
        ]);

        MataPelajaran::create([
            'nama_mapel'    => 'ILMU PENGETAHUAN ALAM',
            'kkm'           => '75',
            'guru_id'       => '1252771672230163',
        ]);

        MataPelajaran::create([
            'nama_mapel'    => 'ILMU PENGETAHUAN SOSIAL',
            'kkm'           => '75',
            'guru_id'       => '9736764665230312',
        ]);

        MataPelajaran::create([
            'nama_mapel'    => 'MATEMATIKA',
            'kkm'           => '75',
            'guru_id'       => '2344763664110023',
        ]);

        MataPelajaran::create([
            'nama_mapel'    => 'PENDIDIKAN BUDI PEKERTI',
            'kkm'           => '75',
            'guru_id'       => '5853776677230002',
        ]);

        MataPelajaran::create([
            'nama_mapel'    => 'PENDIDIKAN JASMANI, OLAHRAGA DAN KESEHATAN',
            'kkm'           => '70',
            'guru_id'       => '8450774675230033',
        ]);

        MataPelajaran::create([
            'nama_mapel'    => 'PENDIDIKAN PANCASILA DAN KEWARGANEGARAAN',
            'kkm'           => '75',
            'guru_id'       => '1554758660110042',
        ]);

        MataPelajaran::create([
            'nama_mapel'    => 'SENI BUDAYA',
            'kkm'           => '75',
            'guru_id'       => '9261764666210083',
        ]);

        MataPelajaran::create([
            'nama_mapel'    => 'TEKNOLOGI INFORMASI DAN KOMUNIKASI',
            'kkm'           => '75',
            'guru_id'       => '9736764665230666',
        ]);
    }
}

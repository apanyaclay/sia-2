<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guru::create([
            'nuptk'                 => '1148770671130093',
            'user_id'               => '4',
            'nip'                   => '1222035608920007',
            'nama_guru'             => 'Herlia Puspita Dewi A',
            'jenis_kelamin'         => 'P',
            'tempat_lahir'          => 'Pulau Raja',
            'tanggal_lahir'         => '1992-08-16',
            'status_kepegawaian'    => 'GTY/PTY',
            'jenis_ptk'             => 'Guru Wali Kelas',
            'jenjang_pendidikan'    => 'S1-Bahasa Indonesia',
            'tmt_kerja'             => '2017-07-18',
            'jjm'                   => '36',
            'status'                => 'Aktif',
        ]);

        Guru::create([
            'nuptk'                 => '1252771672230163',
            'user_id'               => '5',
            'nip'                   => '121987652200',
            'nama_guru'             => 'Putri Yunita',
            'jenis_kelamin'         => 'P',
            'tempat_lahir'          => 'Medan',
            'tanggal_lahir'         => '1993-06-17',
            'status_kepegawaian'    => 'GTY/PTY',
            'jenis_ptk'             => 'Guru Mapel',
            'jenjang_pendidikan'    => 'S1-Ekonomi',
            'tmt_kerja'             => '2016-07-18',
            'jjm'                   => '12',
            'status'                => 'Aktif',
        ]);

        Guru::create([
            'nuptk'                 => '1554758660110042',
            'user_id'               => '6',
            'nip'                   => '1271142202800007',
            'nama_guru'             => 'Muhammad Haris',
            'jenis_kelamin'         => 'L',
            'tempat_lahir'          => 'Pangakalian',
            'tanggal_lahir'         => '1980-02-22',
            'status_kepegawaian'    => 'Guru Honor',
            'jenis_ptk'             => 'Guru Mapel',
            'jenjang_pendidikan'    => 'S1-Hukum',
            'tmt_kerja'             => '2019-07-15',
            'jjm'                   => '18',
            'status'                => 'Aktif',
        ]);

        Guru::create([
            'nuptk'                 => '2344763664110023',
            'user_id'               => '7',
            'nip'                   => '1208304408060001',
            'nama_guru'             => 'SYAHPUTRA EFENDI',
            'jenis_kelamin'         => 'L',
            'tempat_lahir'          => 'Medan',
            'tanggal_lahir'         => '1985-10-12',
            'status_kepegawaian'    => 'GTY/PTY',
            'jenis_ptk'             => 'Guru Mapel',
            'jenjang_pendidikan'    => 'S1 - MATEMATIKA',
            'tmt_kerja'             => '2017-07-18',
            'jjm'                   => '30',
            'status'                => 'Aktif',
        ]);

        Guru::create([
            'nuptk'                 => '5853776677230002',
            'user_id'               => '8',
            'nip'                   => '1207256105980001',
            'nama_guru'             => 'Nurhasanah',
            'jenis_kelamin'         => 'P',
            'tempat_lahir'          => 'Manunggal',
            'tanggal_lahir'         => '1998-05-21',
            'status_kepegawaian'    => 'GTY/PTY',
            'jenis_ptk'             => 'Guru Wali Kelas',
            'jenjang_pendidikan'    => 'S1-Pendidikan Agama Islam',
            'tmt_kerja'             => '2019-07-18',
            'jjm'                   => '12',
            'status'                => 'Aktif',
        ]);

        Guru::create([
            'nuptk'                 => '7545772673130023',
            'user_id'               => '9',
            'nip'                   => '1271065312940001',
            'nama_guru'             => 'Della Tria Putri',
            'jenis_kelamin'         => 'P',
            'tempat_lahir'          => 'Medan',
            'tanggal_lahir'         => '1994-12-13',
            'status_kepegawaian'    => 'GTY/PTY',
            'jenis_ptk'             => 'Guru Wali Kelas',
            'jenjang_pendidikan'    => 'S1-Bahasa Inggris',
            'tmt_kerja'             => '2016-07-18',
            'jjm'                   => '24',
            'status'                => 'Aktif',
        ]);

        Guru::create([
            'nuptk'                 => '8450774675230033',
            'user_id'               => '10',
            'nip'                   => '1219084209000005',
            'nama_guru'             => 'SITI AMINAH',
            'jenis_kelamin'         => 'P',
            'tempat_lahir'          => 'PADANG KEDONDONG',
            'tanggal_lahir'         => '1996-11-18',
            'status_kepegawaian'    => 'GTY/PTY',
            'jenis_ptk'             => 'Guru Mapel',
            'jenjang_pendidikan'    => 'S-1 Pendidikan Kepelatihan',
            'tmt_kerja'             => '2019-07-01',
            'jjm'                   => '18',
            'status'                => 'Aktif',
        ]);

        Guru::create([
            'nuptk'                 => '9261764666210083',
            'user_id'               => '11',
            'nip'                   => '1219054901020008',
            'nama_guru'             => 'WINASTRI',
            'jenis_kelamin'         => 'P',
            'tempat_lahir'          => 'HELVETIA',
            'tanggal_lahir'         => '1986-09-29',
            'status_kepegawaian'    => 'GTY/PTY',
            'jenis_ptk'             => 'Guru Wali Kelas',
            'jenjang_pendidikan'    => 'S1 - PENDIDIKAN SENI BUDAYA',
            'tmt_kerja'             => '2009-07-17',
            'jjm'                   => '4',
            'status'                => 'Aktif',
        ]);

        Guru::create([
            'nuptk'                 => '9736764665230312',
            'user_id'               => '12',
            'nip'                   => '1213034404860005',
            'nama_guru'             => 'Nursakinah',
            'jenis_kelamin'         => 'P',
            'tempat_lahir'          => 'Hutarimbaru',
            'tanggal_lahir'         => '1986-04-04',
            'status_kepegawaian'    => 'GTY/PTY',
            'jenis_ptk'             => 'Guru Wali Kelas',
            'jenjang_pendidikan'    => 'S1-Ilmu Pengetahuan Sosial',
            'tmt_kerja'             => '2017-07-18',
            'jjm'                   => '24',
            'status'                => 'Aktif',
        ]);

        Guru::create([
            'nuptk'                 => '9736764665230666',
            'user_id'               => '13',
            'nip'                   => '1222035607120007',
            'nama_guru'             => 'SHAFIRA HILMI WAHYUDI',
            'jenis_kelamin'         => 'P',
            'tempat_lahir'          => 'MEDAN',
            'tanggal_lahir'         => '1998-06-03',
            'status_kepegawaian'    => 'GTY/PTY',
            'jenis_ptk'             => 'Guru Mapel',
            'jenjang_pendidikan'    => 'SMA/SEDERAJAT',
            'tmt_kerja'             => '2020-07-13',
            'jjm'                   => '18',
            'status'                => 'Aktif',
        ]);
    }
}

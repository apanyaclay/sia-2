<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'nisn'              => '78791950',
            'user_id'           => '14',
            'nama_siswa'        => 'ADITYA ALFARIZ',
            'jenis_kelamin'     => 'L',
            'tempat_lahir'      => 'MEDAN DENAI',
            'tanggal_lahir'     => '2007-10-15',
            'kelas_id'          => '1',
            'agama'             => 'Hindu',
            'alamat'            => 'JL. K.L. YOS SUDARSO LINK III KM 9,5, KELURAHAN MABAR, KECAMATAN MEDAN DENAI, 20242',
            'no_hp'             => '082361335050',
            'status_dlm_klrg'   => 'Anak Kandung',
            'nama_ayah'         => 'RAHMANSYAH',
            'nama_ibu'          => 'NUR ASYIAH',
            'pekerjaan_ayah'    => 'WIRASWASTA',
            'pekerjaan_ibu'     => 'WIRASWASTA',
            'sekolah_asal'      => 'SDS PUTRA NEGERI',
            'status_siswa'      => 'Aktif',
            'anak_ke'           => '1',
        ]);

        Siswa::create([
            'nisn'              => '91676040',
            'user_id'           => '15',
            'nama_siswa'        => 'ADAM AGUSTIAN',
            'jenis_kelamin'     => 'L',
            'tempat_lahir'      => 'MEDAN',
            'tanggal_lahir'     => '2009-08-11',
            'kelas_id'          => '1',
            'agama'             => 'Islam',
            'alamat'            => 'JL. NUSA INDAH GG. FLAMBOYAN, KELURAHAN TANJUNG MULIA, KECAMATAN MEDAN DELI, KODE POS 20241',
            'no_hp'             => '081397922960',
            'status_dlm_klrg'   => 'Anak Kandung',
            'nama_ayah'         => 'ADI ISWANTO',
            'nama_ibu'          => 'WINARTIK',
            'pekerjaan_ayah'    => 'WIRASWASTA',
            'pekerjaan_ibu'     => 'WIRASWASTA',
            'sekolah_asal'      => 'SD Sutomo',
            'status_siswa'      => 'Aktif',
            'anak_ke'           => '2',
        ]);

        Siswa::create([
            'nisn'              => '108254549',
            'user_id'           => '16',
            'nama_siswa'        => 'AILA ALMIRA',
            'jenis_kelamin'     => 'P',
            'tempat_lahir'      => 'MEDAN',
            'tanggal_lahir'     => '2010-09-16',
            'kelas_id'          => '1',
            'agama'             => 'Hindu',
            'alamat'            => 'JL. NUSA INDAH Gg. FLAMBOYAN, KELURAHAN TANJUNG MULIA, KECAMATAN MEDAN DELI, 20241',
            'no_hp'             => '085679037660',
            'status_dlm_klrg'   => 'Anak Kandung',
            'nama_ayah'         => 'ANDI PURNAMA',
            'nama_ibu'          => 'BEDA MANDASARI',
            'pekerjaan_ayah'    => 'WIRASWASTA',
            'pekerjaan_ibu'     => 'WIRASWASTA',
            'sekolah_asal'      => 'SDS AMALYATUL HUDA',
            'status_siswa'      => 'Aktif',
            'anak_ke'           => '3',
        ]);

        Siswa::create([
            'nisn'              => '109600822',
            'user_id'           => '17',
            'nama_siswa'        => 'AFDU FIKAR',
            'jenis_kelamin'     => 'L',
            'tempat_lahir'      => 'SEI MUKA',
            'tanggal_lahir'     => '2010-12-13',
            'kelas_id'          => '1',
            'agama'             => 'Kristen',
            'alamat'            => 'JL. DUSUN IV A PASAR VII DESA MANUNGGAL, KECAMATAN MEDAN DENAI,',
            'no_hp'             => '082361335050',
            'status_dlm_klrg'   => 'Anak Kandung',
            'nama_ayah'         => 'MISKUN',
            'nama_ibu'          => 'IIN NURLENI',
            'pekerjaan_ayah'    => 'WIRASWASTA',
            'pekerjaan_ibu'     => 'WIRASWASTA',
            'sekolah_asal'      => 'SDS AMALYATUL HUDA',
            'status_siswa'      => 'Aktif',
            'anak_ke'           => '1',
        ]);

        Siswa::create([
            'nisn'              => '114715088',
            'user_id'           => '18',
            'nama_siswa'        => 'AHMAD JUHARI SITEPU',
            'jenis_kelamin'     => 'L',
            'tempat_lahir'      => 'SEI MUKA 2',
            'tanggal_lahir'     => '2012-01-22',
            'kelas_id'          => '1',
            'agama'             => 'Kristen',
            'alamat'            => 'DUSUN III Anjung Ganjang, KECAMATAN SIMPANG EMPAT,21271',
            'no_hp'             => '082267878625',
            'status_dlm_klrg'   => 'Anak Kandung',
            'nama_ayah'         => 'AGUS SITEPU',
            'nama_ibu'          => 'DARMA WATI BR BUTAR BUTAR',
            'pekerjaan_ayah'    => 'WIRASWASTA',
            'pekerjaan_ibu'     => 'WIRASWASTA',
            'sekolah_asal'      => 'UPTD SDN 016546 TELUK DALAM',
            'status_siswa'      => 'Aktif',
            'anak_ke'           => '1',
        ]);

        Siswa::create([
            'nisn'              => '117795632',
            'user_id'           => '19',
            'nama_siswa'        => 'ABDUL ROSYIIT',
            'jenis_kelamin'     => 'L',
            'tempat_lahir'      => 'LANGKAT',
            'tanggal_lahir'     => '2007-10-15',
            'kelas_id'          => '1',
            'agama'             => 'Katholik',
            'alamat'            => 'DUSUN 1 TANJUNG JATI KECAMATAN BINJAI, KODE POS 20...',
            'no_hp'             => '082164934533',
            'status_dlm_klrg'   => 'Anak Tiri',
            'nama_ayah'         => 'MISDIANTO',
            'nama_ibu'          => 'SRI WAHYUNI',
            'pekerjaan_ayah'    => 'WIRASWASTA',
            'pekerjaan_ibu'     => 'WIRASWASTA',
            'sekolah_asal'      => 'SD NEGERI 026606',
            'status_siswa'      => 'Aktif',
            'anak_ke'           => '1',
        ]);

        Siswa::create([
            'nisn'              => '1412612',
            'user_id'           => '20',
            'nama_siswa'        => 'DILLA FAHRA',
            'jenis_kelamin'     => 'P',
            'tempat_lahir'      => 'MARELAN',
            'tanggal_lahir'     => '2007-10-15',
            'kelas_id'          => '1',
            'agama'             => 'Konghucu',
            'alamat'            => 'JL. K.L. YOS SUDARSO LINK III KM 9,5, KELURAHAN MABAR, KECAMATAN MEDAN DENAI, 20242',
            'no_hp'             => '08236121440',
            'status_dlm_klrg'   => 'Anak Kandung',
            'nama_ayah'         => 'BUDI',
            'nama_ibu'          => 'SITI',
            'pekerjaan_ayah'    => 'WIRASWASTA',
            'pekerjaan_ibu'     => 'WIRASWASTA',
            'sekolah_asal'      => 'SDS PUTRA NEGERI',
            'status_siswa'      => 'Aktif',
            'anak_ke'           => '1',
        ]);
    }
}

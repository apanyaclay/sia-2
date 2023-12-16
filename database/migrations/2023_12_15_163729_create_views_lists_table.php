<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('
            CREATE VIEW siswa AS
            SELECT t1.nisn, t1.nama_siswa, t2.email, t1.jenis_kelamin, t3.nama_kelas FROM siswas AS t1
            JOIN users AS t2 ON t1.user_id = t2.id
            JOIN kelas AS t3 ON t1.kelas_id = t3.id;
        ');

        DB::statement('
            CREATE VIEW guru AS
            SELECT t1.nuptk, t1.nama_guru, t2.email, t1.jenis_kelamin, t3.nama_mapel AS mata_pelajaran_yang_diajarkan FROM gurus AS t1
            JOIN users AS t2 ON t1.user_id = t2.id
            JOIN mata_pelajarans AS t3 ON t1.nuptk = t3.guru_id;
        ');

        DB::statement('
            CREATE VIEW tata_usaha AS
            SELECT t1.id_pegawai, t1.nama_pegawai, t2.email, t1.jenis_kelamin FROM tata_usahas AS t1
            JOIN users AS t2 ON t1.user_id = t2.id;
        ');

        DB::statement('
            CREATE VIEW kepala_sekolah AS
            SELECT t1.id_kepsek, t1.nama_kepsek, t2.email, t1.jenis_kelamin FROM kepala_sekolahs AS t1
            JOIN users AS t2 ON t1.user_id = t2.id;
        ');

        DB::statement('
            CREATE VIEW mapel AS
            SELECT t1.id, t1.nama_mapel, t2.nama_guru FROM mata_pelajarans AS t1
            JOIN gurus AS t2 ON t1.guru_id = t2.nuptk;
        ');

        DB::statement('
            CREATE VIEW absensi_ekskul AS
            SELECT t1.id, t1.tanggal, t4.nama_siswa, t3.nama_ekskul, t1.status FROM absensi_ekskuls AS t1
            JOIN ekskul_siswas AS t2 ON t1.ekskul_siswa_id = t2.id
            JOIN ekstrakurikulers AS t3 ON t2.ekskul_id = t3.id
            JOIN siswas AS t4 ON t2.siswa_id = t4.nisn;
        ');

        DB::statement('
            CREATE VIEW absensi__kelas AS
            SELECT t1.id, t1.tanggal, t2.nama_siswa, t1.status FROM absensi_kelas AS t1
            JOIN siswas AS t2 ON t1.siswa_id = t2.nisn;
        ');

        DB::statement('
            CREATE VIEW ekskul_siswa AS
            SELECT t1.id, t2.nama_siswa, t3.nama_ekskul, t4.tahun_ajaran, t4.semester FROM ekskul_siswas AS t1
            JOIN siswas AS t2 ON t1.siswa_id = t2.nisn
            JOIN ekstrakurikulers AS t3 ON t1.ekskul_id = t3.id
            JOIN tahun_ajarans AS t4 ON t1.tahun_ajaran_id = t4.id;
        ');

        DB::statement('
            CREATE VIEW ekskul AS
            SELECT t1.id, t1.nama_ekskul, t2.nama_guru, t1.hari, t1.waktu_mulai, t1.waktu_selesai FROM ekstrakurikulers AS t1
            JOIN gurus AS t2 ON t1.guru_id = t2.nuptk;
        ');

        DB::statement('
            CREATE VIEW jadwal_mapel AS
            SELECT t2.nama_kelas, t3.nama_mapel, t4.tahun_ajaran FROM jadwal_mapels AS t1
            JOIN kelas AS t2 ON t1.kelas_id = t2.id
            JOIN mata_pelajarans AS t3 ON t1.mapel_id = t3.id
            JOIN tahun_ajarans AS t4 ON t1.tahun_ajaran_id = t4.id;
        ');

        DB::statement('
            CREATE VIEW semua_kelas AS
            SELECT t1.id, t1.nama_kelas, t2.nama_guru AS nama_wali_kelas FROM kelas AS t1
            JOIN gurus AS t2 ON t1.guru_id = t2.nuptk;
        ');

        DB::statement('
            CREATE VIEW prestasi AS
            SELECT t1.id, t2.nama_siswa, t1.jenis_prestasi, t1.deskripsi, t1.tanggal FROM prestasis AS t1
            JOIN siswas AS t2 ON t1.siswa_id = t2.nisn;
        ');

        DB::statement('
            CREATE VIEW setting AS
            SELECT title, tentang, tujuan, visi_misi, alamat, kec_kota, provinsi, phone FROM settings;
        ');

        DB::statement('
            CREATE VIEW nilai AS
            SELECT t1.id, t2.nama_siswa, t3.nama_mapel, t1.ulha_1, t1.ulha_2, t1.uts, t1.ulha_3, t1.uas FROM nilais AS t1
            JOIN siswas AS t2 ON t1.siswa_id = t2.nisn
            JOIN mata_pelajarans AS t3 ON t1.mapel_id = t3.id;
        ');

        DB::statement('
            CREATE VIEW nilai_ekskul AS
            SELECT t1.id, t3.nama_siswa, t4.nama_ekskul, t5.tahun_ajaran, t5.semester, t1.nilai, t1.keterangan FROM nilai_ekskuls AS t1
            JOIN ekskul_siswas AS t2 ON t1.ekskul_siswa_id = t2.id
            JOIN siswas AS t3 ON t2.siswa_id = t3.nisn
            JOIN ekstrakurikulers AS t4 ON t2.ekskul_id = t4.id
            JOIN tahun_ajarans AS t5 ON t2.tahun_ajaran_id = t5.id;
        ');

        DB::statement('
            CREATE VIEW wali_siswa AS
            SELECT t1.id_wali, t1.nama_wali, t2.nama_siswa, t1.pekerjaan_wali FROM wali_siswas AS t1
            JOIN siswas AS t2 ON t1.siswa_id = t2.nisn;
        ');

        DB::statement('
            CREATE VIEW tahun_ajaran AS
            SELECT id, tahun_ajaran, semester, tanggal_mulai, tanggal_selesai FROM tahun_ajarans;
        ');

        DB::statement('
            CREATE VIEW sikap AS
            SELECT t1.id, t2.nama_siswa, t1.p_spiritual, t1.d_spiritual, t1.p_sosial, t1.d_sosial FROM sikaps AS t1
            JOIN siswas AS t2 ON t1.siswa_id = t2.nisn;
        ');

        DB::statement('
            CREATE VIEW rapor AS
            SELECT t1.id, t2.nama_siswa, t3.nama_guru AS wali_kelas, t4.nama_mapel, t1.p_nilai, t1.p_predikat, t1.p_deskripsi, t1.k_nilai, t1.k_predikat, t1.k_deskripsi FROM rapors AS t1
            JOIN siswas AS t2 ON t1.siswa_id = t2.nisn
            JOIN gurus AS t3 ON t1.guru_id = t3.nuptk
            JOIN mata_pelajarans AS t4 ON t1.mapel_id = t4.id;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS siswa');
        DB::statement('DROP VIEW IF EXISTS guru');
        DB::statement('DROP VIEW IF EXISTS tata_usaha');
        DB::statement('DROP VIEW IF EXISTS kepala_sekolah');
        DB::statement('DROP VIEW IF EXISTS mapel');
        DB::statement('DROP VIEW IF EXISTS absensi_ekskul');
        DB::statement('DROP VIEW IF EXISTS absensi__kelas');
        DB::statement('DROP VIEW IF EXISTS ekskul_siswa');
        DB::statement('DROP VIEW IF EXISTS ekskul');
        DB::statement('DROP VIEW IF EXISTS jadwal_mapel');
        DB::statement('DROP VIEW IF EXISTS semua_kelas');
        DB::statement('DROP VIEW IF EXISTS prestasi');
        DB::statement('DROP VIEW IF EXISTS setting');
        DB::statement('DROP VIEW IF EXISTS nilai');
        DB::statement('DROP VIEW IF EXISTS nilai_ekskul');
        DB::statement('DROP VIEW IF EXISTS wali_siswa');
        DB::statement('DROP VIEW IF EXISTS tahun_ajaran');
        DB::statement('DROP VIEW IF EXISTS sikap');
        DB::statement('DROP VIEW IF EXISTS rapor');
    }
};

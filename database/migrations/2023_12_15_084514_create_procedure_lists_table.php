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
        //1. Procedure cari siswa berdasarkan NISN
        DB::unprepared('
    
        CREATE PROCEDURE cari_siswa_per_nisn(nisn_siswa INT(11))
        BEGIN
        SELECT nisn, user_id, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, alamat, no_hp, status_dlm_klrg, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, status_siswa, sekolah_asal, anak_ke
        FROM siswas
        WHERE nisn = nisn_siswa;
        END
        
        ');

        //2. Procedure cari siswa per kelas
        DB::unprepared('
        CREATE PROCEDURE cari_siswa_per_kelas(IN nama_kelas_siswa VARCHAR(150))
        BEGIN
        SELECT nisn, user_id, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, kelas_id, agama, alamat, no_hp, status_dlm_klrg, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, status_siswa, sekolah_asal, anak_ke
        FROM siswas
        JOIN kelas ON siswas.kelas_id = kelas.id
        WHERE kelas.nama_kelas = nama_kelas_siswa COLLATE utf8mb4_unicode_ci;
        END
        ');

        //3. Procedure cari siswa per ekskul
        DB::unprepared('
        CREATE PROCEDURE cari_siswa_per_ekskul(IN nama_ekskul_siswa VARCHAR(30))
        BEGIN
        SELECT nisn, user_id, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, kelas_id, agama, alamat, no_hp, status_dlm_klrg, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, status_siswa, sekolah_asal, anak_ke
        FROM siswas
        JOIN ekskul_siswas ON siswas.nisn = ekskul_siswas.siswa_id
        JOIN ekstrakurikulers ON ekskul_siswas.ekskul_id = ekstrakurikulers.id
        WHERE ekstrakurikulers.nama_ekskul = nama_ekskul_siswa COLLATE utf8mb4_unicode_ci;
        END

        ');

        //4. Procedure tambah guru
        DB::unprepared('
        CREATE PROCEDURE tambah_guru(IN nuptk_guru BIGINT(20), IN user_id BIGINT(20), IN NIP_guru VARCHAR(18), IN nama VARCHAR(150), IN jk ENUM("L","P"), IN tmpt_lhr VARCHAR(100), IN tgl_lhr DATE, IN status_pegawai ENUM("GTY/PTY","Guru Honor"),
        IN Jenis_PTK_guru ENUM("Guru Mapel","Guru Wali Kelas"), IN Jenjang_pendidikan_guru VARCHAR(100), IN TMT date, IN jjm_guru INT(11), IN Status_guru ENUM("Aktif","Resign","Diberhentikan","Cuti"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO gurus(nuptk, user_id, nip, nama_guru, jenis_kelamin, tempat_lahir, tanggal_lahir, status_kepegawaian, jenis_ptk, jenjang_pendidikan, tmt_kerja, jjm, status)
        VALUES(nuptk_guru, user_id, NIP_guru, nama, jk, tmpt_lhr, tgl_lhr, status_pegawai, Jenis_PTK_guru, Jenjang_pendidikan_guru, TMT, jjm_guru, Status_guru);
        END;
        COMMIT;
        END IF;
        END
        ');

        //5. Procedure update guru
        DB::unprepared('
        CREATE PROCEDURE update_guru(IN nuptk_guru BIGINT(20), IN NIP_guru VARCHAR(18), IN nama VARCHAR(150), IN jk ENUM("L","P"), IN tmpt_lhr VARCHAR(100), IN tgl_lhr DATE, IN status_pegawai ENUM("GTY/PTY","Guru Honor"),
        IN Jenis_PTK_guru ENUM("Guru Mapel","Guru Wali Kelas"), IN Jenjang_pendidikan_guru VARCHAR(100), IN TMT date, IN jjm_guru INT(11), IN Status_guru ENUM("Aktif","Resign","Diberhentikan","Cuti"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE gurus SET
        nuptk = nuptk_guru,
        nip = NIP_guru,
        nama_guru = nama,
        jenis_kelamin = jk,
        tempat_lahir = tmpt_lhr,
        tanggal_lahir = tgl_lhr,
        status_kepegawaian = status_pegawai,
        jenis_ptk = Jenis_PTK_guru,
        jenjang_pendidikan = Jenjang_pendidikan_guru,
        tmt_kerja = TMT,
        jjm = jjm_guru,
        status = Status_guru WHERE nuptk = nuptk_guru;
        END;
        COMMIT;
        END IF;
        END
        ');

        //6. Procedure add tata usaha
        DB::unprepared('
        CREATE PROCEDURE tambah_tata_usaha(IN pegawai_id BIGINT(20), user_id BIGINT(20), nama VARCHAR(150), jk ENUM("L","P"), TMT DATE, tmpt_lhr VARCHAR(100), tgl_lhr DATE,
        Jenjang_pendidikan_tu VARCHAR(100), Status_tu ENUM("Aktif","Resign","Diberhentikan","Cuti"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO tata_usahas(id_pegawai, user_id, nama_pegawai, jenis_kelamin, tmt_kerja, tempat_lahir, tanggal_lahir, jenjang_pendidikan, status)
        VALUES(pegawai_id, user_id, nama, jk, TMT, tmpt_lhr, tgl_lhr, Jenjang_pendidikan_tu, Status_tu);
        END;
        COMMIT;
        END IF;
        END
        ');

        //7. Procedure update tata usaha
        DB::unprepared('
        CREATE PROCEDURE update_tata_usaha(IN pegawai_id BIGINT(20), nama VARCHAR(150), jk ENUM("L","P"), TMT DATE, tmpt_lhr VARCHAR(100), tgl_lhr DATE, Jenjang_pendidikan_tu VARCHAR(100), Status_tu ENUM("Aktif","Resign","Diberhentikan","Cuti"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE tata_usahas SET
        id_pegawai = pegawai_id,
        nama_pegawai = nama,
        jenis_kelamin = jk,
        tmt_kerja = TMT,
        tempat_lahir = tmpt_lhr,
        tanggal_lahir = tgl_lhr,
        jenjang_pendidikan = Jenjang_pendidikan_tu,
        status = Status_tu WHERE id_pegawai = pegawai_id;
        END;
        COMMIT;
        END IF;
        END

        ');

        //8. Procedure add tahun ajaran
        DB::unprepared('
        CREATE PROCEDURE tambah_tahun_ajaran(IN id BIGINT(20), Tahun CHAR(9), Sem ENUM("Ganjil","Genap"), Mulai DATE, Selesai DATE)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO tahun_ajarans(id, tahun_ajaran, semester, tanggal_mulai, tanggal_selesai)
        VALUES(id, Tahun, Sem, Mulai, Selesai);
        END;
        COMMIT;
        END IF;
        END

        ');

        //9. Procedure update tahun ajaran
        DB::unprepared('
        CREATE PROCEDURE update_tahun_ajaran(IN id BIGINT(20), Tahun CHAR(9), Sem ENUM("Ganjil","Genap"), Mulai DATE, Selesai DATE)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE tahun_ajarans SET
        id = id,
        tahun_ajaran = Tahun,
        semester = Sem,
        tanggal_mulai = Mulai,
        tanggal_selesai = Selesai WHERE id = id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //10. Procedure add kelas
        DB::unprepared('
        CREATE PROCEDURE tambah_kelas(IN id VARCHAR(10), wk BIGINT(20), nama_kls VARCHAR(150), tingkat ENUM("7","8","9"), Kelompok ENUM("A","B","C","D","E"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO kelas(id, guru_id, nama_kelas, tingkatan, kelompok_kelas)
        VALUES(id, wk, nama_kls, tingkat, Kelompok);
        END;
        COMMIT;
        END IF;
        END
        ');

        //11. Procedure update kelas
        DB::unprepared('
        CREATE PROCEDURE update_kelas(IN id VARCHAR(10), wk BIGINT(20), nama_kls VARCHAR(150), tingkat ENUM("7","8","9"), Kelompok ENUM("A","B","C","D","E"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE kelas SET
        id = id,
        guru_id = wk,
        nama_kelas = nama_kls,
        tingkatan = tingkat,
        kelompok_kelas = Kelompok WHERE ID_Kelas = id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //12. Procedure add siswa
        DB::unprepared('
        CREATE PROCEDURE tambah_siswa(IN nisn_siswa INT(11), user_id BIGINT(20), kelas_id BIGINT(20), Nama VARCHAR(150), jk ENUM("L","P"), tmpt_lhr VARCHAR(100), tgl_lhr DATE, religi ENUM("Islam","Kristen","Katholik","Hindu","Buddha","Konghucu"), address VARCHAR(255), hp VARCHAR(13), status_anak ENUM("Anak Kandung","Anak Tiri"), ayah VARCHAR(150), ibu VARCHAR(150), kerja_ayah VARCHAR(50), kerja_ibu VARCHAR(50), no_rek VARCHAR(50), atas_nama VARCHAR(50), status_disklh ENUM("Aktif","Lulus","Pindah","Dropout","Tidak Aktif"), asal VARCHAR(100), urutan_anak INT(11))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO siswas(nisn, user_id, kelas_id, nama_siswa, jenis_kelamin, tempat_lahir, tanggal_lahir, agama, alamat, no_hp, status_dlm_klrg, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, status_siswa, sekolah_asal, anak_ke)
        VALUES(nisn_siswa, user_id, kelas_id, Nama, jk, tmpt_lhr, tgl_lhr, religi, address, hp, status_anak, ayah, ibu, kerja_ayah, kerja_ibu, no_rek, atas_nama, status_disklh, asal, urutan_anak);
        END;
        COMMIT;
        END IF;
        END
        ');

        //13. Procedure update siswa
        DB::unprepared('
        CREATE PROCEDURE update_siswa(IN nisn_siswa INT(11), user_id BIGINT(20), kelas_id BIGINT(20), Nama VARCHAR(150), jk ENUM("L","P"), tmpt_lhr VARCHAR(100), tgl_lhr DATE, religi ENUM("Islam","Kristen","Katholik","Hindu","Buddha","Konghucu"), address VARCHAR(255), hp VARCHAR(13), status_anak ENUM("Anak Kandung","Anak Tiri"), ayah VARCHAR(150), ibu VARCHAR(150), kerja_ayah VARCHAR(50), kerja_ibu VARCHAR(50), no_rek VARCHAR(50), atas_nama VARCHAR(50), status_disklh ENUM("Aktif","Lulus","Pindah","Dropout","Tidak Aktif"), asal VARCHAR(100), urutan_anak INT(11))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE siswas SET
        nisn = nisn_siswa,
        user_id = user_id,
        kelas_id = kelas_id,
        nama_siswa = Nama,
        jenis_kelamin = jk,
        tempat_lahir = tmpt_lhr,
        tanggal_lahir = tgl_lhr,
        agama = religi,
        alamat = address,
        no_hp = hp,
        status_dlm_klrg = status_anak,
        nama_ayah = ayah,
        nama_ibu = ibu,
        pekerjaan_ayah = kerja_ayah,
        pekerjaan_ibu = kerja_ibu,
        status_siswa = status_disklh,
        sekolah_asal = asal,
        anak_ke = urutan_anak WHERE nisn = nisn_siswa;
        END;
        COMMIT;
        END IF;
        END
        ');

        //14. Procedure add roster
        DB::unprepared('
        CREATE PROCEDURE add_jadwal_mapel(IN kode BIGINT(20), kelas_id BIGINT(20), mapel_kode BIGINT(20), id_thn BIGINT(20), mulai TIME, selesai TIME, hari ENUM("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO jadwal_mapels(id, kelas_id , mapel_id, tahun_ajaran_id, waktu_mulai, waktu_selesai, hari)
        VALUES(kode, kelas_id, mapel_kode, id_thn, mulai, selesai, hari);
        END;
        COMMIT;
        END IF;
        END
        ');

        //15. Procedure update roster
        DB::unprepared('
        CREATE PROCEDURE update_jadwal_mapel(IN kode BIGINT(20), kelas_id BIGINT(20), mapel_kode BIGINT(20), id_thn BIGINT(20), mulai TIME, selesai TIME, hari ENUM("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE jadwal_mapels SET
        id = kode,
        kelas_id = kelas_id,
        mapel_id = mapel_kode,
        tahun_ajaran_id = id_thn,
        waktu_mulai = mulai,
        waktu_selesai = selesai,
        hari = hari WHERE id = kode;
        END;
        COMMIT;
        END IF;
        END
        ');

        //16. Procedure add prestasi
        DB::unprepared('
        CREATE PROCEDURE tambah_prestasi(IN id BIGINT(20), siswa_id INT(11), jenis ENUM("Akademik","Non-Akademik"), desk VARCHAR(150), tgl DATE)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO prestasis(id, siswa_id, jenis_prestasi, deskripsi, tanggal)
        VALUES(id, siswa_id, jenis, desk, tgl);
        END;
        COMMIT;
        END IF;
        END
        ');

        //17. Procedure update prestasi
        DB::unprepared('
        CREATE PROCEDURE update_prestasi(IN id BIGINT(20), siswa_id INT(11), jenis ENUM("Akademik","Non-Akademik"), desk VARCHAR(150), tgl DATE)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE prestasis SET
        id = id,
        siswa_id = siswa_id,
        jenis_prestasi = jenis,
        deskripsi = desk,
        tanggal = tgl WHERE id = id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //18. Procedure add nilai
        DB::unprepared('
        CREATE PROCEDURE tambah_nilai(IN id BIGINT(20), mapel_kode BIGINT(20), siswa_id INT(11), id_thn BIGINT(20), ulha1 INT(11), ulha2 INT(11), uts INT(11), ulha3 INT(11), uas INT(11))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO nilais(id, mapel_id, siswa_id, tahun_ajaran_id, ulha_1, ulha_2, uts, ulha_3, uas)
        VALUES(id, mapel_kode, siswa_id, id_thn, ulha1, ulha2, uts, ulha3, uas);
        END;
        COMMIT;
        END IF;
        END
        ');

        //19. Procedure update nilai
        DB::unprepared('
        CREATE PROCEDURE update_nilai(IN id BIGINT(20), mapel_kode BIGINT(20), siswa_id INT(11), id_thn BIGINT(20), ulha1 INT(11), ulha2 INT(11), uts INT(11), ulha3 INT(11), uas INT(11))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE nilais SET
        id = id,
        mapel_id = mapel_kode,
        siswa_id = siswa_id,
        tahun_ajaran_id = id_thn,
        ulha_1 = ulha1,
        ulha_2 = ulha2,
        uts = uts,
        ulha_3 = ulha3,
        uas = uas WHERE id = id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //20. Procedure add ekskul
        DB::unprepared('
        CREATE PROCEDURE tambah_ekskul(IN id BIGINT(20), nama VARCHAR(30), guru BIGINT(20), hari_ekskul ENUM("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"), mulai TIME, selesai TIME)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO ekstrakurikulers(id, nama_ekskul, guru_id, hari, waktu_mulai, waktu_selesai)
        VALUES(id, nama, guru, hari_ekskul, mulai, selesai);
        END;
        COMMIT;
        END IF;
        END
        ');

        //21. Procedure update ekskul
        DB::unprepared('
        CREATE PROCEDURE update_ekskul(IN id BIGINT(20), nama VARCHAR(30), guru BIGINT(20), hari_ekskul ENUM("Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"), mulai TIME, selesai TIME)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE ekstrakurikulers SET
        id = id,
        nama_ekskul = nama,
        guru_id = guru,
        hari = hari_ekskul,
        waktu_mulai = mulai,
        waktu_selesai = selesai WHERE id = id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //22. Procedure delete ekskul
        DB::unprepared('
        CREATE PROCEDURE hapus_ekskul(IN ekskul_kode BIGINT(20))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        DELETE FROM ekstrakurikulers WHERE id = ekskul_kode;
        END;
        COMMIT;
        END IF;
        END
        ');

        //23. Procedure add mapel
        DB::unprepared('
        CREATE PROCEDURE tambah_mapel(IN id BIGINT(20), nama VARCHAR(50), kkm_mapel INT(11), guru BIGINT(20))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO mata_pelajarans(id, nama_mapel, kkm, guru_id)
        VALUES(id, nama, kkm_mapel, guru);
        END;
        COMMIT;
        END IF;
        END
        ');

        //24. Procedure update mapel
        DB::unprepared('
        CREATE PROCEDURE update_mapel(IN id BIGINT(20), nama VARCHAR(50), kkm_mapel INT(11), guru BIGINT(20))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE mata_pelajarans SET
        id = id,
        nama_mapel = nama,
        kkm = kkm_mapel,
        guru_id = guru WHERE id = id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //25. Procedure delete mapel
        DB::unprepared('
        CREATE PROCEDURE hapus_mapel(IN id BIGINT(20))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        DELETE FROM mata_pelajarans WHERE id = id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //26. Procedure add ekskul_siswa
        DB::unprepared('
        CREATE PROCEDURE tambah_siswa_ekskul(IN id BIGINT(20), ekskul_id BIGINT(20), siswa_id INT(11), id_thn BIGINT(20))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO ekskul_siswas(id, ekskul_id, siswa_id, tahun_ajaran_id) VALUES(id, ekskul_id, siswa_id, id_thn);
        END;
        COMMIT;
        END IF;
        END
        ');

        //27. Procedure update ekskul_siswa
        DB::unprepared('
        CREATE PROCEDURE update_siswa_ekskul(IN id BIGINT(20), ekskul_id BIGINT(20), siswa_id INT(11), id_thn BIGINT(20))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE ekskul_siswas SET
        id = id,
        ekskul_id = ekskul_id,
        siswa_id = siswa_id,
        tahun_ajaran_id = id_thn WHERE id = id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //28. Procedure add kip_kps_pip
        DB::unprepared('
        CREATE PROCEDURE tambah_kip_kps_pip(IN status_id INT(11), siswa_id INT(11), kip_status ENUM("Ya","Tidak"), kip_no VARCHAR(30), kps_status ENUM("Ya","Tidak"), kps_no VARCHAR(30), pip_eligible ENUM("Ya","Tidak"), alasan_eligible VARCHAR(50))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO kips_kps_pips(id, siswa_id , status_kip, no_kip, status_kps, no_kps, status_eligible_pip, alasan_eligible)
        VALUES(status_id, siswa_id, kip_status, kip_no, kps_status, kps_no, pip_eligible, alasan_eligible);
        END;
        COMMIT;
        END IF;
        END
        ');

        //29. Procedure update kip kps pip
        DB::unprepared('
        CREATE PROCEDURE update_kip_kps_pip(IN status_id INT(11), siswa_id iNT(11), kip_status ENUM("Ya","Tidak"), kip_no VARCHAR(30), kps_status ENUM("Ya","Tidak"), kps_no VARCHAR(30), pip_eligible ENUM("Ya","Tidak"), alasan_eligible VARCHAR(50))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE kip_kps_pips SET
        id = status_id,
        siswa_id = siswa_id,
        status_kip = kip_status,
        no_kip = kip_no,
        status_kps = kps_status,
        no_kps = kps_no,
        status_eligible_pip = pip_eligible,
        alasan_eligible = alasan_eligible WHERE id = status_id;
        END;
        COMMIT;
        END IF;
        END

        ');

        //30. Procedure add absensi_ekskul
        DB::unprepared('
        CREATE PROCEDURE tambah_absensi_ekskul(IN id BIGINT(20), id_siswa_ekskul BIGINT(20), tgl DATE, status ENUM("Hadir","Sakit","Izin","Alpa"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO absensi_ekskuls(id, ekskul_siswa_id, tanggal, status)
        VALUES(absensi_id, id_siswa_ekskul, tgl, status);
        END;
        COMMIT;
        END IF;
        END

        ');

        //31. Procedure update absensi ekskul
        DB::unprepared('
        CREATE PROCEDURE update_absensi_ekskul(IN id BIGINT(20), id_siswa_ekskul BIGINT(20), tgl DATE, status ENUM("Hadir","Sakit","Izin","Alpa"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE absensi_ekskuls SET
        id = id,
        ekskul_siswa_id = id_siswa_ekskul,
        tanggal = tgl,
        status = status WHERE id = id;
        END;
        COMMIT;
        END IF;
        END

        ');

        //32. Procedure add absensi kelas
        DB::unprepared('
        CREATE PROCEDURE tambah_absensi_kelas(IN absensi_id BIGINT(20), siswa_id INT(11), tgl DATE, status ENUM("Hadir","Sakit","Izin","Alpa"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO absensi_kelas(id, siswa_id , tanggal, status) VALUES(absensi_id, siswa_id, tgl, status);
        END;
        COMMIT;
        END IF;
        END
        ');

        //33. Procedure update absensi kelas
        DB::unprepared('
        CREATE PROCEDURE update_absensi_kelas(IN absensi_id BIGINT(20), siswa_id INT(11), tgl DATE, status ENUM("Hadir","Sakit","Izin","Alpa"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE absensi_kelas SET
        id = absensi_id,
        siswa_id = siswa_id,
        tanggal = tgl,
        status = status WHERE id = absensi_id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //34. Procedure add kepala sekolah
        DB::unprepared('
        CREATE PROCEDURE tambah_kepala_sekolah(IN kepsek_id BIGINT(20), user_id BIGINT(20), nama VARCHAR(150), jenjang_pendidikan_kepsek VARCHAR(100), jk ENUM("L","P"), tmpt_lhr VARCHAR(100), tgl_lhr DATE, TMT DATE, status_kepsek ENUM("Aktif","Resign","Diberhentikan","Cuti"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO kepala_sekolahs(id_kepsek, user_id, nama_kepsek, jenjang_pendidikan, jenis_kelamin, tempat_lahir, tanggal_lahir, tmt_kerja, status)
        VALUES(kepsek_id, user_id, nama, jenjang_pendidikan_kepsek, jk, tmpt_lhr, tgl_lhr, TMT, status_kepsek);
        END;
        COMMIT;
        END IF;
        END
        ');

        //35. Procedure update kepala sekolah
        DB::unprepared('
        CREATE PROCEDURE update_kepala_sekolah(IN kepsek_id BIGINT(20), user_id BIGINT(20), nama VARCHAR(150), jenjang_pendidikan_kepsek VARCHAR(100), jk ENUM("L","P"), tmpt_lhr VARCHAR(100), tgl_lhr DATE, TMT DATE, status_kepsek ENUM("Aktif","Resign","Diberhentikan","Cuti"))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE kepala_sekolahs SET
        id_kepsek = kepsek_id,
        user_id = user_id,
        nama_kepsek = nama,
        jenjang_pendidikan = jenjang_pendidikan_kepsek,
        jenis_kelamin = jk,
        tempat_lahir = tmpt_lhr,
        tanggal_lahir = tgl_lhr,
        tmt_kerja = TMT,
        status = status_kepsek WHERE id_kepsek = kepsek_id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //36. Procedure add nilai ekskul
        DB::unprepared('
        CREATE PROCEDURE tambah_nilai_ekskul(IN nilai_id BIGINT(20), id_siswa_ekskul BIGINT(20), nilai_siswa ENUM("A","B","C","D","E"), keterangan TEXT)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO nilai_ekskuls(id, ekskul_siswa_id, nilai, keterangan)
        VALUES(nilai_id, id_siswa_ekskul, nilai_siswa, keterangan);
        END;
        COMMIT;
        END IF;
        END
        ');

        //37. Procedure update nilai ekskul
        DB::unprepared('
        CREATE PROCEDURE update_nilai_ekskul(IN nilai_id BIGINT(20), id_siswa_ekskul BIGINT(20), nilai_siswa ENUM("A","B","C","D","E"), keterangan TEXT)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE nilai_ekskuls SET
        id = nilai_id,
        ekskul_siswa_id = id_siswa_ekskul,
        nilai = nilai_siswa,
        keterangan = keterangan WHERE id = nilai_id;
        END;
        COMMIT;
        END IF;
        END
        ');

        //38. Procedure add rapor
        DB::unprepared('
        CREATE PROCEDURE tambah_rapor(IN rapor_id BIGINT(20), siswa_id INT(11), guru_id BIGINT(20), mapel_id BIGINT(20), p_nilai INT(11), p_predikat VARCHAR(255), p_deskripsi TEXT, k_nilai INT(11), k_predikat VARCHAR(255), k_deskripsi TEXT)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO rapors(id, siswa_id, guru_id, mapel_id, p_nilai, p_predikat, p_deskripsi, k_nilai, k_predikat, k_deskripsi)
        VALUES(rapor_id, siswa_id, guru_id, mapel_id, p_nilai, p_predikat, p_deskripsi, k_nilai, k_predikat, k_deskripsi);
        END;
        COMMIT;
        END IF;
        END
        ');

        //39. Procedure update rapor
        DB::unprepared('
        CREATE PROCEDURE update_rapor(IN rapor_id BIGINT(20), siswa_id INT(11), guru_id BIGINT(20), mapel_id BIGINT(20), p_nilai INT(11), p_predikat VARCHAR(255), p_deskripsi TEXT, k_nilai INT(11), k_predikat VARCHAR(255), k_deskripsi TEXT)
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE rapors SET
        id = rapor_id,
        siswa_id = siswa_id,
        guru_id = guru_id,
        mapel_id = mapel_id,
        p_nilai = p_nilai,
        p_predikat = p_predikat,
        p_deskripsi = p_deskripsi,
        k_nilai = k_nilai,
        k_predikat = k_predikat,
        k_deskripsi = k_deskripsi WHERE id = rapor_id;
        END;
        COMMIT;
        END IF;
        END
        ');


        //40. Procedure add wali_siswa
        DB::unprepared('
        CREATE PROCEDURE tambah_wali_siswa(IN wali_id INT(11), nama VARCHAR(150), perwakilan_untuk INT(11), kerja_wali VARCHAR(50), no_rek VARCHAR(50), atas_nama VARCHAR(50))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        INSERT INTO wali_siswas(id_wali, nama_wali, siswa_id, pekerjaan_wali, no_rek_bank, bank_atas_nama) 
        VALUES(wali_id, nama, perwakilan_untuk, kerja_wali, no_rek, atas_nama);
        END;
        COMMIT;
        END IF;
        END
        ');

        //41. Procedure update wali_siswa
        DB::unprepared('
        CREATE PROCEDURE update_wali_siswa(IN wali_id INT(11), nama VARCHAR(150), perwakilan_untuk INT(11), kerja_wali VARCHAR(50), no_rek VARCHAR(50), atas_nama VARCHAR(50))
        BEGIN
        DECLARE exit_handler BOOLEAN DEFAULT FALSE;
        DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET exit_handler = TRUE;
        START TRANSACTION;
        IF exit_handler THEN ROLLBACK;
        ELSE BEGIN
        UPDATE wali_siswas SET
        id_wali = wali_id,
        nama_wali = nama,
        siswa_id = perwakilan_untuk,
        pekerjaan_wali = kerja_wali,
        no_rek_bank = no_rek,
        bank_atas_nama = atas_nama WHERE id_wali = wali_id;
        END;
        COMMIT;
        END IF;
        END
        ');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP PROCEDURE cari_siswa_per_nisn");
        DB::unprepared("DROP PROCEDURE cari_siswa_per_kelas");
        DB::unprepared("DROP PROCEDURE cari_siswa_per_ekskul");
        DB::unprepared("DROP PROCEDURE tambah_guru");
        DB::unprepared("DROP PROCEDURE update_guru");
        DB::unprepared("DROP PROCEDURE tambah_tata_usaha");
        DB::unprepared("DROP PROCEDURE update_tata_usaha");
        DB::unprepared("DROP PROCEDURE tambah_tahun_ajaran");
        DB::unprepared("DROP PROCEDURE update_tahun_ajaran");
        DB::unprepared("DROP PROCEDURE tambah_kelas");
        DB::unprepared("DROP PROCEDURE update_kelas");
        DB::unprepared("DROP PROCEDURE tambah_siswa");
        DB::unprepared("DROP PROCEDURE update_siswa");
        DB::unprepared("DROP PROCEDURE add_jadwal_mapel");
        DB::unprepared("DROP PROCEDURE update_jadwal_mapel");
        DB::unprepared("DROP PROCEDURE tambah_prestasi");
        DB::unprepared("DROP PROCEDURE update_prestasi");
        DB::unprepared("DROP PROCEDURE tambah_nilai");
        DB::unprepared("DROP PROCEDURE update_nilai");
        DB::unprepared("DROP PROCEDURE tambah_ekskul");
        DB::unprepared("DROP PROCEDURE update_ekskul");
        DB::unprepared("DROP PROCEDURE hapus_ekskul");
        DB::unprepared("DROP PROCEDURE tambah_mapel");
        DB::unprepared("DROP PROCEDURE update_mapel");
        DB::unprepared("DROP PROCEDURE hapus_mapel");
        DB::unprepared("DROP PROCEDURE tambah_siswa_ekskul");
        DB::unprepared("DROP PROCEDURE update_siswa_ekskul");
        DB::unprepared("DROP PROCEDURE tambah_kip_kps_pip");
        DB::unprepared("DROP PROCEDURE update_kip_kps_pip");
        DB::unprepared("DROP PROCEDURE tambah_absensi_ekskul");
        DB::unprepared("DROP PROCEDURE update_absensi_ekskul");
        DB::unprepared("DROP PROCEDURE tambah_absensi_kelas");
        DB::unprepared("DROP PROCEDURE update_absensi_kelas");
        DB::unprepared("DROP PROCEDURE tambah_kepala_sekolah");
        DB::unprepared("DROP PROCEDURE update_kepala_sekolah");
        DB::unprepared("DROP PROCEDURE tambah_nilai_ekskul");
        DB::unprepared("DROP PROCEDURE update_nilai_ekskul");
        DB::unprepared("DROP PROCEDURE tambah_rapor");
        DB::unprepared("DROP PROCEDURE update_rapor");
        DB::unprepared("DROP PROCEDURE tambah_wali_siswa");
        DB::unprepared("DROP PROCEDURE update_wali_siswa");
        
        
    }
};

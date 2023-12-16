<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
    
        CREATE FUNCTION hitung_siswa()
        RETURNS INT
        BEGIN
        DECLARE total_siswa INT;
        SELECT COUNT(*) INTO total_siswa
        FROM siswas;
        RETURN total_siswa;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_guru()
        RETURNS INT
        BEGIN
        DECLARE total_guru INT;
        SELECT COUNT(*) INTO total_guru
        FROM gurus;
        RETURN total_guru;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_guru_aktif()
        RETURNS INT
        BEGIN
        DECLARE total_guru_aktif INT;
        SELECT COUNT(*) INTO total_guru_aktif
        FROM gurus WHERE status = "Aktif";
        RETURN total_guru_aktif;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_guru_resign()
        RETURNS INT
        BEGIN
        DECLARE total_guru_resign INT;
        SELECT COUNT(*) INTO total_guru_resign
        FROM gurus WHERE status = "Resign";
        RETURN total_guru_resign;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_guru_diberhentikan()
        RETURNS INT
        BEGIN
        DECLARE total_guru_diberhentikan INT;
        SELECT COUNT(*) INTO total_guru_diberhentikan
        FROM gurus WHERE status = "Diberhentikan";
        RETURN total_guru_diberhentikan;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_guru_cuti()
        RETURNS INT
        BEGIN
        DECLARE total_guru_cuti INT;
        SELECT COUNT(*) INTO total_guru_cuti
        FROM gurus WHERE status = "Cuti";
        RETURN total_guru_cuti;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_tata_usaha_aktif()
        RETURNS INT
        BEGIN
        DECLARE total_tata_usaha_aktif INT;
        SELECT COUNT(*) INTO total_tata_usaha_aktif
        FROM tata_usahas WHERE status = "Aktif";
        RETURN total_tata_usaha_aktif;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_tata_usaha_resign()
        RETURNS INT
        BEGIN
        DECLARE total_tata_usaha_resign INT;
        SELECT COUNT(*) INTO total_tata_usaha_resign
        FROM tata_usahas WHERE status = "Resign";
        RETURN total_tata_usaha_resign;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_tata_usaha_diberhentikan()
        RETURNS INT
        BEGIN
        DECLARE total_tata_usaha_diberhentikan INT;
        SELECT COUNT(*) INTO total_tata_usaha_diberhentikan
        FROM tata_usahas WHERE status = "Diberhentikan";
        RETURN total_tata_usaha_diberhentikan;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_tata_usaha_cuti()
        RETURNS INT
        BEGIN
        DECLARE total_tata_usaha_cuti INT;
        SELECT COUNT(*) INTO total_tata_usaha_cuti
        FROM tata_usahas WHERE status = "Cuti";
        RETURN total_tata_usaha_cuti;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_siswa_aktif()
        RETURNS INT
        BEGIN
        DECLARE total_siswa_aktif INT;
        SELECT COUNT(*) INTO total_siswa_aktif
        FROM siswas WHERE status_siswa = "Aktif";
        RETURN total_siswa_aktif;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_siswa_lulus()
        RETURNS INT
        BEGIN
        DECLARE total_siswa_lulus INT;
        SELECT COUNT(*) INTO total_siswa_lulus
        FROM siswas WHERE status_siswa = "Lulus";
        RETURN total_siswa_lulus;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_siswa_pindah()
        RETURNS INT
        BEGIN
        DECLARE total_siswa_pindah INT;
        SELECT COUNT(*) INTO total_siswa_pindah
        FROM siswas WHERE status_siswa = "Pindah";
        RETURN total_siswa_pindah;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_siswa_dropout()
        RETURNS INT
        BEGIN
        DECLARE total_siswa_dropout INT;
        SELECT COUNT(*) INTO total_siswa_dropout
        FROM siswas WHERE status_siswa = "Dropout";
        RETURN total_siswa_dropout;
        END;
        
        ');

        DB::unprepared('
    
        CREATE FUNCTION hitung_siswa_tidak_aktif()
        RETURNS INT
        BEGIN
        DECLARE total_siswa_tidak_aktif INT;
        SELECT COUNT(*) INTO total_siswa_tidak_aktif
        FROM siswas WHERE status_siswa = "Tidak Aktif";
        RETURN total_siswa_tidak_aktif;
        END;
        
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_siswa");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_guru");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_guru_aktif");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_guru_resign");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_guru_diberhentikan");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_guru_cuti");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_tata_usaha_aktif");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_tata_usaha_resign");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_tata_usaha_diberhentikan");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_tata_usaha_cuti");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_siswa_aktif");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_siswa_lulus");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_siswa_pindah");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_siswa_dropout");
        DB::unprepared("DROP FUNCTION IF EXISTS hitung_siswa_tidak_aktif");
    }
};

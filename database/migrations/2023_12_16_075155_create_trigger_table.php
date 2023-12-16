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
    
        CREATE TRIGGER delete_users_after_siswas
        AFTER DELETE ON siswas
        FOR EACH ROW
        BEGIN
        DELETE FROM users WHERE id = OLD.user_id;
        END;
        
        ');

        DB::unprepared('
    
        CREATE TRIGGER delete_users_after_gurus
        AFTER DELETE ON gurus
        FOR EACH ROW
        BEGIN
        DELETE FROM users WHERE id = OLD.user_id;
        END;
        
        ');

        DB::unprepared('
    
        CREATE TRIGGER delete_users_after_tata_usahas
        AFTER DELETE ON tata_usahas
        FOR EACH ROW
        BEGIN
        DELETE FROM users WHERE id = OLD.user_id;
        END;
        
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("DROP TRIGGER IF EXISTS delete_users_after_siswas");
        DB::unprepared("DROP TRIGGER IF EXISTS delete_users_after_gurus");
        DB::unprepared("DROP TRIGGER IF EXISTS delete_users_after_tata_usahas");
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('log_roles', function (Blueprint $table) {
            $table->bigInteger('ID_Roles')->length(20);
            $table->string('Email')->length(150);
            $table->string('Password')->length(60);
            $table->enum('Nama_Role',['Kepala Sekolah','Siswa', 'Guru','Tata Usaha']);
            $table->string('Action')->length(6);
            $table->string('Username')->length(100);
            $table->timestamp('Waktu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_roles');
    }
};

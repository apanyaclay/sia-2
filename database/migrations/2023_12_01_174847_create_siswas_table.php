<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->integer('NISN')->length(10)->primary();
            $table->unsignedBigInteger('Users_ID');
            $table->string('Nama_Siswa')->length(150);
            $table->enum('Jenis_Kelamin', ['L','P']);
            $table->string('Tempat_Lahir')->length(100);
            $table->unsignedBigInteger('Kelas_ID');
            $table->date('Tanggal_Lahir');
            $table->enum('Agama', ['Kristen', 'Katholik', 'Hindu', 'Buddha','Konghucu', 'Islam']);
            $table->string('Alamat')->length(255);
            $table->string('No_hp')->length(13);
            $table->enum('Status_dlm_Klrg', ['Anak Kandung','Anak Tiri']);
            $table->string('Nama_Ayah')->length(150);
            $table->string('Nama_Ibu')->length(150);
            $table->string('Pekerjaan_Ayah')->length(50);
            $table->string('Pekerjaan_Ibu')->length(50);
            $table->string('Sekolah_Asal')->length(100);
            $table->enum('Status_Siswa', ['Aktif', 'Lulus', 'Pindah','Dropout','Tidak Aktif']);
            $table->integer('Anak_Ke')->length(2);
            $table->timestamps();
            $table->foreign('Users_ID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Kelas_ID')->references('id')->on('kelas')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};

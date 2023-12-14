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
            $table->integer('nisn')->length(10)->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_siswa')->length(150);
            $table->enum('jenis_kelamin', ['L','P']);
            $table->string('tempat_lahir')->length(100);
            $table->date('tanggal_lahir');
            $table->unsignedBigInteger('kelas_id');
            $table->enum('agama', ['Kristen', 'Katholik', 'Hindu', 'Buddha','Konghucu', 'Islam']);
            $table->string('alamat')->length(255);
            $table->string('no_hp')->length(13);
            $table->enum('status_dlm_klrg', ['Anak Kandung','Anak Tiri']);
            $table->string('nama_ayah')->length(150);
            $table->string('nama_ibu')->length(150);
            $table->string('pekerjaan_ayah')->length(50);
            $table->string('pekerjaan_ibu')->length(50);
            $table->string('sekolah_asal')->length(100);
            $table->enum('status_siswa', ['Aktif', 'Lulus', 'Pindah','Dropout','Tidak Aktif']);
            $table->integer('anak_ke')->length(2);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('restrict')->onUpdate('cascade');
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

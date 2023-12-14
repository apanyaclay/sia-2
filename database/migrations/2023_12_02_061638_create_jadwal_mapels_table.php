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
        Schema::create('jadwal_mapels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id')->length(10);
            $table->unsignedBigInteger('mapel_id')->length(5);
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->enum('hari',['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']);
            $table->timestamps();
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('mapel_id')->references('id')->on('mata_pelajarans')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_mapels');
    }
};

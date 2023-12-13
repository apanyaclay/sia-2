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
            $table->unsignedBigInteger('Kelas_ID')->length(10);
            $table->unsignedBigInteger('Mapel_ID')->length(5);
            $table->unsignedBigInteger('Thn_Ajaran_ID');
            $table->time('Waktu_Mulai');
            $table->time('Waktu_Selesai');
            $table->enum('Hari',['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']);
            $table->timestamps();
            $table->foreign('Kelas_ID')->references('id')->on('kelas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('Mapel_ID')->references('id')->on('mata_pelajarans')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('Thn_Ajaran_ID')->references('id')->on('tahun_ajarans')->onDelete('restrict')->onUpdate('cascade');
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

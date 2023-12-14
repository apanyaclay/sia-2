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
        Schema::create('wali_siswas', function (Blueprint $table) {
            $table->integer('id_wali')->primary();
            $table->string('nama_wali')->length(150);
            $table->integer('siswa_id')->length(10);
            $table->string('pekerjaan_wali')->length(50);
            $table->string('no_rek_bank')->length(50);
            $table->string('bank_atas_nama')->length(50);
            $table->timestamps();
            $table->foreign('siswa_id')->references('nisn')->on('siswas')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wali_siswas');
    }
};

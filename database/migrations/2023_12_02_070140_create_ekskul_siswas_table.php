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
        Schema::create('ekskul_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Ekskul_ID');
            $table->integer('Siswa_ID');
            $table->unsignedBigInteger('Thn_Ajaran_ID');
            $table->timestamps();
            $table->foreign('Ekskul_ID')->references('id')->on('ekstrakurikulers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('Siswa_ID')->references('NISN')->on('siswas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('Thn_Ajaran_ID')->references('id')->on('tahun_ajarans')->onDelete('restrict')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekskul_siswas');
    }
};

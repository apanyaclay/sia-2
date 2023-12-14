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
            $table->unsignedBigInteger('ekskul_id');
            $table->integer('siswa_id');
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->timestamps();
            $table->foreign('ekskul_id')->references('id')->on('ekstrakurikulers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('siswa_id')->references('nisn')->on('siswas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans')->onDelete('restrict')->onUpdate('cascade');
            
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

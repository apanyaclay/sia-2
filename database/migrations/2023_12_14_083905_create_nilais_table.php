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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->unsignedBigInteger('mapel_id');
            $table->integer('ulha_1');
            $table->integer('ulha_2');
            $table->integer('uts');
            $table->integer('ulha_3');
            $table->integer('uas');
            $table->unsignedBigInteger('tahun_ajaran_id');
            $table->timestamps();
            $table->foreign('siswa_id')->references('nisn')->on('siswas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('mapel_id')->references('id')->on('mata_pelajarans')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajarans')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};

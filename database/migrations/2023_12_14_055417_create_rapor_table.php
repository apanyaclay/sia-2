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
        Schema::create('rapors', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id');
            $table->bigInteger('guru_id');
            $table->unsignedBigInteger('mapel_id');
            $table->integer('p_nilai');
            $table->string('p_predikat');
            $table->text('p_deskripsi');
            $table->integer('k_nilai');
            $table->string('k_predikat');
            $table->text('k_deskripsi');
            $table->timestamps();
            $table->foreign('siswa_id')->references('nisn')->on('siswas')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('guru_id')->references('nuptk')->on('gurus')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('mapel_id')->references('id')->on('mata_pelajarans')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapors');
    }
};

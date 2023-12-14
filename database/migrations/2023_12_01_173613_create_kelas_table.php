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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guru_id');
            $table->string('nama_kelas')->length(150);
            $table->enum('tingkatan',['7','8','9']);
            $table->enum('kelompok_kelas',['A','B','C','D','E']);
            $table->timestamps();
            $table->foreign('guru_id')->references('nuptk')->on('gurus')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};

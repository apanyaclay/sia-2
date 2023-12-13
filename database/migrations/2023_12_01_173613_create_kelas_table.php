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
            $table->bigInteger('Guru_ID');
            $table->string('Nama_Kelas')->length(150);
            $table->enum('Tingkatan',['7','8','9']);
            $table->enum('Kelompok_Kelas',['A','B','C','D','E']);
            $table->timestamps();
            $table->foreign('Guru_ID')->references('NUPTK')->on('gurus')->onDelete('restrict')->onUpdate('cascade');
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

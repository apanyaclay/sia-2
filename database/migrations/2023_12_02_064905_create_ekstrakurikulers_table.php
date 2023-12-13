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
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id();
            $table->string('Nama_Ekskul')->length(30);
            $table->bigInteger('Guru_ID');
            $table->enum('Hari',['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu']);
            $table->time('Waktu_Mulai');
            $table->time('Waktu_Selesai');
            $table->timestamps();
            $table->foreign('Guru_ID')->references('NUPTK')->on('gurus')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};

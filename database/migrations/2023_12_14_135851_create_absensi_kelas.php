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
        Schema::create('absensi_kelas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->unique();
            $table->integer('siswa_id');
            $table->enum('status',['Hadir', 'Izin', 'Sakit', 'Alpa']);
            $table->timestamps();
            $table->foreign('siswa_id')->references('nisn')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_kelas');
    }
};

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
        Schema::create('absensi_ekskuls', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->unique();
            $table->unsignedBigInteger('ekskul_siswa_id');
            $table->enum('status',['Hadir', 'Izin', 'Sakit', 'Alpa']);
            $table->timestamps();
            $table->foreign('ekskul_siswa_id')->references('id')->on('ekskul_siswas')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi_ekskuls');
    }
};

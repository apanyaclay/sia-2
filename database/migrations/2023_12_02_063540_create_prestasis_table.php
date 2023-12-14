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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->id();
            $table->integer('siswa_id')->length(10);
            $table->enum('jenis_prestasi',['Akademik','Non-Akademik']);
            $table->string('deskripsi')->length(150);
            $table->date('tanggal');
            $table->timestamps();
            $table->foreign('siswa_id')->references('nisn')->on('siswas')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasis');
    }
};

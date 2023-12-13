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
        Schema::create('nilai_ekskuls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Ekskul_Siswa_ID');
            $table->enum('Nilai',['A','B','C','D','E']);
            $table->timestamps();
            $table->foreign('Ekskul_Siswa_ID')->references('id')->on('ekskul_siswas')->onDelete('restrict')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_ekskuls');
    }
};

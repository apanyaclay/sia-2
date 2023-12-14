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
            $table->unsignedBigInteger('ekskul_siswa_id');
            $table->enum('nilai',['A','B','C','D','E']);
            $table->text('keterangan');
            $table->timestamps();
            $table->foreign('ekskul_siswa_id')->references('id')->on('ekskul_siswas')->onDelete('restrict')->onUpdate('cascade');
            
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

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
        Schema::create('kip_kps_pips', function (Blueprint $table) {
            $table->integer('id_status')->primary();
            $table->integer('siswa_id')->length(10);
            $table->enum('status_kip',['ya','tidak']);
            $table->string('no_kip')->length(30);
            $table->enum('status_kps', ['ya','tidak']);
            $table->string('no_kps')->length(30);
            $table->enum('status_eligible_pip',['ya','tidak']);
            $table->string('alasan_eligible_pip')->length(50);
            $table->timestamps();
            $table->foreign('siswa_id')->references('nisn')->on('siswas')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kip_kps_pips');
    }
};

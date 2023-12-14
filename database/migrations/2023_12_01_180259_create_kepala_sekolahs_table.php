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
        Schema::create('kepala_sekolahs', function (Blueprint $table) {
            $table->bigInteger('id_kepsek')->length(20)->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_kepsek')->length(150);
            $table->string('jenjang_pendidikan')->length(100);
            $table->enum('jenis_kelamin', ['L','P']);
            $table->string('tempat_lahir')->length(100);
            $table->date('tanggal_lahir');
            $table->date('tmt_kerja');
            $table->enum('status',['Aktif','Resign','Diberhentikan','Cuti']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepala_sekolahs');
    }
};

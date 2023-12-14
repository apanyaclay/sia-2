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
        Schema::create('tata_usahas', function (Blueprint $table) {
            $table->bigInteger('id_pegawai')->length(20)->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pegawai')->length(150);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tmt_kerja');
            $table->string('tempat_lahir')->length(100);
            $table->date('tanggal_lahir');
            $table->string('jenjang_pendidikan')->length(100);
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
        Schema::dropIfExists('tata_usahas');
    }
};

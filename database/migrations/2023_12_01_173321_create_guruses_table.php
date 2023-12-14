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
        Schema::create('gurus', function (Blueprint $table) {
            $table->bigInteger('nuptk')->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('nip')->length(18);
            $table->string('nama_guru')->length(150);
            $table->enum('jenis_kelamin',['L','P']);
            $table->string('tempat_lahir')->length(100);
            $table->date('tanggal_lahir');
            $table->enum('status_kepegawaian', ['GTY/PTY', 'Guru Honor']);
            $table->enum('jenis_ptk',['Guru Mapel','Guru Wali Kelas']);
            $table->string('jenjang_pendidikan')->length(100);
            $table->date('tmt_kerja');
            $table->integer('jjm')->length(2);
            $table->enum('status',['Aktif','Resign','Diberhentikan','Cuti']);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};

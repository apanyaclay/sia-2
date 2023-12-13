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
            $table->bigInteger('NUPTK')->primary();
            $table->unsignedBigInteger('Users_ID');
            $table->string('NIP')->length(18);
            $table->string('Nama_Guru')->length(150);
            $table->enum('Jenis_Kelamin',['L','P']);
            $table->string('Tempat_Lahir')->length(100);
            $table->date('Tanggal_Lahir');
            $table->enum('Status_Kepegawaian', ['GTY/PTY', 'Guru Honor']);
            $table->enum('Jenis_PTK',['Guru Mapel','Guru Wali Kelas']);
            $table->string('Jenjang_Pendidikan')->length(100);
            $table->date('TMT_Kerja');
            $table->integer('JJM')->length(2);
            $table->enum('Status',['Aktif','Resign','Diberhentikan','Cuti']);
            $table->timestamps();
            $table->foreign('Users_ID')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
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

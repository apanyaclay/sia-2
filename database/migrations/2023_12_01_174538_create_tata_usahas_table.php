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
            $table->bigInteger('ID_Pegawai')->length(20)->primary();
            $table->unsignedBigInteger('Users_ID');
            $table->string('Nama_Pegawai')->length(150);
            $table->enum('Jenis_Kelamin', ['L', 'P']);
            $table->date('TMT_Kerja');
            $table->string('Tempat_Lahir')->length(100);
            $table->date('Tanggal_Lahir');
            $table->string('Jenjang_Pendidikan')->length(100);
            $table->enum('Status',['Aktif','Resign','Diberhentikan','Cuti']);
            $table->timestamps();
            $table->foreign('Users_ID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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

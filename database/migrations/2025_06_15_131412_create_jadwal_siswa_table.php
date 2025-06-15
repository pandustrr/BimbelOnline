<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jadwal_siswa', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswa')->onDelete('cascade');
            $table->foreignId('jadwal_id')->constrained('jadwal')->onDelete('cascade');
            $table->enum('status', ['aktif', 'selesai', 'batal'])->default('aktif');
            $table->date('tanggal_daftar');
            $table->timestamps();

            $table->unique(['siswa_id', 'jadwal_id']); 
        });
    }

    public function down()
    {
        Schema::dropIfExists('jadwal_siswa');
    }
};

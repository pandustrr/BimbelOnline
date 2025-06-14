<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nama_guru', 100);
            $table->string('username', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('no_hp', 20);
            $table->text('riwayat_pendidikan');
            $table->text('alamat');
            $table->string('foto', 255)->nullable();
            $table->string('cv', 255)->nullable();
            $table->enum('jenjang', ['SD', 'SMP', 'SMA'])->nullable();
            $table->string('mata_pelajaran', 100)->nullable();
            $table->enum('status', ['menunggu', 'diterima', 'ditolak'])->default('menunggu');
            $table->text('alasan_penolakan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('guru', function (Blueprint $table) {
            $table->index('status');
            $table->index('created_at');
            $table->index('jenjang');
            $table->index('mata_pelajaran');
        });
    }

    public function down(): void
    {
        Schema::table('guru', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
            $table->dropIndex(['jenjang']);
            $table->dropIndex(['mata_pelajaran']);
        });

        Schema::dropIfExists('guru');
    }
};

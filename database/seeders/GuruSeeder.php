<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = [
            // Guru SD - Diterima
            [
                'nama_guru' => 'Budi Santoso',
                'username' => 'budisantoso',
                'email' => 'budi.santoso@example.com',
                'password' => 'password123',
                'no_hp' => '081234567890',
                'riwayat_pendidikan' => 'S1 Pendidikan Guru SD',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'jenjang' => 'SD',
                'mata_pelajaran' => 'Matematika, IPA',
                'foto' => 'guru/foto/budi.jpg',
                'cv' => 'guru/cv/budi.pdf',
                'status' => 'diterima',
            ],
            // Guru SMP - Diterima
            [
                'nama_guru' => 'Siti Rahayu',
                'username' => 'sitirahayu',
                'email' => 'siti.rahayu@example.com',
                'password' => 'password123',
                'no_hp' => '082345678901',
                'riwayat_pendidikan' => 'S1 Pendidikan Matematika',
                'alamat' => 'Jl. Sudirman No. 45, Bandung',
                'jenjang' => 'SMP',
                'mata_pelajaran' => 'Matematika',
                'foto' => 'guru/foto/siti.jpg',
                'cv' => 'guru/cv/siti.pdf',
                'status' => 'diterima',
            ],
            // Guru SMA - Diterima
            [
                'nama_guru' => 'Agus Prasetyo',
                'username' => 'aguspras',
                'email' => 'agus.prasetyo@example.com',
                'password' => 'password123',
                'no_hp' => '083456789012',
                'riwayat_pendidikan' => 'S2 Fisika',
                'alamat' => 'Jl. Gatot Subroto No. 22, Surabaya',
                'jenjang' => 'SMA',
                'mata_pelajaran' => 'Fisika',
                'foto' => 'guru/foto/agus.jpg',
                'cv' => 'guru/cv/agus.pdf',
                'status' => 'diterima',
            ],
            // Guru SD - Menunggu
            [
                'nama_guru' => 'Dewi Lestari',
                'username' => 'dewiles',
                'email' => 'dewi.lestari@example.com',
                'password' => 'password123',
                'no_hp' => '084567890123',
                'riwayat_pendidikan' => 'S1 PGSD',
                'alamat' => 'Jl. Pahlawan No. 33, Yogyakarta',
                'jenjang' => 'SD',
                'mata_pelajaran' => 'Bahasa Indonesia, IPS',
                'foto' => 'guru/foto/dewi.jpg',
                'cv' => 'guru/cv/dewi.pdf',
                'status' => 'menunggu',
            ],
            // Guru SMP - Ditolak
            [
                'nama_guru' => 'Rudi Hermawan',
                'username' => 'rudiher',
                'email' => 'rudi.hermawan@example.com',
                'password' => 'password123',
                'no_hp' => '085678901234',
                'riwayat_pendidikan' => 'D3 Bahasa Inggris',
                'alamat' => 'Jl. Diponegoro No. 15, Semarang',
                'jenjang' => 'SMP',
                'mata_pelajaran' => 'Bahasa Inggris',
                'foto' => 'guru/foto/rudi.jpg',
                'cv' => 'guru/cv/rudi.pdf',
                'status' => 'menunggu',
                'alasan_penolakan' => 'Kualifikasi pendidikan tidak memenuhi syarat',
            ],
            // Guru SMA - Menunggu
            [
                'nama_guru' => 'Linda Suryani',
                'username' => 'lindasur',
                'email' => 'linda.suryani@example.com',
                'password' => 'password123',
                'no_hp' => '086789012345',
                'riwayat_pendidikan' => 'S1 Kimia',
                'alamat' => 'Jl. Ahmad Yani No. 78, Medan',
                'jenjang' => 'SMA',
                'mata_pelajaran' => 'Kimia',
                'foto' => 'guru/foto/linda.jpg',
                'cv' => 'guru/cv/linda.pdf',
                'status' => 'menunggu',
            ],
        ];

        foreach ($gurus as $guru) {
            Guru::create($guru);
        }

        // // Generate 10 guru random
        // Guru::factory()->count(10)->create();
    }
}

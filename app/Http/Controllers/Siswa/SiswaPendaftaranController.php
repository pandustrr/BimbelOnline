<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class SiswaPendaftaranController extends Controller
{
    public function index()
    {
        $jenjangSiswa = auth()->guard('siswa')->user()->jenjang;

        $gurus = Guru::where('status', 'diterima')
            ->where('jenjang', $jenjangSiswa)
            ->withCount(['jadwal as jadwal_tersedia_count' => function($query) {
                $query->whereColumn('terdaftar', '<', 'kuota');
            }])
            ->orderBy('nama_guru')
            ->paginate(12);

        return view('siswa.pendaftaran.cari-guru', compact('gurus'));
    }

    public function show(Guru $guru)
    {
        // Validasi jenjang
        if ($guru->jenjang != auth()->guard('siswa')->user()->jenjang) {
            return back()->with('error', 'Jenjang guru tidak sesuai dengan jenjang Anda');
        }

        $guru->load([
            'jadwalTersedia',
            'jadwalPenuh'
        ]);

        return view('siswa.pendaftaran.detail-guru', compact('guru'));
    }

    public function daftar(Jadwal $jadwal)
    {
        if ($jadwal->guru->jenjang != auth()->guard('siswa')->user()->jenjang) {
            return back()->with('error', 'Jenjang kelas tidak sesuai dengan jenjang Anda');
        }

        if ($jadwal->terdaftar >= $jadwal->kuota) {
            return back()->with('error', 'Kuota kelas ini sudah penuh!');
        }

        if (auth()->guard('siswa')->user()->jadwal()->where('jadwal_id', $jadwal->id)->exists()) {
            return back()->with('error', 'Anda sudah terdaftar di kelas ini!');
        }

        auth()->guard('siswa')->user()->jadwal()->attach($jadwal->id, [
            'status' => 'aktif',
            'tanggal_daftar' => now()
        ]);

        $jadwal->increment('terdaftar');

        return redirect()->route('siswa.kelas-saya')
               ->with('success', 'Pendaftaran berhasil!');
    }
}

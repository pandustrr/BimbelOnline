<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class GuruJadwalController extends Controller
{
    public function index()
    {
        $jadwals = auth()->guard('guru')->user()->jadwal()
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('guru.jadwal', compact('jadwals'));
    }

    public function create()
    {
        $jenjang = auth()->guard('guru')->user()->jenjang;
        return view('guru.jadwal-edit', compact('jenjang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_pelajaran' => 'required|string|max:100',
            'kelas' => 'required|string',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'kuota' => 'required|integer|min:1'
        ]);

        Jadwal::create([
            'guru_id' => auth()->guard('guru')->user()->id,
            'mata_pelajaran' => $request->mata_pelajaran,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'kuota' => $request->kuota,
            'terdaftar' => 0
        ]);

        return redirect()->route('guru.jadwal')
            ->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit(Jadwal $jadwal)
    {
        // Validasi kepemilikan jadwal
        if ($jadwal->guru_id !== auth()->guard('guru')->id()) {
            abort(403, 'Unauthorized action.');
        }

        $jenjang = auth()->guard('guru')->user()->jenjang;
        return view('guru.jadwal-edit', compact('jadwal', 'jenjang'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        // Validasi kepemilikan jadwal
        if ($jadwal->guru_id !== auth()->guard('guru')->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'mata_pelajaran' => 'required|string|max:100',
            'kelas' => 'required|string',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'kuota' => 'required|integer|min:' . $jadwal->terdaftar
        ]);

        $jadwal->update([
            'mata_pelajaran' => $request->mata_pelajaran,
            'kelas' => $request->kelas,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'kuota' => $request->kuota
        ]);

        return redirect()->route('guru.jadwal')
            ->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy(Jadwal $jadwal)
    {
        if ($jadwal->guru_id !== auth()->guard('guru')->id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($jadwal->terdaftar > 0) {
            return back()->with('error', 'Tidak dapat menghapus jadwal yang sudah memiliki peserta!');
        }

        $jadwal->delete();
        return redirect()->route('guru.jadwal')
            ->with('success', 'Jadwal berhasil dihapus!');
    }

    // public function detailSiswa($id)
    // {
    //     $jadwal = Jadwal::with('siswa')->findOrFail($id);

    //     return view('guru.jadwal-detail-siswa', compact('jadwal'));
    // }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Guru;
use Illuminate\Http\Request;

class AdminJadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::with('guru')
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('admin.jadwal.index', compact('jadwals'));
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'guru_id' => 'required|exists:guru,id',
    //         'mata_pelajaran' => 'required|string|max:100',
    //         'kelas' => 'required|string',
    //         'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
    //         'jam_mulai' => 'required|date_format:H:i',
    //         'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
    //         'kuota' => 'required|integer|min:1'
    //     ]);

    //     Jadwal::create([
    //         'guru_id' => $request->guru_id,
    //         'mata_pelajaran' => $request->mata_pelajaran,
    //         'kelas' => $request->kelas,
    //         'hari' => $request->hari,
    //         'jam_mulai' => $request->jam_mulai,
    //         'jam_selesai' => $request->jam_selesai,
    //         'kuota' => $request->kuota,
    //         'terdaftar' => 0
    //     ]);

    //     return redirect()->route('admin.jadwal.index')
    //         ->with('success', 'Jadwal berhasil ditambahkan!');
    // }


    // public function update(Request $request, Jadwal $jadwal)
    // {
    //     $request->validate([
    //         'guru_id' => 'required|exists:guru,id',
    //         'mata_pelajaran' => 'required|string|max:100',
    //         'kelas' => 'required|string',
    //         'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu',
    //         'jam_mulai' => 'required|date_format:H:i',
    //         'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
    //         'kuota' => 'required|integer|min:' . $jadwal->terdaftar
    //     ]);

    //     $jadwal->update([
    //         'guru_id' => $request->guru_id,
    //         'mata_pelajaran' => $request->mata_pelajaran,
    //         'kelas' => $request->kelas,
    //         'hari' => $request->hari,
    //         'jam_mulai' => $request->jam_mulai,
    //         'jam_selesai' => $request->jam_selesai,
    //         'kuota' => $request->kuota
    //     ]);

    //     return redirect()->route('admin.jadwal.index')
    //         ->with('success', 'Jadwal berhasil diperbarui!');
    // }

    // public function destroy(Jadwal $jadwal)
    // {
    //     if ($jadwal->terdaftar > 0) {
    //         return back()->with('error', 'Tidak dapat menghapus jadwal yang sudah memiliki peserta!');
    //     }

    //     $jadwal->delete();
    //     return redirect()->route('admin.jadwal.index')
    //         ->with('success', 'Jadwal berhasil dihapus!');
    // }
}

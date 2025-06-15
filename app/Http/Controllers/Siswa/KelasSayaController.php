<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class KelasSayaController extends Controller
{
    public function index()
    {
        $kelasSaya = auth()->guard('siswa')->user()
            ->jadwal()
            ->with('guru')
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('siswa.kelas-saya.index', compact('kelasSaya'));
    }

    public function batal(Jadwal $jadwal)
    {
        if (!auth()->guard('siswa')->user()->jadwal()->where('jadwal_id', $jadwal->id)->exists()) {
            abort(403, 'Unauthorized action.');
        }

        auth()->guard('siswa')->user()->jadwal()->updateExistingPivot($jadwal->id, [
            'status' => 'batal'
        ]);

        $jadwal->decrement('terdaftar');

        return redirect()->route('siswa.kelas-saya')
            ->with('success', 'Kelas berhasil dibatalkan');
    }

    public function aktifkanKembali(Jadwal $jadwal)
    {
        if (!auth()->guard('siswa')->user()->jadwal()->where('jadwal_id', $jadwal->id)->exists()) {
            abort(403, 'Unauthorized action.');
        }

        auth()->guard('siswa')->user()->jadwal()->updateExistingPivot($jadwal->id, [
            'status' => 'aktif'
        ]);

        $jadwal->increment('terdaftar');

        return redirect()->route('siswa.kelas-saya')
            ->with('success', 'Kelas berhasil diaktifkan kembali.');
    }

    public function detail(Jadwal $jadwal)
    {
        // Validasi kepemilikan kelas
        if (!auth()->guard('siswa')->user()->jadwal()->where('jadwal_id', $jadwal->id)->exists()) {
            abort(403, 'Unauthorized action.');
        }

        $jadwal->load('guru');
        $siswa = auth()->guard('siswa')->user();
        $status = $siswa->jadwal()->where('jadwal_id', $jadwal->id)->first()->pivot->status;
        $tanggalDaftar = $siswa->jadwal()->where('jadwal_id', $jadwal->id)->first()->pivot->tanggal_daftar;

        return view('siswa.kelas-saya.detail', compact('jadwal', 'status', 'tanggalDaftar'));
    }

    public function destroy(Jadwal $jadwal)
    {
        if (!auth()->guard('siswa')->user()->jadwal()->where('jadwal_id', $jadwal->id)->exists()) {
            abort(403, 'Unauthorized action.');
        }

        $status = auth()->guard('siswa')->user()
            ->jadwal()
            ->where('jadwal_id', $jadwal->id)
            ->first()
            ->pivot
            ->status;

        auth()->guard('siswa')->user()->jadwal()->detach($jadwal->id);

        if ($status === 'aktif') {
            $jadwal->decrement('terdaftar');
        }

        return redirect()->route('siswa.kelas-saya')
            ->with('success', 'Kelas berhasil dihapus');
    }
}

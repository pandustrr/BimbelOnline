<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AdminSiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('nama_siswa')->get();
        return view('admin.siswa.index', compact('siswas'));
    }

    public function show(Siswa $siswa)
    {
        $siswa->load(['jadwal' => function($query) {
            $query->with('guru')
                ->orderBy('hari')
                ->orderBy('jam_mulai');
        }]);

        return view('admin.siswa.detail-siswa', compact('siswa'));
    }

    public function destroy(Siswa $siswa)
    {
        // Hapus relasi jadwal terlebih dahulu
        $siswa->jadwal()->detach();

        $siswa->delete();

        return redirect()->route('admin.siswa.index')
            ->with('success', 'Siswa berhasil dihapus');
    }
}

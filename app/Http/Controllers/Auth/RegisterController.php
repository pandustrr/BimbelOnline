<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Register Siswa
    public function showSiswaRegisterForm()
    {
        return view('auth.register_siswa');
    }

    public function registerSiswa(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'username' => 'required|unique:siswa',
            'email' => 'required|email|unique:siswa',
            'password' => 'required|confirmed',
            'no_hp' => 'required',
            'kelas' => 'required',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
        ]);

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'kelas' => $request->kelas,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Register Guru
    public function showGuruRegisterForm()
    {
        return view('auth.register_guru');
    }

    public function registerGuru(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'username' => 'required|unique:guru',
            'email' => 'required|email|unique:guru',
            'password' => 'required|confirmed',
            'no_hp' => 'required',
            'riwayat_pendidikan' => 'required',
            'alamat' => 'required',
            'jenjang' => 'required|in:SD,SMP,SMA',
            'mata_pelajaran' => 'required|string|max:100',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'cv' => 'required|file|mimes:pdf|max:5120',
        ]);

        $fotoPath = $request->file('foto')->store('guru/foto', 'public');
        $cvPath = $request->file('cv')->store('guru/cv', 'public');

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
            'riwayat_pendidikan' => $request->riwayat_pendidikan,
            'alamat' => $request->alamat,
            'jenjang' => $request->jenjang,
            'mata_pelajaran' => $request->mata_pelajaran,
            'foto' => $fotoPath,
            'cv' => $cvPath,
            'status' => 'menunggu'
        ]);

        return redirect()->route('register.guru')->with('success', 'Pendaftaran berhasil! Tunggu admin mengkonfirmasi dan menghubungi Anda.');
    }
}

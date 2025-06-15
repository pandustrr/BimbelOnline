<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showSiswaRegisterForm()
    {
        return view('auth.register_siswa');
    }

    public function registerSiswa(Request $request)
    {
        $validatedData = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'username' => 'required|string|max:50|unique:siswa',
            'email' => 'required|string|email|max:255|unique:siswa',
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => 'required|string|max:15',
            'jenjang' => 'required|in:SD,SMP,SMA',
            'kelas' => 'required|string|max:50',
            'asal_sekolah' => 'required|string|max:255',
            'alamat' => 'required|string',
        ]);

        Siswa::create([
            'nama_siswa' => $validatedData['nama_siswa'],
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'no_hp' => $validatedData['no_hp'],
            'jenjang' => $validatedData['jenjang'],
            'kelas' => $validatedData['kelas'],
            'asal_sekolah' => $validatedData['asal_sekolah'],
            'alamat' => $validatedData['alamat'],
        ]);
        return redirect()->route('register.siswa')->with('success', 'Registrasi berhasil! Silakan login.');
    }

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
            'password' => $request->password,
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

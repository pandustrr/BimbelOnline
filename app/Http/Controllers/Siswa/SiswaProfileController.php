<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiswaProfileController extends Controller
{
    // Menampilkan profil
    public function show()
    {
        $siswa = Auth::guard('siswa')->user();

        return view('siswa.profile', [
            'siswa' => $siswa,
            'status_text' => 'Aktif'
        ]);
    }

    // Menampilkan form edit
    public function edit()
    {
        $siswa = Auth::guard('siswa')->user();
        return view('siswa.profile-edit', compact('siswa'));
    }

    // Proses update profil
    public function update(Request $request)
    {
        $siswa = Auth::guard('siswa')->user();

        $validator = Validator::make($request->all(), [
            'nama_siswa' => 'required|string|max:255',
            'email' => 'required|email|unique:siswa,email,'.$siswa->id,
            'no_hp' => 'required|string|max:15',
            'jenjang' => 'required|in:SD,SMP,SMA',
            'alamat' => 'required|string',
            'asal_sekolah' => 'required|string|max:255',
            'kelas' => 'required|string|max:50',
            'username' => 'required|string|max:50|unique:siswa,username,'.$siswa->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'nama_siswa' => $request->nama_siswa,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'jenjang' => $request->jenjang,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'kelas' => $request->kelas,
            'username' => $request->username,
        ];

        if ($request->filled('password')) {
            $data['password'] = $request->password;
        }

        $siswa->update($data);

        return redirect()->route('siswa.profile')->with('success', 'Profil berhasil diperbarui!');
    }
}

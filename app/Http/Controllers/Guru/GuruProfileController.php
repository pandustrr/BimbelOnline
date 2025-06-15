<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GuruProfileController extends Controller
{
    public function show()
    {
        $guru = Auth::guard('guru')->user();

        return view('guru.profile', [
            'guru' => $guru,
            'jenjang_text' => $this->getJenjangText($guru->jenjang),
            'status_text' => $this->getStatusText($guru->status)
        ]);
    }

    private function getJenjangText($jenjang)
    {
        $jenjangs = [
            'SD' => 'Sekolah Dasar (SD)',
            'SMP' => 'Sekolah Menengah Pertama (SMP)',
            'SMA' => 'Sekolah Menengah Atas (SMA)'
        ];
        return $jenjangs[$jenjang] ?? $jenjang;
    }

    private function getStatusText($status)
    {
        $statuses = [
            'menunggu' => 'Menunggu Persetujuan',
            'diterima' => 'Diterima',
            'ditolak' => 'Ditolak'
        ];
        return $statuses[$status] ?? $status;
    }

    public function edit()
    {
        $guru = Auth::guard('guru')->user();

        return view('guru.profile-edit', [
            'guru' => $guru,
            'jenjang_options' => [
                'SD' => 'Sekolah Dasar (SD)',
                'SMP' => 'Sekolah Menengah Pertama (SMP)',
                'SMA' => 'Sekolah Menengah Atas (SMA)'
            ]
        ]);
    }

    public function update(Request $request)
    {
        $guru = Auth::guard('guru')->user();

        $validated = $request->validate([
            'nama_guru' => 'required|string|max:100',
            'email' => 'required|email|unique:guru,email,' . $guru->id,
            'no_hp' => 'required|string|max:20',
            'jenjang' => 'required|in:SD,SMP,SMA',
            'mata_pelajaran' => 'required|string|max:100',
            'riwayat_pendidikan' => 'required|string',
            'alamat' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle upload foto baru jika ada
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($guru->foto && Storage::exists($guru->foto)) {
                Storage::delete($guru->foto);
            }
            $validated['foto'] = $request->file('foto')->store('guru/foto');
        }

        $guru->update($validated);

        return redirect()->route('guru.profile')->with('success', 'Profil berhasil diperbarui.');
    }
}

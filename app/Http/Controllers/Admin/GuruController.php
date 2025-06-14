<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->get('tab', 'menunggu');

        $guruMenunggu = Guru::where('status', 'menunggu')->latest()->get();
        $guruDiterima = Guru::where('status', 'diterima')->latest()->get();
        $guruDitolak = Guru::where('status', 'ditolak')->latest()->get();

        if ($request->wantsJson() || $request->ajax()) {
            $view = match ($tab) {
                'diterima' => view('admin.guru.diterima', compact('guruDiterima'))->render(),
                'ditolak' => view('admin.guru.ditolak', compact('guruDitolak'))->render(),
                default => view('admin.guru.menunggu', compact('guruMenunggu'))->render(),
            };

            return response()->json([
                'html' => $view,
                'counts' => [
                    'menunggu' => $guruMenunggu->count(),
                    'diterima' => $guruDiterima->count(),
                    'ditolak' => $guruDitolak->count(),
                ]
            ]);
        }

        return view('admin.guru.index', compact('guruMenunggu', 'guruDiterima', 'guruDitolak'));
    }

    public function show(Guru $guru)
    {
        return view('admin.guru.detail', compact('guru'));
    }

    public function diterima(Guru $guru)
    {
        $guru->update([
            'status' => 'diterima',
            'disetujui_oleh' => Auth::id(),
            'disetujui_pada' => now()
        ]);

        return back()->with('success', 'Guru berhasil diterima');
    }

    public function ditolak(Request $request, Guru $guru)
    {
        $request->validate([
            'alasan_penolakan' => 'required|string|max:255'
        ]);

        $guru->update([
            'status' => 'ditolak',
            'alasan_penolakan' => $request->alasan_penolakan,
            'disetujui_oleh' => Auth::id(),
            'disetujui_pada' => now()
        ]);

        return back()->with('success', 'Guru berhasil ditolak');
    }

    public function destroy(Guru $guru)
    {
        $guru->delete();

        return back()->with('success', 'Data guru berhasil dihapus');
    }

    public function batalTolak(Guru $guru)
{
    $guru->update([
        'status' => 'menunggu',
        'alasan_penolakan' => null
    ]);

    return back()->with('success', 'Status guru berhasil dikembalikan ke menunggu');
}

public function batalTerima(Guru $guru)
{
    $guru->update([
        'status' => 'menunggu',
        'disetujui_oleh' => null,
        'disetujui_pada' => null
    ]);

    return back()->with('success', 'Status guru berhasil dikembalikan ke menunggu');
}
}

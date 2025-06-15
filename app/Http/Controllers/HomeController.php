<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'tutors' => Guru::where('status', 'diterima')->take(8)->get(),
            'guru_count' => Guru::where('status', 'diterima')->count(),
            'siswa_count' => Siswa::count(),
        ]);
    }
}

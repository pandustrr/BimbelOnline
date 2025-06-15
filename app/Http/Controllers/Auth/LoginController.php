<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Login Admin
        $admin = \App\Models\Admin::where('email', $credentials['email'])->first();
        if ($admin && $admin->password === $credentials['password']) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('admin.guru.index');
        }

        // Login Siswa
        $siswa = \App\Models\Siswa::where('email', $credentials['email'])->first();
        if ($siswa && $siswa->password === $credentials['password']) {
            Auth::guard('siswa')->login($siswa);
            return redirect()->route('siswa.profile');
        }

        // Login Guru
        $guru = \App\Models\Guru::where('email', $credentials['email'])->first();
        if ($guru && $guru->password === $credentials['password']) {
            if ($guru->status === 'diterima') {
                Auth::guard('guru')->login($guru);
                return redirect()->route('guru.profile');
            } elseif ($guru->status === 'menunggu') {
                return back()->withErrors(['email' => 'Akun Anda masih menunggu persetujuan admin']);
            } elseif ($guru->status === 'ditolak') {
                return back()->withErrors(['email' => 'Akun Anda telah ditolak. Silakan hubungi admin']);
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        } elseif (Auth::guard('guru')->check()) {
            Auth::guard('guru')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

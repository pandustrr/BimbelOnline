@extends('layouts.app')

@section('title', 'Detail Kelas')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded-xl p-6">
        {{-- Header --}}
        <div class="flex justify-between items-start mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $jadwal->mata_pelajaran }}</h1>
                <p class="text-sm text-gray-500">{{ $jadwal->kelas }}</p>
            </div>
            <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full
                @if($status == 'aktif') bg-green-100 text-green-700
                @elseif($status == 'selesai') bg-blue-100 text-blue-700
                @else bg-red-100 text-red-700 @endif">
                {{ ucfirst($status) }}
            </span>
        </div>

        {{-- Informasi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            {{-- Informasi Guru --}}
            <div>
                <h3 class="font-semibold text-gray-700 mb-3">Informasi Guru</h3>
                <div class="flex items-center space-x-4">
                    <img src="{{ $jadwal->guru->foto_url }}" alt="{{ $jadwal->guru->nama_guru }}"
                         class="w-16 h-16 rounded-full object-cover border border-gray-300 shadow-sm">
                    <div>
                        <p class="font-medium text-gray-900">{{ $jadwal->guru->nama_guru }}</p>
                        <p class="text-sm text-gray-500">{{ $jadwal->guru->jenjang_text }}</p>
                        <p class="text-sm text-gray-500">{{ $jadwal->guru->mata_pelajaran }}</p>
                    </div>
                </div>
            </div>

            {{-- Jadwal --}}
            <div>
                <h3 class="font-semibold text-gray-700 mb-3">Jadwal Kelas</h3>
                <ul class="text-sm text-gray-700 space-y-2">
                    <li class="flex items-center">
                        <i class="fas fa-calendar-day text-indigo-500 mr-2"></i>
                        Hari: {{ $jadwal->hari }}
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-clock text-indigo-500 mr-2"></i>
                        Jam: {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}
                    </li>
                    @isset($tanggalDaftar)
                    <li class="flex items-center">
                        <i class="fas fa-calendar-check text-indigo-500 mr-2"></i>
                        Terdaftar sejak: {{ \Carbon\Carbon::parse($tanggalDaftar)->locale('id')->translatedFormat('d F Y') }}
                    </li>
                    @endisset
                </ul>
            </div>
        </div>

        {{-- Deskripsi --}}
        <div class="border-t border-gray-200 pt-5">
            <h3 class="font-semibold text-gray-700 mb-3">Deskripsi Kelas</h3>
            <p class="text-gray-600 leading-relaxed text-sm">
                Kelas <strong>{{ $jadwal->mata_pelajaran }}</strong> untuk jenjang <strong>{{ $jadwal->guru->jenjang_text }}</strong> yang diajar oleh <strong>{{ $jadwal->guru->nama_guru }}</strong>.
                Kelas ini dilaksanakan setiap <strong>{{ $jadwal->hari }}</strong> pukul <strong>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</strong>.
            </p>
        </div>

        {{-- Tombol Kembali --}}
        <div class="mt-6">
            <a href="{{ route('siswa.kelas-saya') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-sm font-medium text-gray-700 rounded hover:bg-gray-200 transition">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Kelas Saya
            </a>
        </div>
    </div>
</div>
@endsection

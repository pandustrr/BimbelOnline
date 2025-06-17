@extends('layouts.app')

@section('title', 'Detail Kelas')

@section('content')
<div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="bg-gradient-to-r from-indigo-50 to-blue-50 px-6 py-5 sm:px-8 sm:py-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">{{ $jadwal->mata_pelajaran }}</h1>
                    <div class="flex items-center mt-2 space-x-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            {{ $jadwal->kelas }}
                        </span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            @if($status == 'aktif') bg-green-100 text-green-800
                            @elseif($status == 'selesai') bg-blue-100 text-blue-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($status) }}
                        </span>
                    </div>
                </div>
                <div class="flex-shrink-0">
                    <a href="{{ route('siswa.kelas-saya') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                        <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>

        <div class="px-6 py-5 sm:px-8 sm:py-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b border-gray-200">Informasi Guru</h3>
                    <div class="flex items-start space-x-4">
                        <img src="{{ $jadwal->guru->foto_url }}" alt="{{ $jadwal->guru->nama_guru }}"
                            class="w-16 h-16 rounded-full object-cover border-2 border-white shadow-sm">
                        <div>
                            <p class="font-semibold text-gray-900">{{ $jadwal->guru->nama_guru }}</p>
                            <div class="mt-1 flex flex-wrap gap-2">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-100 text-indigo-800">
                                    {{ $jadwal->guru->jenjang_text }}
                                </span>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ $jadwal->guru->mata_pelajaran }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4 pb-2 border-b border-gray-200">Jadwal Kelas</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 h-5 w-5 text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="ml-3 text-sm text-gray-700">
                                <span class="font-medium text-gray-900">Hari:</span> {{ $jadwal->hari }}
                            </p>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 h-5 w-5 text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="ml-3 text-sm text-gray-700">
                                <span class="font-medium text-gray-900">Jam:</span> {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                            </p>
                        </li>
                        @isset($tanggalDaftar)
                        <li class="flex items-start">
                            <div class="flex-shrink-0 h-5 w-5 text-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="ml-3 text-sm text-gray-700">
                                <span class="font-medium text-gray-900">Terdaftar sejak:</span> {{ \Carbon\Carbon::parse($tanggalDaftar)->locale('id')->translatedFormat('d F Y') }}
                            </p>
                        </li>
                        @endisset
                    </ul>
                </div>
            </div>
        </div>

        <div class="px-6 py-5 sm:px-8 sm:py-6 border-t border-gray-200 bg-gray-50">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Deskripsi Kelas</h3>
            <div class="prose prose-sm max-w-none text-gray-600">
                <p>
                    Kelas <strong>{{ $jadwal->mata_pelajaran }}</strong> untuk jenjang <strong>{{ $jadwal->guru->jenjang_text }}</strong> yang diajar oleh <strong>{{ $jadwal->guru->nama_guru }}</strong>.
                    Kelas ini dilaksanakan setiap <strong>{{ $jadwal->hari }}</strong> pukul <strong>{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</strong>.
                </p>

            </div>
        </div>

    </div>
</div>
@endsection

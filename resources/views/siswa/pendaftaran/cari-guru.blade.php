@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Daftar Guru Tersedia</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($gurus as $guru)
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <div class="p-4">
                        <div class="flex items-center space-x-4 mb-4">
                            <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama_guru }}"
                                class="w-16 h-16 rounded-full object-cover border-2 border-indigo-200">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">{{ $guru->nama_guru }}</h3>
                                <p class="text-sm text-gray-500">{{ $guru->jenjang_text }}</p>
                            </div>
                        </div>
                        <div class="space-y-2 mb-4">
                            <p class="text-sm text-gray-700 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                </svg>

                                {{ $guru->mata_pelajaran }}
                            </p>
                            <p class="text-sm text-gray-700 flex items-center">
                                <svg class="w-4 h-4 text-indigo-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 10h10m2 4H5a2 2 0 01-2-2V7a2 2 0 012-2h14a2 2 0 012 2v10a2 2 0 01-2 2z" />
                                </svg>
                                {{ $guru->jadwal_tersedia_count }} jadwal tersedia
                            </p>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('siswa.pendaftaran.show', $guru->id) }}"
                                class="inline-flex items-center px-3 py-1.5 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700 transition">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" stroke-width="2"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $gurus->links() }}
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Detail Guru')
@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Detail Guru: {{ $guru->nama_guru }}</h2>
                    <span class="px-3 py-1 rounded-full text-sm font-medium
                        @if($guru->status == 'menunggu') bg-yellow-100 text-yellow-800 @endif
                        @if($guru->status == 'diterima') bg-green-100 text-green-800 @endif
                        @if($guru->status == 'ditolak') bg-red-100 text-red-800 @endif">
                        {{ ucfirst($guru->status) }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Kolom Kiri -->
                    <div>
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">Informasi Pribadi</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center mb-4">
                                    <div class="flex-shrink-0 h-16 w-16 rounded-full overflow-hidden bg-gray-200">
                                        <img src="{{ $guru->foto_url }}" alt="Foto Profil" class="h-full w-full object-cover">
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-lg font-medium">{{ $guru->nama_guru }}</p>
                                        <p class="text-gray-500">{{ $guru->email }}</p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <p><span class="font-medium">Username:</span> {{ $guru->username }}</p>
                                    <p><span class="font-medium">No HP:</span> {{ $guru->no_hp }}</p>
                                    <p><span class="font-medium">Alamat:</span> {{ $guru->alamat }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">Dokumen</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                @if($guru->cv)
                                <a href="{{ $guru->cv_url }}" target="_blank" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-2">
                                    <i class="fas fa-file-pdf mr-2"></i> Download CV
                                </a>
                                @else
                                <p class="text-gray-500">Tidak ada CV yang diunggah</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div>
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">Riwayat Pendidikan</h3>
                            <div class="bg-gray-50 p-4 rounded-lg whitespace-pre-line">{{ $guru->riwayat_pendidikan }}</div>
                        </div>

                        @if($guru->status == 'ditolak' && $guru->alasan_penolakan)
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h3 class="text-lg font-medium mb-2">Alasan Penolakan</h3>
                            <p>{{ $guru->alasan_penolakan }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('admin.guru.index') }}" class="bg-gray-200 text-gray-800 py-2 px-4 rounded-md hover:bg-gray-300">
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

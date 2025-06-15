@extends('layouts.app')

@section('title', 'Detail Siswa')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-semibold text-gray-800">Detail Siswa</h2>
                        <a href="{{ route('admin.siswa.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300 transition">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                    </div>

                    <!-- Content Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <!-- Profile Card -->
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <div class="flex flex-col items-center">
                                <div class="mb-4">
                                    <div class="w-28 h-28 rounded-full border-4 border-white shadow-lg bg-indigo-100 flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-indigo-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-800 text-center">{{ $siswa->nama_siswa }}</h3>
                                <p class="text-sm text-gray-600 text-center">Kelas : {{ $siswa->kelas }} - {{ $siswa->jenjang }}</p>
                            </div>

                            <div class="mt-6 space-y-4 text-sm text-gray-700">
                                <div>
                                    <h4 class="font-medium text-gray-500">No. HP</h4>
                                    <p class="mt-1">{{ $siswa->no_hp }}</p>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-500">Email</h4>
                                    <p class="mt-1">{{ $siswa->email }}</p>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-500">Asal Sekolah</h4>
                                    <p class="mt-1">{{ $siswa->asal_sekolah }}</p>
                                </div>
                                <div>
                                    <h4 class="font-medium text-gray-500">Alamat</h4>
                                    <p class="mt-1">{{ $siswa->alamat }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Kelas yang Diikuti -->
                        <div class="lg:col-span-2">
                            <div class="bg-white p-6 rounded-lg shadow-lg">
                                <h3 class="text-lg font-semibold text-gray-800 mb-4">Kelas yang Diikuti</h3>

                                @if ($siswa->jadwal->count() > 0)
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-100">
                                                <tr>
                                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Guru</th>
                                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Mata Pelajaran</th>
                                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Hari / Jam</th>
                                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-100">
                                                @foreach ($siswa->jadwal as $jadwal)
                                                    <tr>
                                                        <td class="px-6 py-4">
                                                            <div class="flex items-center">
                                                                <img src="{{ $jadwal->guru->foto_url }}"
                                                                    alt="{{ $jadwal->guru->nama_guru }}"
                                                                    class="h-10 w-10 rounded-full object-cover mr-4">
                                                                <div>
                                                                    <div class="font-medium text-gray-900">{{ $jadwal->guru->nama_guru }}</div>
                                                                    <div class="text-sm text-gray-500">{{ $jadwal->guru->jenjang_text }}</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="text-sm text-gray-900">{{ $jadwal->mata_pelajaran }}</div>
                                                            <div class="text-sm text-gray-500">{{ $jadwal->kelas }}</div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            <div class="text-sm text-gray-900">{{ $jadwal->hari }}</div>
                                                            <div class="text-sm text-gray-500">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</div>
                                                        </td>
                                                        <td class="px-6 py-4">
                                                            @php
                                                                $badgeColor = match ($jadwal->pivot->status) {
                                                                    'aktif' => 'bg-green-100 text-green-800',
                                                                    'selesai' => 'bg-blue-100 text-blue-800',
                                                                    default => 'bg-red-100 text-red-800',
                                                                };
                                                            @endphp
                                                            <span class="px-3 py-1 inline-block text-xs font-medium rounded-full {{ $badgeColor }}">
                                                                {{ ucfirst($jadwal->pivot->status) }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Siswa ini belum terdaftar di kelas manapun.
                                    </div>
                                @endif
                            </div>

                            <!-- Action Button -->
                            <div class="mt-6 text-right">
                                <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-md hover:bg-red-700 transition">
                                        <i class="fas fa-trash mr-2"></i> Hapus Siswa
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

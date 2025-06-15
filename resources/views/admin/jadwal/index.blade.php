@extends('layouts.app')

@section('title', 'Kelola Jadwal Guru')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Header Section -->
                    <div class="flex justify-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800 text-center">Kelola Jadwal Guru</h2>
                    </div>

                    <!-- Stats Cards -->
                    <div class="flex justify-center mb-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Total Jadwal -->
                            <div class="bg-purple-50 p-4 rounded-lg shadow w-72">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm text-gray-600">Total Jadwal</p>
                                        <p class="text-lg font-semibold text-gray-900">{{ $jadwals->count() }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Total Siswa Terdaftar -->
                            <div class="bg-blue-50 p-4 rounded-lg shadow w-72">
                                <div class="flex items-center">
                                    <div class="p-3 rounded-full bg-blue-100 text-indigo-600 border-4 border-white">
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm text-gray-600">Total Siswa Terdaftar</p>
                                        <p class="text-lg font-semibold text-gray-900">
                                            {{ $jadwals->sum('terdaftar') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Table Section -->
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Guru</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Mata Pelajaran</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kelas</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Hari / Jam</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kuota</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Terdaftar</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($jadwals as $jadwal)
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <img class="h-10 w-10 rounded-full object-cover"
                                                        src="{{ $jadwal->guru->foto_url }}"
                                                        alt="{{ $jadwal->guru->nama_guru }}">
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $jadwal->guru->nama_guru }}
                                                        </div>
                                                        <div class="text-sm text-gray-500">
                                                            {{ $jadwal->guru->jenjang_text }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $jadwal->mata_pelajaran }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $jadwal->kelas }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <div class="text-sm text-gray-900">{{ $jadwal->hari }}</div>
                                                <div class="text-sm text-gray-500">{{ $jadwal->jam_mulai }} -
                                                    {{ $jadwal->jam_selesai }}</div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $jadwal->kuota }}
                                            </td>
                                            <td class="px-6 py-4 text-center">
                                                <span class="text-sm font-medium">{{ $jadwal->terdaftar }}</span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                                                Tidak ada jadwal tersedia
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

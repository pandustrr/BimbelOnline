@extends('layouts.app')

@section('title', 'Dashboard Siswa')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Dashboard Siswa</h2>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/1.jpg" alt="Profil Siswa" class="w-10 h-10 rounded-full">
                        <span class="ml-2 font-medium">Jane Doe</span>
                    </div>
                </div>

                <!-- Welcome Message -->
                <div class="bg-indigo-50 rounded-lg p-6 mb-8">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900">Selamat Belajar!</h3>
                            <p class="text-gray-600">Anda memiliki 3 kelas hari ini. Jangan lupa persiapkan diri!</p>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Kelas Aktif -->
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Kelas Aktif</p>
                                <p class="text-2xl font-semibold text-gray-900">5</p>
                            </div>
                        </div>
                    </div>

                    <!-- Tugas Deadline -->
                    <div class="bg-red-50 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-100 text-red-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Tugas Deadline</p>
                                <p class="text-2xl font-semibold text-gray-900">3</p>
                            </div>
                        </div>
                    </div>

                    <!-- Progress Belajar -->
                    <div class="bg-green-50 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Progress Belajar</p>
                                <p class="text-2xl font-semibold text-gray-900">72%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jadwal Kelas Hari Ini -->
                <div class="bg-white shadow rounded-lg p-6 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Jadwal Kelas Hari Ini</h3>
                        <a href="/siswa/jadwal" class="text-sm text-indigo-600 hover:text-indigo-800">Lihat Semua</a>
                    </div>
                    <div class="space-y-4">
                        @foreach(range(1,3) as $schedule)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow duration-300">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-medium text-gray-900">Matematika - Aljabar Dasar</h4>
                                    <p class="text-sm text-gray-500 mt-1">08:00 - 09:30 • Tutor: John Doe</p>
                                </div>
                                <a href="#" class="px-3 py-1 bg-indigo-600 text-white text-sm rounded-md hover:bg-indigo-700">Gabung</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tugas Terdekat -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Tugas Terdekat</h3>
                        <div class="space-y-4">
                            @foreach(range(1,3) as $assignment)
                            <div class="border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h4 class="font-medium text-gray-900">Tugas {{ $assignment }} - Matematika</h4>
                                        <p class="text-sm text-gray-500 mt-1">Batas pengumpulan: {{ now()->addDays($assignment)->format('d M Y') }}</p>
                                    </div>
                                    <span class="px-2 py-1 bg-{{ $assignment == 1 ? 'red' : 'yellow' }}-100 text-{{ $assignment == 1 ? 'red' : 'yellow' }}-800 text-xs rounded-full">
                                        {{ $assignment == 1 ? 'Besok' : 'Minggu Ini' }}
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Kerjakan Sekarang</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <a href="/siswa/tugas" class="text-sm text-indigo-600 hover:text-indigo-800">Lihat semua tugas →</a>
                        </div>
                    </div>

                    <!-- Materi Terbaru -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Materi Terbaru</h3>
                        <div class="space-y-4">
                            @foreach(range(1,3) as $material)
                            <div class="border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                                <h4 class="font-medium text-gray-900">Materi {{ $material }} - Matematika</h4>
                                <p class="text-sm text-gray-500 mt-1">Diunggah {{ $material }} hari yang lalu</p>
                                <div class="mt-2">
                                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Pelajari</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <a href="/siswa/materi" class="text-sm text-indigo-600 hover:text-indigo-800">Lihat semua materi →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

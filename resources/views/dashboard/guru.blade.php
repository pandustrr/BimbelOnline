@extends('layouts.app')

@section('title', 'Dashboard Guru')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">Dashboard Guru</h2>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="Profil Guru" class="w-10 h-10 rounded-full">
                        <span class="ml-2 font-medium">John Doe</span>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total Kelas -->
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Kelas</p>
                                <p class="text-2xl font-semibold text-gray-900">8</p>
                            </div>
                        </div>
                    </div>

                    <!-- Total Siswa -->
                    <div class="bg-green-50 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Total Siswa</p>
                                <p class="text-2xl font-semibold text-gray-900">42</p>
                            </div>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="bg-yellow-50 p-6 rounded-lg">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Rating</p>
                                <p class="text-2xl font-semibold text-gray-900">4.8</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jadwal Mengajar -->
                <div class="bg-white shadow rounded-lg p-6 mb-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Jadwal Mengajar Hari Ini</h3>
                        <a href="/guru/jadwal" class="text-sm text-indigo-600 hover:text-indigo-800">Lihat Semua</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Waktu</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Materi</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach(range(1,3) as $schedule)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">08:00 - 09:30</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Matematika Kelas {{ $schedule }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Aljabar Dasar</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900">Mulai Kelas</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Materi Terbaru -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Materi Terbaru</h3>
                        <div class="space-y-4">
                            @foreach(range(1,3) as $material)
                            <div class="border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                                <h4 class="font-medium text-gray-900">Materi {{ $material }} - Matematika</h4>
                                <p class="text-sm text-gray-500 mt-1">Diunggah {{ $material }} hari yang lalu</p>
                                <div class="mt-2 flex space-x-3">
                                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Unduh</a>
                                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Edit</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <a href="/guru/materi" class="text-sm text-indigo-600 hover:text-indigo-800">Lihat semua materi →</a>
                        </div>
                    </div>

                    <!-- Tugas Terbaru -->
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Tugas Terbaru</h3>
                        <div class="space-y-4">
                            @foreach(range(1,3) as $assignment)
                            <div class="border-b border-gray-200 pb-4 last:border-0 last:pb-0">
                                <h4 class="font-medium text-gray-900">Tugas {{ $assignment }} - Matematika</h4>
                                <p class="text-sm text-gray-500 mt-1">Batas pengumpulan: {{ now()->addDays($assignment)->format('d M Y') }}</p>
                                <div class="mt-2 flex space-x-3">
                                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Lihat</a>
                                    <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">Nilai</a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <a href="/guru/tugas" class="text-sm text-indigo-600 hover:text-indigo-800">Lihat semua tugas →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

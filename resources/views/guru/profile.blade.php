@extends('layouts.app')

@section('title', 'Profile Guru')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Profile Saya</h1>
                        <p class="text-gray-600">Kelola informasi profile dan spesialisasi mengajar Anda</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <span
                            class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-sm font-medium bg-green-500 text-white shadow">
                            <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                            {{ $status_text }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Profile Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden text-center p-6">
                        <div class="flex justify-center mb-4">
                            <div class="w-28 h-28 rounded-full border-4 border-white shadow-lg overflow-hidden">
                                <img src="{{ $guru->foto_url }}" alt="Foto Profil" class="w-full h-full object-cover">
                            </div>
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900 mb-1">{{ $guru->nama_guru }}</h2>
                        <p class="text-indigo-600 font-semibold mb-2">{{ $guru->mata_pelajaran }}</p>
                        <p class="text-gray-600 text-sm mb-4">{{ $guru->email }}</p>

                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $guru->username }}
                            </div>
                            <div class="flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                {{ $guru->no_hp }}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">

                    <!-- Riwayat Pendidikan -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 14l9-5-9-5-9 5 9 5z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Riwayat Pendidikan</h3>
                        </div>
                        <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl p-4 border">
                            <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $guru->riwayat_pendidikan }}</p>
                        </div>
                    </div>

                    <!-- Alamat -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Alamat</h3>
                        </div>
                        <div class="bg-gradient-to-r from-gray-50 to-orange-50 rounded-xl p-4 border">
                            <p class="text-gray-700 leading-relaxed">{{ $guru->alamat }}</p>
                        </div>
                    </div>

                                        <!-- Spesialisasi Mengajar -->
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13M12 6.253C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253M12 6.253C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Spesialisasi Mengajar</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-blue-700">Jenjang</span>
                                </div>
                                <p class="text-lg font-semibold text-gray-900">{{ $jenjang_text }}</p>
                            </div>
                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 border">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-purple-700">Mata Pelajaran</span>
                                </div>
                                <p class="text-lg font-semibold text-gray-900">{{ $guru->mata_pelajaran }}</p>
                            </div>
                        </div>
                    </div>


                    <!-- Dokumen & Actions -->
                    <div
                        class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6 hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex items-center mb-6">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Dokumen & Actions</h3>
                        </div>

                        <div class="flex flex-col sm:flex-row gap-4">
                            @if ($guru->cv)
                                <a href="{{ $guru->cv_url }}" target="_blank"
                                    class="inline-flex items-center justify-center px-6 py-3 border border-red-200 rounded-xl text-sm font-semibold text-red-700 bg-gradient-to-r from-red-50 to-pink-50 hover:from-red-100 hover:to-pink-100 transition-all duration-300 shadow-md hover:shadow-lg">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Lihat CV
                                </a>
                            @else
                                <div
                                    class="inline-flex items-center justify-center px-6 py-3 border border-gray-200 rounded-xl text-sm text-gray-500 bg-gray-50">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    Tidak ada CV yang diunggah
                                </div>
                            @endif

                            <a href="{{ route('guru.profile.edit') }}"
                                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition duration-200 shadow hover:shadow-md">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                    </path>
                                </svg>
                                Edit Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection

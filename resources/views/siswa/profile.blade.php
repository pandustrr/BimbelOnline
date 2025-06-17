@extends('layouts.app')

@section('title', 'Profil Siswa')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-white via-indigo-50 to-purple-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Profil Saya</h1>
                        <p class="text-gray-600">Informasi pribadi dan akademik Anda</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden text-center p-6">
                        <div class="flex justify-center mb-4">
                            <div class="w-28 h-28 rounded-full border-4 border-white shadow-lg overflow-hidden bg-indigo-100 flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
                                </svg>
                            </div>
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900 mb-1">{{ $siswa->nama_siswa }}</h2>
                        <p class="text-indigo-600 font-semibold mb-2">Siswa {{ $siswa->jenjang }}</p>

                        <div class="mt-4 sm:mt-0">
                            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-sm font-medium bg-green-500 text-white shadow">
                                <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                                {{ $status_text ?? 'Aktif' }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-teal-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Informasi Pribadi</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-start space-x-4">
                                <svg class="w-5 h-5 mt-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <div>
                                    <div class="text-sm text-gray-500">Username</div>
                                    <div class="text-base font-semibold text-gray-900">{{ $siswa->username }}</div>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <svg class="w-5 h-5 mt-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h.01M12 12h.01M8 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <div class="text-sm text-gray-500">Email</div>
                                    <div class="text-base font-semibold text-gray-900">{{ $siswa->email }}</div>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <svg class="w-5 h-5 mt-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <div class="text-sm text-gray-500">No Telepon</div>
                                    <div class="text-base font-semibold text-gray-900">{{ $siswa->no_hp }}</div>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <svg class="w-5 h-5 mt-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <div class="text-sm text-gray-500">Alamat</div>
                                    <div class="text-base font-semibold text-gray-900">{{ $siswa->alamat }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                        <div class="flex items-center mb-6">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center mr-4">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13M12 6.253C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253M12 6.253C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Informasi Akademik</h3>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div class="bg-gradient-to-r from-indigo-50 to-blue-50 rounded-xl p-4 border">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8 bg-indigo-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-indigo-700">Jenjang</span>
                                </div>
                                <p class="text-lg font-semibold text-gray-900">
                                    @if($siswa->jenjang == 'SD')
                                        Sekolah Dasar (SD)
                                    @elseif($siswa->jenjang == 'SMP')
                                        Sekolah Menengah Pertama (SMP)
                                    @else
                                        Sekolah Menengah Atas (SMA)
                                    @endif
                                </p>
                            </div>

                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-blue-700">Kelas</span>
                                </div>
                                <p class="text-lg font-semibold text-gray-900">
                                    Kelas {{ $siswa->kelas }} {{ $siswa->jenjang }}
                                </p>
                            </div>

                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-4 border">
                                <div class="flex items-center mb-2">
                                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-purple-700">Asal Sekolah</span>
                                </div>
                                <p class="text-lg font-semibold text-gray-900">{{ $siswa->asal_sekolah }}</p>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('siswa.profile.edit') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition duration-200 shadow hover:shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

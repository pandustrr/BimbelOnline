@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    <div class="relative">
        <!-- Intro Bimbel -->
        <div class="text-center py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl mb-6 shadow-lg shadow-blue-500/25">
                <svg class="w-10 h-10 text-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Selamat Datang di Bimbel Online
            </h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Raih prestasi akademik lebih baik dengan bimbingan tutor berpengalaman kami dalam platform Bimbel Online
            </p>
        </div>

        <!-- Card Stats -->
        <div class="max-w-7xl mx-auto px-4 pb-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card Pendaftaran -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4 mx-auto">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-center text-gray-900 mb-2">1000+</h3>
                    <p class="text-gray-600 text-center">Siswa Terdaftar</p>
                    <div class="mt-4 text-center">
                        <a href="/register/siswa" class="text-blue-600 hover:text-blue-700 font-medium">Daftar Sekarang →</a>
                    </div>
                </div>

                <!-- Card Tutor -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4 mx-auto">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-center text-gray-900 mb-2">50+</h3>
                    <p class="text-gray-600 text-center">Tutor Profesional</p>
                    <div class="mt-4 text-center">
                        <a href="/tutors" class="text-green-600 hover:text-green-700 font-medium">Lihat Tutor →</a>
                    </div>
                </div>

                <!-- Card Ajak Daftar -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center justify-center w-16 h-16 bg-purple-100 rounded-full mb-4 mx-auto">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-900 mb-3">Bergabung Sekarang</h3>
                    <p class="text-gray-600 text-center mb-4">Dapatkan akses ke pembelajaran berkualitas dengan tutor berpengalaman</p>
                    <div class="text-center">
                        <a href="/register/siswa" class="inline-block px-6 py-2 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition duration-300">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Informasi Tutor -->
        <div class="max-w-7xl mx-auto px-4 pb-16">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Tutor Kami</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach([1,2,3,4] as $tutor)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <img src="https://randomuser.me/api/portraits/{{ $tutor % 2 == 0 ? 'women' : 'men' }}/{{ $tutor * 10 }}.jpg"
                         alt="Tutor {{ $tutor }}"
                         class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-900">Tutor {{ $tutor % 2 == 0 ? 'Perempuan' : 'Pria' }} {{ $tutor }}</h3>
                        <p class="text-gray-600">Spesialis Matematika</p>
                        <div class="mt-2 flex">
                            @for($i = 0; $i < 5; $i++)
                            <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                            @endfor
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-8 text-center">
                <a href="/tutors" class="inline-block px-6 py-2 border-2 border-indigo-600 text-indigo-600 font-medium rounded-lg hover:bg-indigo-50 transition duration-300">
                    Lihat Semua Tutor
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

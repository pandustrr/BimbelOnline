@extends('layouts.app')

@section('title', 'Home')
@section('content')
    <div class="relative overflow-hidden bg-gradient-to-br from-blue-50 via-white to-indigo-50">
        <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
        <div class="relative">

            <div class="text-center py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div
                    class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl mb-6 shadow-lg shadow-blue-500/25">
                    <svg class="w-10 h-10 text-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                    Selamat Datang di Bimbel Online
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
                    Raih prestasi akademik lebih baik dengan bimbingan tutor berpengalaman kami dalam platform Bimbel Online
                </p>
            </div>

            <div class="max-w-7xl mx-auto px-4 pb-16">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Card Pendaftaran -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden p-6 hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4 mx-auto">
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                                </path>
                            </svg>
                        </div>
                        <p class="text-gray-600 text-center">Siswa Terdaftar</p>
                        <h3 class="text-2xl font-bold text-center text-gray-900 mb-2">{{ $siswa_count }}+</h3>

                        <div class="mt-4 text-center">
                            <a href="/register/siswa" class="text-blue-600 hover:text-blue-700 font-medium">Daftar Sekarang
                                →</a>
                        </div>
                    </div>

                    <!-- Card Tutor -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden p-6 hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-center w-16 h-16 bg-green-100 rounded-full mb-4 mx-auto">
                            <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-center text-gray-900 mb-2">{{ $guru_count }}+</h3>
                        <p class="text-gray-600 text-center">Tutor Profesional</p>

                    </div>

                    <!-- Card Ajak Daftar -->
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden p-6 hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center justify-center w-16 h-16 bg-purple-100 rounded-full mb-4 mx-auto">
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-center text-gray-900 mb-3">Bergabung Sekarang</h3>
                        <p class="text-gray-600 text-center mb-4">Dapatkan akses ke pembelajaran berkualitas dengan tutor
                            berpengalaman</p>
                        <div class="text-center">
                            <a href="/register/siswa"
                                class="inline-block px-6 py-2 bg-purple-600 text-white font-medium rounded-lg hover:bg-purple-700 transition duration-300">
                                Daftar Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Informasi  -->
            <div class="max-w-7xl mx-auto px-4 pb-16">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Guru Profesional Kami</h2>

                @if ($tutors->isEmpty())
                    <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded-md mb-8">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-blue-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-blue-700">Belum ada guru yang tersedia</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="relative">
                        @if(count($tutors) > 4)

                        <button class="absolute left-0 top-1/2 transform -translate-y-1/2 z-10 bg-white rounded-full shadow-md p-2 hover:bg-gray-100 focus:outline-none" id="prevBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <button class="absolute right-0 top-1/2 transform -translate-y-1/2 z-10 bg-white rounded-full shadow-md p-2 hover:bg-gray-100 focus:outline-none" id="nextBtn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        @endif

                        <div class="overflow-hidden">
                            <div class="flex space-x-6 transition-transform duration-300" id="tutorSlider">
                                @foreach ($tutors as $tutor)
                                    <div class="flex-shrink-0 w-64">
                                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 h-full">
                                            <div class="h-48 bg-gray-100 flex items-center justify-center">
                                                @if ($tutor->foto)
                                                    <img src="{{ $tutor->foto_url }}" alt="{{ $tutor->nama_guru }}"
                                                        class="w-full h-full object-cover">
                                                @else
                                                    <div
                                                        class="w-full h-full flex items-center justify-center bg-indigo-100 text-indigo-800 text-4xl font-bold">
                                                        {{ substr($tutor->nama_guru, 0, 1) }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="p-4">
                                                <h3 class="font-bold text-lg text-gray-900">{{ $tutor->nama_guru }}</h3>
                                                <p class="text-gray-600">{{ $tutor->mata_pelajaran }}</p>
                                                <p class="text-sm text-gray-500 mt-1">{{ $tutor->jenjang_text }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if(count($tutors) > 4)
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.getElementById('tutorSlider');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const tutorCards = document.querySelectorAll('#tutorSlider > div');
            const cardWidth = tutorCards[0].offsetWidth + 24;
            let currentPosition = 0;
            const maxPosition = -((tutorCards.length - 4) * cardWidth);

            function updateButtons() {
                prevBtn.style.display = currentPosition === 0 ? 'none' : 'block';
                nextBtn.style.display = currentPosition <= maxPosition ? 'none' : 'block';
            }

            prevBtn.addEventListener('click', function() {
                currentPosition = Math.min(currentPosition + cardWidth * 2, 0);
                slider.style.transform = `translateX(${currentPosition}px)`;
                updateButtons();
            });

            nextBtn.addEventListener('click', function() {
                currentPosition = Math.max(currentPosition - cardWidth * 2, maxPosition);
                slider.style.transform = `translateX(${currentPosition}px)`;
                updateButtons();
            });

            updateButtons();
        });
    </script>
    @endif
@endsection

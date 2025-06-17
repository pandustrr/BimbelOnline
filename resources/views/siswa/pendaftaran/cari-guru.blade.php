@extends('layouts.app')

@section('title', 'Daftar Guru')

@section('content')
    <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Daftar Guru Tersedia</h1>
            <p class="text-gray-600">Temukan guru profesional untuk kebutuhan belajar Anda</p>
        </div>

        @if ($gurus->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($gurus as $guru)
                    <div
                        class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 border border-gray-100">
                        <div class="p-5">
                            <div class="flex items-center space-x-4 mb-4">
                                <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama_guru }}"
                                    class="w-16 h-16 rounded-full object-cover border-2 border-indigo-100 shadow-sm">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $guru->nama_guru }}</h3>
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-medium rounded-full
                                        {{ $guru->jenjang == 'SD'
                                            ? 'bg-yellow-100 text-yellow-600'
                                            : ($guru->jenjang == 'SMP'
                                                ? 'bg-purple-100 text-purple-600'
                                                : 'bg-red-100 text-red-600') }}">
                                        {{ $guru->jenjang_text }}
                                    </span>
                                </div>
                            </div>

                            <div class="space-y-3 mb-5">
                                <div class="flex items-start">
                                    <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mt-0.5 mr-2"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                    </svg>
                                    <span class="text-gray-700">{{ $guru->mata_pelajaran }}</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="flex-shrink-0 h-5 w-5 text-indigo-500 mt-0.5 mr-2"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700">{{ $guru->jadwal_tersedia_count }} jadwal tersedia</span>
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <a href="{{ route('siswa.pendaftaran.show', $guru->id) }}"
                                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                                    <svg class="-ml-1 mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-1">Belum ada guru tersedia</h3>
                <p class="text-gray-500">Silakan coba lagi nanti atau hubungi admin</p>
            </div>
        @endif

        {{-- <!-- Pagination -->
        @if ($gurus->count() > 0)
            <div class="mt-8">
                {{ $gurus->links() }}
            </div>
        @endif --}}
    </div>
@endsection

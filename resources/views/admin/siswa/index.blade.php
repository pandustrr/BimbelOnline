@extends('layouts.app')

@section('title', 'Kelola Siswa')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                <div class="p-6 bg-white border-b border-gray-200">

                    <!-- Header -->
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">Kelola Siswa</h2>
                    </div>

                    <!-- Statistik -->
                    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">
                        <!-- Total Siswa -->
                        <div class="bg-blue-50 p-4 rounded-lg shadow">
                            <div class="flex items-center">
                                <div
                                    class="w-16 h-16 rounded-full border-4 border-white shadow-lg bg-indigo-100 flex items-center justify-center">
                                    <svg class="h-8 w-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-600">Total Siswa</p>
                                    <p class="text-lg font-semibold text-gray-900">{{ $siswas->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Siswa Aktif -->
                        <div class="bg-green-50 p-4 rounded-lg shadow">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-600">Aktif</p>
                                    <p class="text-lg font-semibold text-gray-900">0</p>
                                </div>
                            </div>
                        </div>

                        <!-- Jenjang SD -->
                        <div class="bg-yellow-50 p-4 rounded-lg shadow">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13M12 6.253C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253M12 6.253C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-600">Jenjang SD</p>
                                    <p class="text-lg font-semibold text-gray-900">
                                        {{ $siswas->where('jenjang', 'SD')->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Jenjang SMP -->
                        <div class="bg-purple-50 p-4 rounded-lg shadow">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13M12 6.253C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253M12 6.253C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-600">Jenjang SMP</p>
                                    <p class="text-lg font-semibold text-gray-900">
                                        {{ $siswas->where('jenjang', 'SMP')->count() }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Jenjang SMA -->
                        <div class="bg-red-50 p-4 rounded-lg shadow">
                            <div class="flex items-center">
                                <div
                                    class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13M12 6.253C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253M12 6.253C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-gray-600">Jenjang SMA</p>
                                    <p class="text-lg font-semibold text-gray-900">
                                        {{ $siswas->where('jenjang', 'SMA')->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tabel Siswa -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nama Siswa</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            No HP</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Jenjang</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Kelas</th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($siswas as $siswa)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div
                                                        class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center shadow-md">
                                                        <svg class="h-6 w-6 text-indigo-600" fill="none"
                                                            stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M5.121 17.804A7 7 0 0112 15a7 7 0 016.879 2.804M15 11a3 3 0 10-6 0 3 3 0 006 0z" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-4">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $siswa->nama_siswa }}</div>
                                                        <div class="text-sm text-gray-500">{{ $siswa->email }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $siswa->no_hp }}</td>
                                            <td class="px-6 py-4">
                                                <span
                                                    class="px-2 inline-flex text-xs font-semibold rounded-full
                                                {{ $siswa->jenjang == 'SD' ? 'bg-yellow-100 text-yellow-800' : 'bg-purple-100 text-purple-800' }}">
                                                    {{ $siswa->jenjang }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">{{ $siswa->kelas }}</td>
                                            <td class="px-6 py-4 text-sm font-medium">
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.siswa.show', $siswa->id) }}"
                                                        class="text-indigo-600 hover:text-indigo-900">
                                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('admin.siswa.destroy', $siswa->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                                                stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                                Tidak ada siswa terdaftar.
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

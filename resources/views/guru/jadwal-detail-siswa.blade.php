@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Siswa Terdaftar - {{ $jadwal->mata_pelajaran }}
            ({{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }})</h1>

        <a href="{{ route('guru.jadwal') }}"
            class="mb-6 inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-1 transition">
            &larr; Kembali ke Jadwal
        </a>

        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No HP</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                            Daftar</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($jadwal->siswa as $siswa)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $siswa->nama_siswa }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $siswa->no_hp }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ ucfirst($siswa->pivot->status) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $siswa->pivot->tanggal_daftar }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada siswa terdaftar.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection

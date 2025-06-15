@extends('layouts.app')

@section('title', 'Daftar Siswa')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Siswa Terdaftar - {{ $jadwal->mata_pelajaran }} ({{ $jadwal->hari }}, {{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }})</h1>

    <a href="{{ route('guru.jadwal') }}" class="text-indigo-600 hover:underline mb-4 inline-block">&larr; Kembali ke Jadwal</a>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($siswaTerdaftar as $siswa)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $siswa->nama }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $siswa->email }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ ucfirst($siswa->pivot->status) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $siswa->pivot->tanggal_daftar }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada siswa yang mendaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

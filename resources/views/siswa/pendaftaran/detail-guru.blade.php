@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white rounded-xl shadow-md p-6">

        {{-- Header Guru --}}
        <div class="flex flex-col md:flex-row gap-6 mb-8">
            <div class="md:w-1/4">
                <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama_guru }}"
                     class="w-full rounded-lg border border-gray-200 shadow">
            </div>
            <div class="md:w-3/4">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $guru->nama_guru }}</h1>
                <div class="mb-4">
                    <span class="inline-block bg-indigo-100 text-indigo-800 text-xs font-medium px-2 py-1 rounded">
                        {{ $guru->jenjang_text }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                    <div>
                        <h3 class="font-semibold">Mata Pelajaran</h3>
                        <p>{{ $guru->mata_pelajaran }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold">Riwayat Pendidikan</h3>
                        <p>{{ $guru->riwayat_pendidikan }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold">Status</h3>
                        <span class="inline-block bg-green-100 text-green-800 text-xs font-medium px-2 py-1 rounded">
                            {{ $guru->status_text }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Jadwal Tersedia --}}
        <div class="mb-10">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Jadwal Tersedia</h2>
            @if($guru->jadwalTersedia->count() > 0)
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Hari</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Jam</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Kuota</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($guru->jadwalTersedia as $jadwal)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->hari }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->kelas }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->terdaftar }}/{{ $jadwal->kuota }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <form action="{{ route('siswa.pendaftaran.daftar', $jadwal->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center bg-green-600 text-white text-xs font-medium px-3 py-1 rounded hover:bg-green-700 transition">
                                            <i class="fas fa-plus-circle mr-1"></i> Daftar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-blue-50 border border-blue-200 text-blue-800 px-4 py-3 rounded mt-2">
                    Tidak ada jadwal tersedia saat ini.
                </div>
            @endif
        </div>

        {{-- Jadwal Penuh --}}
        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Jadwal Penuh</h2>
            @if($guru->jadwalPenuh->count() > 0)
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Hari</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Jam</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Kuota</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($guru->jadwalPenuh as $jadwal)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->hari }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $jadwal->kelas }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-red-600 font-semibold">
                                    {{ $jadwal->terdaftar }}/{{ $jadwal->kuota }} (Penuh)
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded mt-2">
                    Semua kelas masih memiliki kuota tersedia.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

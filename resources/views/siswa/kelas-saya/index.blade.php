@extends('layouts.app')

@section('title', 'Kelas Saya')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-4 md:mb-0">Kelas Saya</h1>
            <a href="{{ route('siswa.pendaftaran') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded hover:bg-indigo-700 transition">
                <i class="fas fa-plus mr-2"></i> Daftar Kelas Baru
            </a>
        </div>

        @if ($kelasSaya->isEmpty())
            <div class="bg-blue-50 border border-blue-200 text-blue-700 px-6 py-4 rounded-lg shadow-sm">
                <i class="fas fa-info-circle mr-2"></i>
                Anda belum terdaftar di kelas manapun.
                <a href="{{ route('siswa.pendaftaran') }}" class="underline hover:text-blue-900 font-semibold">Daftar
                    sekarang</a>
            </div>
        @else
            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Guru</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Mata Pelajaran</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Hari</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jam
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Kelas</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($kelasSaya as $kelas)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ $kelas->guru->foto_url }}"
                                            alt="{{ $kelas->guru->nama_guru }}">
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $kelas->guru->nama_guru }}
                                            </div>
                                            <div class="text-sm text-gray-500">{{ $kelas->guru->jenjang_text }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $kelas->mata_pelajaran }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $kelas->hari }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $kelas->jam_mulai }} -
                                    {{ $kelas->jam_selesai }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $kelas->kelas }}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $status = $kelas->pivot->status;
                                        $badgeColor = match ($status) {
                                            'aktif' => 'bg-green-100 text-green-800',
                                            'selesai' => 'bg-blue-100 text-blue-800',
                                            default => 'bg-red-100 text-red-800',
                                        };
                                    @endphp
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $badgeColor }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center gap-3">
                                        @if ($kelas->pivot->status === 'aktif')
                                            <form action="{{ route('siswa.kelas-saya.batal', $kelas->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin membatalkan kelas ini?')">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-red-600 hover:text-red-800"
                                                    title="Batalkan">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @elseif($kelas->pivot->status === 'batal')
                                            <form action="{{ route('siswa.siswa.kelas-saya.kembali-aktif', $kelas->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="text-green-600 hover:text-green-800"
                                                    title="Aktifkan Kembali">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                </button>
                                            </form>
                                        @endif

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('siswa.kelas-saya.hapus', $kelas->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kelas ini secara permanen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-600 hover:text-gray-800"
                                                title="Hapus Permanen">
                                                <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                        </form>

                                        <a href="{{ route('siswa.kelas-saya.detail', $kelas->id) }}"
                                            class="text-indigo-600 hover:text-indigo-800" title="Lihat Detail">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-width="2"
                                                    d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                                <path stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

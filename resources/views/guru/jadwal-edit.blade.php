@extends('layouts.app')

@section('title', isset($jadwal) ? 'Edit Jadwal' : 'Tambah Jadwal')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">
        {{ isset($jadwal) ? 'Edit Jadwal Mengajar' : 'Tambah Jadwal Mengajar' }}
    </h1>

    <div class="bg-white shadow rounded-xl p-6">
        <form action="{{ isset($jadwal) ? route('guru.jadwal.update', $jadwal->id) : route('guru.jadwal.store') }}" method="POST" class="space-y-6">
            @csrf
            @if(isset($jadwal))
                @method('PUT')
            @endif

            {{-- Mata Pelajaran --}}
            <div>
                <label for="mata_pelajaran" class="block text-sm font-medium text-gray-700">Mata Pelajaran</label>
                <input type="text" name="mata_pelajaran" id="mata_pelajaran" required
                    value="{{ old('mata_pelajaran', $jadwal->mata_pelajaran ?? '') }}"
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            </div>

            {{-- Kelas --}}
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <select name="kelas" id="kelas" required
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    <option value="">Pilih Kelas</option>
                    @php
                        $jenjang = auth()->guard('guru')->user()->jenjang;
                    @endphp
                    @if($jenjang == 'SD')
                        @for($i = 1; $i <= 6; $i++)
                            <option value="{{ $i }} SD" {{ old('kelas', $jadwal->kelas ?? '') == "$i SD" ? 'selected' : '' }}>Kelas {{ $i }} SD</option>
                        @endfor
                    @elseif($jenjang == 'SMP')
                        @for($i = 7; $i <= 9; $i++)
                            <option value="{{ $i }} SMP" {{ old('kelas', $jadwal->kelas ?? '') == "$i SMP" ? 'selected' : '' }}>Kelas {{ $i }} SMP</option>
                        @endfor
                    @else
                        @for($i = 10; $i <= 12; $i++)
                            <option value="{{ $i }} SMA" {{ old('kelas', $jadwal->kelas ?? '') == "$i SMA" ? 'selected' : '' }}>Kelas {{ $i }} SMA</option>
                        @endfor
                    @endif
                </select>
            </div>

            {{-- Hari, Jam Mulai, Jam Selesai --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="hari" class="block text-sm font-medium text-gray-700">Hari</label>
                    <select name="hari" id="hari" required
                        class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        <option value="">Pilih Hari</option>
                        @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                            <option value="{{ $day }}" {{ old('hari', $jadwal->hari ?? '') == $day ? 'selected' : '' }}>{{ $day }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="jam_mulai" class="block text-sm font-medium text-gray-700">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="jam_mulai" required
                        value="{{ old('jam_mulai', $jadwal->jam_mulai ?? '') }}"
                        class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>

                <div>
                    <label for="jam_selesai" class="block text-sm font-medium text-gray-700">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="jam_selesai" required
                        value="{{ old('jam_selesai', $jadwal->jam_selesai ?? '') }}"
                        class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                </div>
            </div>

            {{-- Kuota --}}
            <div>
                <label for="kuota" class="block text-sm font-medium text-gray-700">Kuota Siswa</label>
                <input type="number" name="kuota" id="kuota" min="1" required
                    value="{{ old('kuota', $jadwal->kuota ?? 10) }}"
                    class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('guru.jadwal') }}"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg shadow-sm transition">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm transition">
                    {{ isset($jadwal) ? 'Update' : 'Simpan' }} Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

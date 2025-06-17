@extends('layouts.app')

@section('title', isset($jadwal) ? 'Edit Jadwal' : 'Tambah Jadwal')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">
            {{ isset($jadwal) ? 'Edit Jadwal Mengajar' : 'Tambah Jadwal Mengajar' }}
        </h1>
        <p class="mt-2 text-sm text-gray-600">
            {{ isset($jadwal) ? 'Perbarui detail jadwal mengajar Anda' : 'Tambahkan jadwal mengajar baru' }}
        </p>
    </div>

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <form action="{{ isset($jadwal) ? route('guru.jadwal.update', $jadwal->id) : route('guru.jadwal.store') }}" method="POST" class="p-6 space-y-6">
            @csrf
            @if(isset($jadwal))
                @method('PUT')
            @endif

            <div class="space-y-4">
                <div>
                    <label for="mata_pelajaran" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                    <input type="text" name="mata_pelajaran" id="mata_pelajaran" required
                        value="{{ old('mata_pelajaran', $jadwal->mata_pelajaran ?? '') }}"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out">
                </div>

                <div>
                    <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                    <select name="kelas" id="kelas" required
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out">
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

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label for="hari" class="block text-sm font-medium text-gray-700 mb-1">Hari</label>
                        <select name="hari" id="hari" required
                            class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out">
                            <option value="">Pilih Hari</option>
                            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
                                <option value="{{ $day }}" {{ old('hari', $jadwal->hari ?? '') == $day ? 'selected' : '' }}>{{ $day }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="jam_mulai" class="block text-sm font-medium text-gray-700 mb-1">Jam Mulai</label>
                        <input type="time" name="jam_mulai" id="jam_mulai" required
                            value="{{ old('jam_mulai', $jadwal->jam_mulai ?? '') }}"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out">
                    </div>

                    <div>
                        <label for="jam_selesai" class="block text-sm font-medium text-gray-700 mb-1">Jam Selesai</label>
                        <input type="time" name="jam_selesai" id="jam_selesai" required
                            value="{{ old('jam_selesai', $jadwal->jam_selesai ?? '') }}"
                            class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out">
                    </div>
                </div>

                <div>
                    <label for="kuota" class="block text-sm font-medium text-gray-700 mb-1">Kuota Siswa</label>
                    <input type="number" name="kuota" id="kuota" min="1" required
                        value="{{ old('kuota', $jadwal->kuota ?? 10) }}"
                        class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition duration-150 ease-in-out">
                </div>
            </div>

            <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                <a href="{{ route('guru.jadwal') }}"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    Batal
                </a>
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out">
                    {{ isset($jadwal) ? 'Update Jadwal' : 'Simpan Jadwal' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', 'Edit Profil Siswa')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Profil</h1>
                        <p class="text-gray-600">Perbarui informasi pribadi dan akademik Anda</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-6">
                <form action="{{ route('siswa.profile.update') }}" method="POST" id="profileForm">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kolom Kiri -->
                        <div>
                            <div class="mb-6">
                                <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" id="nama_siswa" name="nama_siswa"
                                    value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('nama_siswa')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                                <input type="text" id="username" name="username"
                                    value="{{ old('username', $siswa->username) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('username')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" id="email" name="email"
                                    value="{{ old('email', $siswa->email) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                                <input type="text" id="no_hp" name="no_hp"
                                    value="{{ old('no_hp', $siswa->no_hp) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('no_hp')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div>
                            <div class="mb-6">
                                <label for="jenjang" class="block text-sm font-medium text-gray-700 mb-1">Jenjang Pendidikan</label>
                                <select id="jenjang" name="jenjang"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="SD" {{ old('jenjang', $siswa->jenjang) == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ old('jenjang', $siswa->jenjang) == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA" {{ old('jenjang', $siswa->jenjang) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                </select>
                                @error('jenjang')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="kelas" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                                <select id="kelas" name="kelas"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <!-- Opsi kelas akan diisi oleh JavaScript berdasarkan jenjang -->
                                </select>
                                @error('kelas')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="asal_sekolah" class="block text-sm font-medium text-gray-700 mb-1">Asal Sekolah</label>
                                <input type="text" id="asal_sekolah" name="asal_sekolah"
                                    value="{{ old('asal_sekolah', $siswa->asal_sekolah) }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('asal_sekolah')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <textarea id="alamat" name="alamat" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('alamat', $siswa->alamat) }}</textarea>
                                @error('alamat')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Bagian Password -->
                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Ubah Password</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password Baru (Opsional)</label>
                                <input type="password" id="password" name="password"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                @error('password')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-end mt-6 space-x-3">
                        <a href="{{ route('siswa.profile') }}"
                            class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-300 shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition duration-200 shadow hover:shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('jenjang').addEventListener('change', function() {
            const jenjang = this.value;
            const kelasSelect = document.getElementById('kelas');

            // Kosongkan opsi kelas
            kelasSelect.innerHTML = '';

            if (jenjang === 'SD') {
                for (let i = 1; i <= 6; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = 'Kelas ' + i;
                    option.selected = (i == {{ old('kelas', $siswa->kelas) }});
                    kelasSelect.appendChild(option);
                }
            } else if (jenjang === 'SMP') {
                for (let i = 7; i <= 9; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = 'Kelas ' + i;
                    option.selected = (i == {{ old('kelas', $siswa->kelas) }});
                    kelasSelect.appendChild(option);
                }
            } else if (jenjang === 'SMA') {
                for (let i = 10; i <= 12; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = 'Kelas ' + i;
                    option.selected = (i == {{ old('kelas', $siswa->kelas) }});
                    kelasSelect.appendChild(option);
                }
            }
        });

        // Trigger change event saat pertama kali load
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('jenjang').dispatchEvent(new Event('change'));
        });

        // Form submission handler
        document.getElementById('profileForm').addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                `;
                submitBtn.disabled = true;
            }
        });
    </script>
@endsection

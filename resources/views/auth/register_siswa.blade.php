@extends('layouts.app')

@section('title', 'Daftar Siswa')
@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Daftar Akun Siswa
            </h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Sudah punya akun?
                <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Masuk disini
                </a>
            </p>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" method="POST" action="{{ route('register.siswa') }}" id="registerForm">
                    @csrf

                    <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" autocomplete="name" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('nama_siswa') }}">
                            @error('nama_siswa')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" name="username" id="username" autocomplete="username" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('username') }}">
                            @error('username')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" autocomplete="email" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('email') }}">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" autocomplete="new-password" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                autocomplete="new-password" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                            <input type="text" name="no_hp" id="no_hp" autocomplete="tel" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('no_hp') }}">
                            @error('no_hp')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="jenjang" class="block text-sm font-medium text-gray-700">Jenjang</label>
                            <select id="jenjang" name="jenjang" required
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Pilih Jenjang</option>
                                <option value="SD" {{ old('jenjang') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('jenjang') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('jenjang') == 'SMA' ? 'selected' : '' }}>SMA</option>
                            </select>
                            @error('jenjang')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                            <select id="kelas" name="kelas" required
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                <option value="">Pilih Kelas</option>
                                <!-- Opsi kelas akan diisi oleh JavaScript berdasarkan jenjang -->
                            </select>
                            @error('kelas')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="asal_sekolah" class="block text-sm font-medium text-gray-700">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" id="asal_sekolah" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                value="{{ old('asal_sekolah') }}">
                            @error('asal_sekolah')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="3" required
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit" id="submitBtn"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Daftar Sekarang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Dynamic Class Selection
        document.getElementById('jenjang').addEventListener('change', function() {
            const jenjang = this.value;
            const kelasSelect = document.getElementById('kelas');

            // Kosongkan opsi kelas
            kelasSelect.innerHTML = '<option value="">Pilih Kelas</option>';

            if (jenjang === 'SD') {
                for (let i = 1; i <= 6; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = 'Kelas ' + i + ' (SD)';
                    kelasSelect.appendChild(option);
                }
            } else if (jenjang === 'SMP') {
                for (let i = 7; i <= 9; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = 'Kelas ' + i + ' (SMP)';
                    kelasSelect.appendChild(option);
                }
            } else if (jenjang === 'SMA') {
                for (let i = 10; i <= 12; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = 'Kelas ' + i + ' (SMA)';
                    kelasSelect.appendChild(option);
                }
            }
        });

        // Jika ada nilai jenjang yang sudah diisi (setelah validasi gagal), isi ulang kelas
        const jenjangValue = "{{ old('jenjang') }}";
        if (jenjangValue) {
            document.getElementById('jenjang').dispatchEvent(new Event('change'));
            document.getElementById('kelas').value = "{{ old('kelas') }}";
        }

        // SweetAlert Notifications
        @if (session('success'))
            <
            script >
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: '{{ session('success') }}',
                        confirmButtonText: 'OK',
                        timer: 5000,
                        timerProgressBar: true,
                        customClass: {
                            confirmButton: 'swal2-confirm-black'
                        },
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    });
                });
    </script>
    @endif

    @if (session('error'))
        document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
        icon: 'error',
        title: 'Gagal!',
        text: '{{ session('error') }}',
        confirmButtonText: 'OK'
        });
        });
    @endif

    </script>
@endsection

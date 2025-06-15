@extends('layouts.app')

@section('title', 'Edit Profile Guru')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden">

                <div class="p-8">
                    <form method="POST" action="{{ route('guru.profile.update') }}" enctype="multipart/form-data"
                        class="space-y-8">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                            <!-- Kolom Kiri -->
                            <div class="space-y-6">
                                <!-- Informasi Pribadi Section -->
                                <div
                                    class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        Informasi Pribadi
                                    </h3>

                                    <div class="space-y-4">
                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2" for="nama_guru">
                                                Nama Lengkap *
                                            </label>
                                            <input
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-white"
                                                type="text" name="nama_guru" id="nama_guru"
                                                value="{{ old('nama_guru', $guru->nama_guru) }}"
                                                placeholder="Masukkan nama lengkap" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2" for="email">
                                                Email *
                                            </label>
                                            <input
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-white"
                                                type="email" name="email" id="email"
                                                value="{{ old('email', $guru->email) }}" placeholder="contoh@email.com"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2" for="no_hp">
                                                Nomor HP *
                                            </label>
                                            <input
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-white"
                                                type="text" name="no_hp" id="no_hp"
                                                value="{{ old('no_hp', $guru->no_hp) }}" placeholder="08XXXXXXXXXX"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2" for="foto">
                                                Foto Profil
                                            </label>
                                            <div class="space-y-3">
                                                <input type="file" name="foto" id="foto" accept="image/*"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                                @if ($guru->foto)
                                                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                                        <img src="{{ $guru->foto_url }}" alt="Foto Profil"
                                                            class="w-16 h-16 rounded-lg object-cover border-2 border-gray-200">
                                                        <div>
                                                            <p class="text-sm font-medium text-gray-700">Foto saat ini</p>
                                                            <p class="text-xs text-gray-500">Upload foto baru untuk
                                                                mengganti</p>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="space-y-6">
                                <!-- Spesialisasi Mengajar Section -->
                                <div
                                    class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl p-6 border border-purple-100">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                        <svg class="w-5 h-5 text-purple-600 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                                            </path>
                                        </svg>
                                        Spesialisasi Mengajar
                                    </h3>

                                    <div class="space-y-4">
                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2" for="jenjang">
                                                Jenjang Mengajar *
                                            </label>
                                            <select name="jenjang" id="jenjang"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-white"
                                                required>
                                                <option value="">Pilih Jenjang</option>
                                                @foreach ($jenjang_options as $value => $label)
                                                    <option value="{{ $value }}"
                                                        {{ $guru->jenjang == $value ? 'selected' : '' }}>
                                                        {{ $label }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2"
                                                for="mata_pelajaran">
                                                Mata Pelajaran *
                                            </label>
                                            <input
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-white"
                                                type="text" name="mata_pelajaran" id="mata_pelajaran"
                                                value="{{ old('mata_pelajaran', $guru->mata_pelajaran) }}"
                                                placeholder="Contoh: Matematika, Fisika, Bahasa Indonesia" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- Informasi Tambahan Section -->
                                <div
                                    class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl p-6 border border-green-100">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                        <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                            </path>
                                        </svg>
                                        Informasi Tambahan
                                    </h3>

                                    <div class="space-y-4">
                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2"
                                                for="riwayat_pendidikan">
                                                Riwayat Pendidikan *
                                            </label>
                                            <textarea
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-white resize-none"
                                                name="riwayat_pendidikan" id="riwayat_pendidikan" rows="4"
                                                placeholder="Contoh:&#10;S1 Pendidikan Matematika - Universitas ABC (2015-2019)&#10;S2 Matematika - Universitas XYZ (2020-2022)"
                                                required>{{ old('riwayat_pendidikan', $guru->riwayat_pendidikan) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label class="block text-sm font-semibold text-gray-700 mb-2" for="alamat">
                                                Alamat Lengkap *
                                            </label>
                                            <textarea
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-white resize-none"
                                                name="alamat" id="alamat" rows="3" placeholder="Masukkan alamat lengkap termasuk kota dan kode pos"
                                                required>{{ old('alamat', $guru->alamat) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CV Upload Section -->
                        <div class="bg-gradient-to-r from-orange-50 to-yellow-50 rounded-xl p-6 border border-orange-100">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 text-orange-600 mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z">
                                    </path>
                                </svg>
                                Dokumen CV (Opsional)
                            </h3>

                            <div class="space-y-3">
                                <input type="file" name="cv" id="cv" accept=".pdf,.doc,.docx"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors duration-200 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-orange-50 file:text-orange-700 hover:file:bg-orange-100">
                                <p class="text-xs text-gray-500">Format yang didukung: PDF, DOC, DOCX (Maksimal 5MB)</p>

                                @if ($guru->cv)
                                    <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-lg">
                                        <div class="w-10 h-10 bg-red-100 rounded-lg flex items-center justify-center">
                                            <svg class="w-5 h-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-700">CV saat ini tersimpan</p>
                                            <p class="text-xs text-gray-500">Upload CV baru untuk mengganti yang lama</p>
                                        </div>
                                        <a href="{{ $guru->cv_url }}" target="_blank"
                                            class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">
                                            Lihat CV
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="border-t border-gray-200 pt-8">
                            <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4">
                                <a href="{{ route('guru.profile') }}"
                                    class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-300 shadow-md hover:shadow-lg">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Batal
                                </a>
                                <button type="submit"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-lg bg-indigo-600 text-white hover:bg-indigo-700 transition duration-200 shadow hover:shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Simpan Perubahan
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

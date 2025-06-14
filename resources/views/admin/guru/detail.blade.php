@extends('layouts.app')

@section('title', 'Detail Guru')
@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Detail Guru: {{ $guru->nama_guru }}</h2>
                    <span class="px-3 py-1 rounded-full text-sm font-medium
                        @if($guru->status == 'menunggu') bg-yellow-100 text-yellow-800 @endif
                        @if($guru->status == 'diterima') bg-green-100 text-green-800 @endif
                        @if($guru->status == 'ditolak') bg-red-100 text-red-800 @endif">
                        {{ $guru->status_text }}
                    </span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Kolom Kiri - Informasi Utama -->
                    <div>
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">Informasi Pribadi</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center mb-4">
                                    <div class="flex-shrink-0 h-16 w-16 rounded-full overflow-hidden bg-gray-200">
                                        <img src="{{ $guru->foto_url }}" alt="Foto Profil" class="h-full w-full object-cover">
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-lg font-medium">{{ $guru->nama_guru }}</p>
                                        <p class="text-gray-500">{{ $guru->email }}</p>
                                        <p class="text-sm text-gray-500 mt-1">
                                            <i class="fas fa-chalkboard-teacher mr-1"></i> {{ $guru->jenjang_text }} - {{ $guru->mata_pelajaran }}
                                        </p>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <div>
                                        <span class="font-medium block text-sm text-gray-500">Username</span>
                                        <p>{{ $guru->username }}</p>
                                    </div>

                                    <div>
                                        <span class="font-medium block text-sm text-gray-500">Nomor HP</span>
                                        <p>{{ $guru->no_hp }}</p>
                                    </div>

                                    <div>
                                        <span class="font-medium block text-sm text-gray-500">Alamat</span>
                                        <p class="whitespace-pre-line">{{ $guru->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">Mengajar</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <span class="font-medium block text-sm text-gray-500">Jenjang</span>
                                        <p>{{ $guru->jenjang_text }}</p>
                                    </div>
                                    <div>
                                        <span class="font-medium block text-sm text-gray-500">Mata Pelajaran</span>
                                        <p>{{ $guru->mata_pelajaran }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">Dokumen</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    @if($guru->foto)
                                    <div>
                                        <span class="font-medium block text-sm text-gray-500 mb-2">Foto Profil</span>
                                        <a href="{{ $guru->foto_url }}" target="_blank" class="inline-block">
                                            <img src="{{ $guru->foto_url }}" alt="Foto Profil" class="h-24 rounded-md shadow-sm border border-gray-200">
                                        </a>
                                    </div>
                                    @endif

                                    @if($guru->cv)
                                    <div>
                                        <span class="font-medium block text-sm text-gray-500 mb-2">Curriculum Vitae</span>
                                        <a href="{{ $guru->cv_url }}" target="_blank"
                                           class="inline-flex items-center px-3 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                            <i class="fas fa-file-pdf text-red-500 mr-2"></i> Lihat CV
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan - Informasi Tambahan -->
                    <div>
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">Riwayat Pendidikan</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="whitespace-pre-line">{{ $guru->riwayat_pendidikan }}</div>
                            </div>
                        </div>

                        @if($guru->status == 'ditolak' && $guru->alasan_penolakan)
                        <div class="mb-6 bg-red-50 border-l-4 border-red-400 p-4 rounded-r-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-circle text-red-400"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">Alasan Penolakan</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <p>{{ $guru->alasan_penolakan }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($guru->status == 'diterima')
                        <div class="mb-6 bg-green-50 border-l-4 border-green-400 p-4 rounded-r-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-check-circle text-green-400"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-green-800">Guru Telah Diterima</h3>
                                    <div class="mt-2 text-sm text-green-700">
                                        <p>Guru ini telah lolos verifikasi dan dapat mengajar di platform ini.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($guru->status == 'menunggu')
                        <div class="mb-6 bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-r-lg">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-clock text-yellow-400"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-yellow-800">Menunggu Verifikasi</h3>
                                    <div class="mt-2 text-sm text-yellow-700">
                                        <p>Guru ini sedang menunggu proses verifikasi oleh admin.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="mt-6 flex justify-between">
                    <a href="{{ route('admin.guru.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar
                    </a>

                    @if($guru->status == 'menunggu')
                    <div class="space-x-2">
                        <form action="{{ route('admin.guru.diterima', $guru->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <i class="fas fa-check mr-2"></i> Terima
                            </button>
                        </form>

                        <button onclick="showRejectModal()" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <i class="fas fa-times mr-2"></i> Tolak
                        </button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Penolakan -->
<div id="rejectModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div>
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Tolak Guru</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">Silakan berikan alasan penolakan untuk guru ini.</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('admin.guru.ditolak', $guru->id) }}" method="POST" class="mt-5">
                @csrf
                <div>
                    <label for="alasan_penolakan" class="block text-sm font-medium text-gray-700">Alasan Penolakan</label>
                    <textarea id="alasan_penolakan" name="alasan_penolakan" rows="3" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>

                <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:col-start-2 sm:text-sm">
                        Tolak
                    </button>
                    <button type="button" onclick="hideRejectModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:col-start-1 sm:text-sm">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showRejectModal() {
        document.getElementById('rejectModal').classList.remove('hidden');
    }

    function hideRejectModal() {
        document.getElementById('rejectModal').classList.add('hidden');
    }
</script>

@endsection

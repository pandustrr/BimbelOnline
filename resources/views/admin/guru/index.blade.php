@extends('layouts.app')

@section('title', 'Kelola Pendaftaran Guru')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-6">Kelola Pendaftaran Guru</h2>

                <!-- Tab Navigasi -->
                <div class="mb-6 border-b border-gray-200">
                    <nav class="flex space-x-8">
                        <button onclick="changeTab(null)" class="{{ request()->get('tab') === null ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm flex items-center">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Menunggu (<span id="count-menunggu">{{ $guruMenunggu->count() }}</span>)
                        </button>
                        <button onclick="changeTab('diterima')" class="{{ request()->get('tab') === 'diterima' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm flex items-center">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Diterima (<span id="count-diterima">{{ $guruDiterima->count() }}</span>)
                        </button>
                        <button onclick="changeTab('ditolak')" class="{{ request()->get('tab') === 'ditolak' ? 'border-indigo-500 text-indigo-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' }} whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm flex items-center">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Ditolak (<span id="count-ditolak">{{ $guruDitolak->count() }}</span>)
                        </button>
                    </nav>
                </div>

                <!-- Konten Dinamis -->
                <div id="tabContent">
                    @if(request()->get('tab') == 'diterima')
                        @include('admin.guru.diterima')
                    @elseif(request()->get('tab') == 'ditolak')
                        @include('admin.guru.ditolak')
                    @else
                        @include('admin.guru.menunggu')
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Penolakan -->
    <div id="modalTolak" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-3">Alasan Penolakan</h3>
                <div class="mt-2 px-7 py-3">
                    <form id="formTolak" method="POST">
                        @csrf
                        <textarea name="alasan_penolakan" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan alasan penolakan..." required></textarea>
                        <div class="mt-4 flex justify-center space-x-4">
                            <button type="button" onclick="hideModalTolak()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                Batal
                            </button>
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Tolak
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function changeTab(tab) {
            // Tampilkan loading
            document.getElementById('tabContent').innerHTML = '<div class="flex justify-center py-8"><div class="animate-spin rounded-full h-12 w-12 border-t-2 border-b-2 border-indigo-500"></div></div>';

            // Update URL tanpa reload halaman
            const url = new URL(window.location.href);
            if (tab) {
                url.searchParams.set('tab', tab);
            } else {
                url.searchParams.delete('tab');
            }
            window.history.pushState({}, '', url);

            // Load konten tab via AJAX
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('tabContent').innerHTML = data.html;

                // Update kelas aktif pada tab
                document.querySelectorAll('nav button').forEach(btn => {
                    btn.classList.remove('border-indigo-500', 'text-indigo-600');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });

                const activeTabBtn = tab
                    ? document.querySelector(`nav button[onclick="changeTab('${tab}')"]`)
                    : document.querySelector('nav button[onclick="changeTab(null)"]');

                if (activeTabBtn) {
                    activeTabBtn.classList.add('border-indigo-500', 'text-indigo-600');
                    activeTabBtn.classList.remove('border-transparent', 'text-gray-500');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('tabContent').innerHTML = '<div class="bg-red-50 border-l-4 border-red-400 p-4"><p class="text-red-700">Terjadi kesalahan saat memuat data</p></div>';
            });
        }

        function terimaGuru(url) {
            if (confirm('Apakah Anda yakin ingin menerima guru ini?')) {
                fetch(url, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            }
        }

        function showModalTolak(url) {
            document.getElementById('formTolak').action = url;
            document.getElementById('modalTolak').classList.remove('hidden');
        }

        function hideModalTolak() {
            document.getElementById('modalTolak').classList.add('hidden');
        }

        window.addEventListener('popstate', function() {
            const url = new URL(window.location.href);
            const tab = url.searchParams.get('tab');
            changeTab(tab);
        });
    </script>
</div>
@endsection

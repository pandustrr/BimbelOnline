<nav class="sticky top-0 z-50 bg-white shadow-md backdrop-blur-md border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <a href="{{ Auth::guard('admin')->check() ? route('admin.dashboard') : '/' }}" class="flex items-center">
                <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="ml-2 text-xl font-bold text-gray-900">Bimbel Online</span>
            </a>

            <!-- Menu Utama -->
            <div class="flex items-center space-x-4">

                {{-- ADMIN --}}
                @auth('admin')
                    @php
                        $adminRoutes = [
                            'admin.guru.index' => 'Kelola Guru',
                            'admin.jadwal.index' => 'Kelola Jadwal Guru',
                            'admin.siswa.index' => 'Kelola Siswa',
                        ];
                    @endphp

                    @foreach ($adminRoutes as $route => $label)
                        <a href="{{ route($route) }}"
                            class="px-3 py-2 text-sm font-medium {{ request()->routeIs($route) ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }}">
                            {{ $label }}
                        </a>
                    @endforeach

                    <!-- Dropdown Admin -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center space-x-1 px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600">
                            <span>{{ Auth::guard('admin')->user()->nama }}</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- GURU --}}
                @elseif(auth()->guard('guru')->check())
                    <a href="{{ route('guru.jadwal') }}"
                        class="px-3 py-2 text-sm font-medium {{ request()->routeIs('guru.jadwal*') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }}">
                        <i class="fas fa-calendar-alt mr-1"></i> Jadwal Mengajar
                    </a>

                    <a href="{{ route('guru.profile') }}"
                        class="px-3 py-2 text-sm font-medium {{ request()->routeIs('guru.profile*') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }}">
                        <i class="fas fa-user mr-1"></i> Profil Saya
                    </a>

                    <!-- Dropdown -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="flex items-center space-x-2">
                            <img src="{{ Auth::guard('guru')->user()->foto_url }}" alt="Foto Profil"
                                class="h-8 w-8 rounded-full object-cover border border-gray-200">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 border border-gray-100">
                            <a href="{{ route('guru.profile') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i> Profil
                            </a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- SISWA --}}
                @elseif(auth()->guard('siswa')->check())
                    <a href="{{ route('siswa.profile') }}"
                        class="px-3 py-2 text-sm font-medium {{ request()->routeIs('siswa.profile') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }}">
                        Profile
                    </a>
                    <a href="{{ route('siswa.pendaftaran') }}"
                        class="px-3 py-2 text-sm font-medium {{ request()->routeIs('siswa.pendaftaran*') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }}">
                        <i class="fas fa-search mr-1"></i> Cari Guru
                    </a>
                    <a href="{{ route('siswa.kelas-saya') }}"
                        class="px-3 py-2 text-sm font-medium {{ request()->routeIs('siswa.kelas-saya') ? 'text-indigo-600 font-semibold' : 'text-gray-700 hover:text-indigo-600' }}">
                        <i class="fas fa-book mr-1"></i> Kelas Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600">
                            Logout
                        </button>
                    </form>

                    {{-- GUEST --}}
                @else
                    <a href="/login" class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600">
                        Masuk
                    </a>

                    <!-- Dropdown Daftar -->
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 flex items-center">
                            Daftar
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div x-show="open" @click.away="open = false" x-transition
                            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                            <a href="/register/siswa" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Daftar sebagai Siswa
                            </a>
                            <a href="/register/guru" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Daftar sebagai Guru
                            </a>
                        </div>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</nav>

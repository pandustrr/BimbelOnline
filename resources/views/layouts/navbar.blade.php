<nav class="sticky top-0 z-50 bg-white shadow-md backdrop-blur-md border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ Auth::guard('admin')->check() ? route('admin.dashboard') : '/' }}" class="flex items-center">
                    <svg class="h-8 w-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="ml-2 text-xl font-bold text-gray-900">BimbelOnline</span>
                </a>
            </div>

            <!-- Menu -->
            <div class="flex items-center space-x-4">
                @auth('admin')
                    <!-- Menu Admin -->
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="{{ route('admin.dashboard') }}"
                            class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 transition duration-200">
                            Dashboard
                        </a>
                        <a href="{{ route('admin.guru.index') }}"
                            class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 transition duration-200">
                            Kelola Guru
                        </a>

                        <!-- Dropdown Admin -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="flex items-center space-x-1 px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600">
                                <span>{{ Auth::guard('admin')->user()->nama }}</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Isi dropdown -->
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
                    </div>

                    @elseauth('guru')
                    <!-- Menu Guru -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('guru.dashboard') }}"
                            class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 transition duration-200">
                            Dashboard
                        </a>
                        <div class="flex items-center space-x-2">
                            <img src="{{ Auth::guard('guru')->user()->foto ? asset('storage/' . Auth::guard('guru')->user()->foto) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::guard('guru')->user()->nama_guru) }}"
                                alt="Foto Profil" class="h-8 w-8 rounded-full object-cover">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                    class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 transition duration-200">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>

                    @elseauth('siswa')
                    <!-- Menu Siswa -->
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('siswa.dashboard') }}"
                            class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 transition duration-200">
                            Dashboard
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="px-3 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 transition duration-200">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Menu Guest -->
                    <a href="/login"
                        class="px-4 py-2 text-sm font-medium text-gray-700 hover:text-indigo-600 transition duration-200">
                        Masuk
                    </a>
                    <div x-data="{ open: false }" class="relative">
                        <button @click="open = !open"
                            class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md hover:bg-indigo-700 transition duration-200 flex items-center">
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
                </div>
            @endauth
        </div>
    </div>
    </div>
</nav>

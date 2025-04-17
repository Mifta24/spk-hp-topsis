<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Sistem Rekomendasi Handphone' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .navbar-glass {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        .custom-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        }

        .menu-item {
            position: relative;
        }

        .menu-item::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #A5B4FC;
            bottom: -2px;
            left: 0;
            transition: width 0.3s ease;
        }

        .menu-item:hover::after,
        .menu-item.active::after {
            width: 100%;
        }

        .mobile-menu-enter {
            opacity: 0;
            transform: translateY(-10px);
        }

        .mobile-menu-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 0.2s, transform 0.2s;
        }

        .mobile-menu-exit {
            opacity: 1;
            transform: translateY(0);
        }

        .mobile-menu-exit-active {
            opacity: 0;
            transform: translateY(-10px);
            transition: opacity 0.2s, transform 0.2s;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <header class="sticky top-0 z-50">
            <nav class="custom-gradient text-white shadow-lg">
                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center py-4">
                        <!-- Logo -->
                        <div class="flex items-center space-x-2">
                            <div class="bg-white p-2 rounded-lg shadow-md">
                                <img src="https://cdn-icons-png.flaticon.com/512/186/186239.png" alt="PhoneMatch Logo"
                                    class="h-8 w-8">
                            </div>
                            <div>
                                <a href="/" class="flex items-center">
                                    <span class="text-2xl font-bold tracking-tighter">Phone<span
                                            class="text-indigo-200">Match</span></span>
                                </a>
                                <p class="text-xs text-indigo-200 -mt-1">Cari Handphone Terbaik untuk Anda</p>
                            </div>
                        </div>

                        <!-- Desktop Menu -->
                        <div class="hidden md:flex items-center space-x-8">
                            <a href="{{ route('handphone.index') }}"
                                class="menu-item py-2 text-sm font-medium hover:text-indigo-200 transition {{ request()->routeIs('handphone.index') ? 'active text-indigo-200' : 'text-white' }}">
                                <i class="fas fa-mobile-alt mr-1"></i> Daftar Handphone
                            </a>
                            <a href="{{ route('recommendation') }}"
                                class="menu-item py-2 text-sm font-medium hover:text-indigo-200 transition {{ request()->routeIs('recommendation') ? 'active text-indigo-200' : 'text-white' }}">
                                <i class="fas fa-search mr-1"></i> Cari Rekomendasi
                            </a>
                            <a href="{{ route('compare.index') }}"
                                class="menu-item py-2 text-sm font-medium hover:text-indigo-200 transition {{ request()->routeIs('compare.*') ? 'active text-indigo-200' : 'text-white' }} relative">
                                <i class="fas fa-exchange-alt mr-1"></i> Perbandingan
                                @if (count(session('compare_ids', [])) > 0)
                                    <span
                                        class="absolute -top-2 -right-3 bg-white text-indigo-700 text-xs font-bold px-1.5 py-0.5 rounded-full">
                                        {{ count(session('compare_ids', [])) }}
                                    </span>
                                @endif
                            </a>
                            <a href="{{ route('about.topsis') }}"
                                class="menu-item py-2 text-sm font-medium hover:text-indigo-200 transition">
                                <i class="fas fa-info-circle mr-1"></i> Tentang TOPSIS
                            </a>

                            <div class="pl-6 border-l border-indigo-400">
                                <a href="{{ route('recommendation') }}"
                                    class="bg-white text-indigo-700 hover:bg-indigo-50 transition shadow-md px-4 py-2 rounded-full text-sm font-medium flex items-center">
                                    <i class="fas fa-bolt mr-2"></i> Mulai
                                </a>
                            </div>
                        </div>

                        <!-- Mobile Menu Button -->
                        <div class="md:hidden flex items-center">
                            <button id="mobile-menu-button" class="text-white focus:outline-none">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path id="menu-icon" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                    <path id="close-icon" class="hidden" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Mobile Menu -->
                    <div id="mobile-menu" class="md:hidden hidden pb-4">
                        <div class="flex flex-col space-y-2 pt-2 pb-3 border-t border-indigo-400">
                            <a href="{{ route('handphone.index') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition {{ request()->routeIs('handphone.index') ? 'bg-indigo-700 text-white' : 'text-white' }}">
                                <i class="fas fa-mobile-alt mr-2"></i> Daftar Handphone
                            </a>
                            <a href="{{ route('recommendation') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition {{ request()->routeIs('recommendation') ? 'bg-indigo-700 text-white' : 'text-white' }}">
                                <i class="fas fa-search mr-2"></i> Cari Rekomendasi
                            </a>
                            <a href="{{ route('compare.index') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition {{ request()->routeIs('compare.*') ? 'bg-indigo-700 text-white' : 'text-white' }} flex justify-between items-center">
                                <div>
                                    <i class="fas fa-exchange-alt mr-2"></i> Perbandingan
                                </div>
                                @if (count(session('compare_ids', [])) > 0)
                                    <span class="bg-white text-indigo-700 text-xs font-bold px-1.5 py-0.5 rounded-full">
                                        {{ count(session('compare_ids', [])) }}
                                    </span>
                                @endif
                            </a>
                            <a href="{{ route('about.topsis') }}"
                                class="px-3 py-2 rounded-md text-sm font-medium hover:bg-indigo-700 transition text-white">
                                <i class="fas fa-info-circle mr-2"></i> Tentang TOPSIS
                            </a>
                            <div class="pt-2 mt-2 border-t border-indigo-400">
                                <a href="{{ route('recommendation') }}"
                                    class="block text-center bg-white text-indigo-700 hover:bg-indigo-50 transition shadow-md px-3 py-2 rounded-md text-sm font-medium">
                                    <i class="fas fa-bolt mr-2"></i> Mulai Sekarang
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Title Bar (optional) -->
            @if (isset($pageTitle))
                <div class="bg-gray-800 text-white border-t border-gray-700">
                    <div class="container mx-auto px-4 py-3">
                        <div class="flex items-center">
                            <h1 class="text-xl font-medium">{{ $pageTitle }}</h1>
                            @if (isset($pageSubtitle))
                                <span class="mx-2 text-gray-400">|</span>
                                <p class="text-sm text-gray-300">{{ $pageSubtitle }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-4 py-8">
            <div class="max-w-5xl mx-auto">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-6">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="flex items-center mb-4 md:mb-0">
                        <img src="https://cdn-icons-png.flaticon.com/512/186/186239.png" alt="PhoneMatch Logo"
                            class="h-8 w-8 mr-2">
                        <div>
                            <p class="font-semibold">PhoneMatch</p>
                            <p class="text-xs text-gray-400">Sistem Rekomendasi Handphone dengan Metode TOPSIS by Miftah
                            </p>
                        </div>
                    </div>
                    <p class="mb-4 md:mb-0 text-center md:text-left text-sm text-gray-400">&copy; {{ date('Y') }}
                        PhoneMatch. All rights reserved.</p>
                    <div class="flex space-x-4">
                        <a href="https://github.com/Mifta24" class="text-gray-400 hover:text-white transition-colors"
                            title="GitHub">
                            <i class="fab fa-github text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors" title="LinkedIn">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors" title="Instagram">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const closeIcon = document.getElementById('close-icon');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                menuIcon.classList.toggle('hidden');
                closeIcon.classList.toggle('hidden');
            });
        }
    </script>
</body>

</html>

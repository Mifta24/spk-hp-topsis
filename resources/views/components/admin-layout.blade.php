
<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\components\admin-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'PhoneMatch Admin' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak] { display: none !important; }
        .bg-pattern {
            background-color: #f9fafb;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill-rule='evenodd'%3E%3Cg fill='%23e5e7eb' fill-opacity='0.4'%3E%3Cpath opacity='.5' d='M96 95h4v1h-4v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4h-9v4h-1v-4H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15v-9H0v-1h15V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h9V0h1v15h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9h4v1h-4v9zm-1 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm9-10v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-10 0v-9h-9v9h9zm-9-10h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9zm10 0h9v-9h-9v9z'/%3E%3Cpath d='M6 5V0H5v5H0v1h5v94h1V6h94V5H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="bg-pattern">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-gray-900 text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-4 bg-indigo-600">
                <div class="flex items-center space-x-2">
                    <span class="bg-white text-indigo-600 h-8 w-8 rounded-full flex items-center justify-center">
                        <i class="fas fa-mobile-alt"></i>
                    </span>
                    <span class="text-xl font-bold">PhoneMatch</span>
                </div>
                <p class="text-xs text-indigo-200 mt-1">Admin Panel</p>
            </div>
            <nav class="mt-6 px-2">
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-700 hover:text-white' }} transition-all duration-200 mb-2">
                    <i class="fas fa-tachometer-alt w-5 h-5 mr-3 text-center"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.handphone.index') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.handphone.*') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-700 hover:text-white' }} transition-all duration-200 mb-2">
                    <i class="fas fa-mobile-alt w-5 h-5 mr-3 text-center"></i>
                    Handphone
                </a>

                <a href="{{ route('admin.criteria.index') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.criteria.*') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-700 hover:text-white' }} transition-all duration-200 mb-2">
                    <i class="fas fa-list-check w-5 h-5 mr-3 text-center"></i>
                    Kriteria
                </a>

                <div class="border-t border-gray-700 my-4"></div>

                <a href="{{ route('admin.profile') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.profile') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-700 hover:text-white' }} transition-all duration-200 mb-2">
                    <i class="fas fa-user w-5 h-5 mr-3 text-center"></i>
                    Profil
                </a>

                <a href="{{ url('/') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-indigo-700 hover:text-white transition-all duration-200">
                    <i class="fas fa-home w-5 h-5 mr-3 text-center"></i>
                    Kembali ke Website
                </a>
            </nav>
        </div>

        <!-- Mobile Sidebar Toggle -->
        <div class="md:hidden fixed bottom-4 right-4 z-50">
            <button type="button" x-data x-on:click="$dispatch('toggle-sidebar')" class="bg-indigo-600 text-white p-3 rounded-full shadow-lg">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Sidebar -->
        <div x-data="{ open: false }" x-on:toggle-sidebar.window="open = !open" x-cloak class="md:hidden">
            <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50 z-40" x-on:click="open = false"></div>

            <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 w-64 bg-gray-900 z-50 transform">
                <div class="p-4 bg-indigo-600">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <span class="bg-white text-indigo-600 h-8 w-8 rounded-full flex items-center justify-center">
                                <i class="fas fa-mobile-alt"></i>
                            </span>
                            <span class="text-xl font-bold text-white">PhoneMatch</span>
                        </div>
                        <button type="button" x-on:click="open = false" class="text-indigo-200 hover:text-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <p class="text-xs text-indigo-200 mt-1">Admin Panel</p>
                </div>

                <nav class="mt-6 px-2">
                    <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-700 hover:text-white' }} transition-all duration-200 mb-2">
                        <i class="fas fa-tachometer-alt w-5 h-5 mr-3 text-center"></i>
                        Dashboard
                    </a>

                    <a href="{{ route('admin.handphone.index') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.handphone.*') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-700 hover:text-white' }} transition-all duration-200 mb-2">
                        <i class="fas fa-mobile-alt w-5 h-5 mr-3 text-center"></i>
                        Handphone
                    </a>

                    <a href="{{ route('admin.criteria.index') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.criteria.*') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-700 hover:text-white' }} transition-all duration-200 mb-2">
                        <i class="fas fa-list-check w-5 h-5 mr-3 text-center"></i>
                        Kriteria
                    </a>

                    <div class="border-t border-gray-700 my-4"></div>

                    <a href="{{ route('admin.profile') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('admin.profile') ? 'bg-indigo-800 text-white' : 'text-gray-300 hover:bg-indigo-700 hover:text-white' }} transition-all duration-200 mb-2">
                        <i class="fas fa-user w-5 h-5 mr-3 text-center"></i>
                        Profil
                    </a>

                    <a href="{{ url('/') }}" class="group flex items-center px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-indigo-700 hover:text-white transition-all duration-200">
                        <i class="fas fa-home w-5 h-5 mr-3 text-center"></i>
                        Kembali ke Website
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <header class="bg-white border-b border-gray-200 shadow-sm">
                <div class="flex justify-between items-center px-6 py-3">
                    <h1 class="text-xl font-semibold text-gray-800">{{ $header ?? 'Dashboard' }}</h1>
                    <div class="flex items-center space-x-3">
                        <span class="text-sm text-gray-600 hidden md:inline-block">{{ Auth::user()->name }}</span>
                        <div x-data="{ dropdownOpen: false }" class="relative">
                            <button @click="dropdownOpen = !dropdownOpen" class="relative w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center focus:outline-none">
                                <span class="text-indigo-600 font-semibold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </button>
                            <div x-show="dropdownOpen" @click.outside="dropdownOpen = false" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-md shadow-xl z-20">
                                <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-500 hover:text-white">
                                    Pengaturan Profil
                                </a>
                                <hr class="my-1">
                                <form action="{{ route('logout') }}" method="POST" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-indigo-500 hover:text-white">
                                        Keluar (Logout)
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-pattern p-4 md:p-6">
                @if(session('success'))
                    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md flex" role="alert">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Berhasil!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md flex" role="alert">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Error!</p>
                            <p>{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md flex" role="alert">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-triangle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="font-medium">Terdapat {{ $errors->count() }} kesalahan:</p>
                            <ul class="list-disc pl-5 space-y-1 mt-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="bg-white border-t border-gray-200 py-3 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} PhoneMatch TOPSIS - All rights reserved
            </footer>
        </div>
    </div>
</body>
</html>

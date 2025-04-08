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
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 flex-shrink-0 hidden md:block">
            <div class="p-4 bg-gray-900">
                <div class="flex items-center space-x-2">
                    <img src="https://cdn-icons-png.flaticon.com/512/186/186239.png" alt="PhoneMatch Logo" class="h-8 w-8">
                    <span class="text-xl font-bold">PhoneMatch</span>
                </div>
                <p class="text-xs text-gray-400 mt-1">Admin Panel</p>
            </div>
            <nav class="mt-4">
                <a href="{{ route('admin.handphone.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.handphone.*') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-mobile-alt mr-2"></i> Handphone
                </a>
                <a href="{{ route('admin.criteria.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.criteria.*') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                    <i class="fas fa-list-check mr-2"></i> Criteria
                </a>
                <div class="border-t border-gray-700 my-4"></div>
                <a href="{{ url('/') }}" class="block py-2.5 px-4 rounded transition duration-200 text-gray-400 hover:bg-gray-700 hover:text-white">
                    <i class="fas fa-home mr-2"></i> Back to Website
                </a>
            </nav>
        </div>

        <!-- Mobile Sidebar Toggle -->
        <div class="md:hidden fixed bottom-4 right-4 z-50">
            <button type="button" x-data x-on:click="$dispatch('toggle-sidebar')" class="bg-gray-800 text-white p-3 rounded-full shadow-lg">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Sidebar -->
        <div x-data="{ open: false }" x-on:toggle-sidebar.window="open = !open" class="md:hidden">
            <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-50 z-40" x-on:click="open = false"></div>

            <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" class="fixed inset-y-0 left-0 w-64 bg-gray-800 z-50 transform">
                <div class="p-4 bg-gray-900">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <img src="https://cdn-icons-png.flaticon.com/512/186/186239.png" alt="PhoneMatch Logo" class="h-8 w-8">
                            <span class="text-xl font-bold text-white">PhoneMatch</span>
                        </div>
                        <button type="button" x-on:click="open = false" class="text-gray-400 hover:text-white">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">Admin Panel</p>
                </div>
                <nav class="mt-4">
                    <a href="{{ route('admin.handphone.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.handphone.*') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                        <i class="fas fa-mobile-alt mr-2"></i> Handphone
                    </a>
                    <a href="{{ route('admin.criteria.index') }}" class="block py-2.5 px-4 rounded transition duration-200 {{ request()->routeIs('admin.criteria.*') ? 'bg-gray-700 text-white' : 'text-gray-400 hover:bg-gray-700 hover:text-white' }}">
                        <i class="fas fa-list-check mr-2"></i> Criteria
                    </a>
                    <div class="border-t border-gray-700 my-4"></div>
                    <a href="{{ url('/') }}" class="block py-2.5 px-4 rounded transition duration-200 text-gray-400 hover:bg-gray-700 hover:text-white">
                        <i class="fas fa-home mr-2"></i> Back to Website
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <header class="bg-white border-b border-gray-200 shadow-sm">
                <div class="flex justify-between items-center p-4">
                    <h1 class="text-xl font-semibold text-gray-800">{{ $header ?? 'Dashboard' }}</h1>
                    <div>
                        <span class="text-gray-600">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-4 md:p-6">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                        <p class="font-bold">Success</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                        <p class="font-bold">Error</p>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                        <p class="font-bold">Error</p>
                        <ul class="list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>  
    </div>
</body>
</html>

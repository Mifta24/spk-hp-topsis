<x-layout>
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Daftar Handphone</h1>
                <p class="text-gray-600 mt-1">Bandingkan berbagai pilihan handphone yang tersedia</p>
            </div>

            <div class="mt-4 md:mt-0">
                <a href="{{ route('recommendation') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fas fa-calculator mr-2"></i> Cari Rekomendasi
                </a>
            </div>
        </div>

        <!-- Search Bar - NEW -->
        <div class="mb-6">
            <form action="{{ route('handphone.index') }}" method="GET" class="flex">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari handphone..." class="w-full md:w-1/2 rounded-l-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-r-md">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>

        <!-- Filters - UPDATED -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6 border border-gray-200">
            <form action="{{ route('handphone.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-5 gap-4">
                <!-- Keep existing search parameter if present -->
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif

                <!-- Brand Filter - NEW -->
                <div>
                    <label for="brand" class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                    <select name="brand" id="brand" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Semua Brand</option>
                        @foreach(\App\Models\Brand::where('is_active', true)->orderBy('name')->get() as $brand)
                            <option value="{{ $brand->id }}" {{ request('brand') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="price_range" class="block text-sm font-medium text-gray-700 mb-1">Rentang Harga</label>
                    <select name="price_range" id="price_range" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Semua Harga</option>
                        <option value="budget" {{ request('price_range') == 'budget' ? 'selected' : '' }}>Budget (< 2 juta)</option>
                        <option value="entry" {{ request('price_range') == 'entry' ? 'selected' : '' }}>Entry Level (2-4 juta)</option>
                        <option value="mid" {{ request('price_range') == 'mid' ? 'selected' : '' }}>Mid Range (4-8 juta)</option>
                        <option value="premium" {{ request('price_range') == 'premium' ? 'selected' : '' }}>Premium (> 8 juta)</option>
                    </select>
                </div>

                <div>
                    <label for="sort_by" class="block text-sm font-medium text-gray-700 mb-1">Urutkan</label>
                    <select name="sort_by" id="sort_by" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="price_asc" {{ request('sort_by') == 'price_asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                        <option value="price_desc" {{ request('sort_by') == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                        <option value="name_asc" {{ request('sort_by') == 'name_asc' ? 'selected' : '' }}>Nama: A-Z</option>
                        <option value="name_desc" {{ request('sort_by') == 'name_desc' ? 'selected' : '' }}>Nama: Z-A</option>
                    </select>
                </div>

                <div>
                    <label for="feature" class="block text-sm font-medium text-gray-700 mb-1">Fitur Utama</label>
                    <select name="feature" id="feature" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Semua Fitur</option>
                        <option value="camera" {{ request('feature') == 'camera' ? 'selected' : '' }}>Kamera Bagus</option>
                        <option value="battery" {{ request('feature') == 'battery' ? 'selected' : '' }}>Baterai Tahan Lama</option>
                        <option value="ram" {{ request('feature') == 'ram' ? 'selected' : '' }}>RAM Besar</option>
                        <option value="storage" {{ request('feature') == 'storage' ? 'selected' : '' }}>Penyimpanan Besar</option>
                        <option value="design" {{ request('feature') == 'design' ? 'selected' : '' }}>Desain Menarik</option>
                        <option value="processor" {{ request('feature') == 'processor' ? 'selected' : '' }}>Prosesor Canggih</option>
                    </select>
                </div>

                <div class="flex items-end">
                    <button type="submit" class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded-md w-full md:w-auto text-center">
                        <i class="fas fa-filter mr-2"></i> Filter
                    </button>
                </div>
            </form>
        </div>

        <!-- Active Filters - NEW -->
        @if(request('search') || request('brand') || request('price_range') || request('feature'))
        <div class="mb-6 flex flex-wrap items-center">
            <span class="text-sm text-gray-600 mr-2">Filter aktif:</span>

            @if(request('search'))
            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded-full flex items-center m-1">
                Pencarian: "{{ request('search') }}"
                <a href="{{ url()->current() }}?{{ http_build_query(request()->except('search')) }}" class="ml-1 text-gray-500 hover:text-red-500">
                    <i class="fas fa-times-circle"></i>
                </a>
            </span>
            @endif

            @if(request('brand'))
            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded-full flex items-center m-1">
                Brand: {{ \App\Models\Brand::find(request('brand'))->name ?? '' }}
                <a href="{{ url()->current() }}?{{ http_build_query(request()->except('brand')) }}" class="ml-1 text-gray-500 hover:text-red-500">
                    <i class="fas fa-times-circle"></i>
                </a>
            </span>
            @endif

            @if(request('price_range'))
            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded-full flex items-center m-1">
                Harga:
                @if(request('price_range') == 'budget')
                    Budget (< 2 juta)
                @elseif(request('price_range') == 'entry')
                    Entry Level (2-4 juta)
                @elseif(request('price_range') == 'mid')
                    Mid Range (4-8 juta)
                @elseif(request('price_range') == 'premium')
                    Premium (> 8 juta)
                @endif
                <a href="{{ url()->current() }}?{{ http_build_query(request()->except('price_range')) }}" class="ml-1 text-gray-500 hover:text-red-500">
                    <i class="fas fa-times-circle"></i>
                </a>
            </span>
            @endif

            @if(request('feature'))
            <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-1 rounded-full flex items-center m-1">
                Fitur:
                @if(request('feature') == 'camera')
                    Kamera Bagus
                @elseif(request('feature') == 'battery')
                    Baterai Tahan Lama
                @elseif(request('feature') == 'ram')
                    RAM Besar
                @elseif (request('feature') == 'storage')
                    Penyimpanan Besar
                @elseif (request('feature') == 'design')
                    Desain Menarik
                @elseif (request('feature') == 'processor')
                    Prosesor Cepat
                @endif
                <a href="{{ url()->current() }}?{{ http_build_query(request()->except('feature')) }}" class="ml-1 text-gray-500 hover:text-red-500">
                    <i class="fas fa-times-circle"></i>
                </a>
            </span>
            @endif

            <a href="{{ route('handphone.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm ml-auto">
                <i class="fas fa-times mr-1"></i> Hapus semua filter
            </a>
        </div>
        @endif

        <!-- Handphone List - UPDATED -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($handphones as $phone)
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow duration-300">
                <a href="{{ route('handphone.detail', $phone->id) }}" class="block">
                    <div class="relative">
                        @if($phone->specification && $phone->specification->image)
                            <img src="{{ $phone->specification->image }}" alt="{{ $phone->name }}" class="w-full h-48 object-contain">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500"><i class="fas fa-mobile-alt text-4xl"></i></span>
                            </div>
                        @endif

                        <div class="absolute top-2 right-2 bg-gradient-to-r from-indigo-600 to-indigo-800 text-white text-xs py-1 px-2 rounded-full">
                            @if($phone->price >= 8000000)
                                Premium
                            @elseif($phone->price >= 4000000)
                                Mid Range
                            @elseif($phone->price >= 2000000)
                                Entry Level
                            @else
                                Budget
                            @endif
                        </div>
                    </div>

                    <div class="p-4">
                        <!-- Brand name display - NEW -->
                        @if($phone->brand)
                            <div class="text-xs text-gray-500 mb-1">
                                {{ $phone->brand->name }}
                            </div>
                        @endif

                        <h3 class="font-semibold text-lg text-gray-800 mb-1">{{ $phone->name }}</h3>
                        <p class="text-gray-600 text-sm mb-3">Rp{{ number_format($phone->price, 0, ',', '.') }}</p>

                        <div class="flex flex-wrap gap-2 mb-2">
                            @if($phone->camera >= 8)
                                <span class="inline-flex items-center bg-green-50 text-green-700 text-xs px-2 py-1 rounded-full">
                                    <i class="fas fa-camera mr-1"></i> {{ $phone->camera }}/10
                                </span>
                            @endif

                            @if($phone->battery >= 8)
                                <span class="inline-flex items-center bg-yellow-50 text-yellow-700 text-xs px-2 py-1 rounded-full">
                                    <i class="fas fa-battery-full mr-1"></i> {{ $phone->battery }}/10
                                </span>
                            @endif

                            @if($phone->ram >= 8)
                                <span class="inline-flex items-center bg-blue-50 text-blue-700 text-xs px-2 py-1 rounded-full">
                                    <i class="fas fa-memory mr-1"></i> {{ $phone->ram }}/10
                                </span>
                            @endif
                        </div>

                        <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                            <span class="text-gray-500 text-xs">
                                @if($phone->specification)
                                    @if($phone->specification->ram_size)
                                        <span class="mr-2">{{ $phone->specification->ram_size }}</span>
                                    @endif

                                    @if($phone->specification->storage_size)
                                        <span class="mr-2">{{ $phone->specification->storage_size }}</span>
                                    @endif
                                @endif
                            </span>
                            <div class="flex gap-2">
                                <a href="{{ route('compare.add', $phone->id) }}" class="text-blue-600 hover:text-blue-800 text-xs">
                                    <i class="fas fa-exchange-alt mr-1"></i> Bandingkan
                                </a>
                                <span class="text-gray-300">|</span>
                                <a href="{{ route('handphone.detail', $phone->id) }}" class="text-indigo-600 text-sm">Detail <i class="fas fa-chevron-right ml-1 text-xs"></i></a>
                            </div>
                            {{-- <span class="text-indigo-600 text-sm">Detail <i class="fas fa-chevron-right ml-1 text-xs"></i></span> --}}
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-span-full py-10 text-center">
                <div class="text-gray-500">
                    <i class="fas fa-search mb-4 text-4xl"></i>
                    <p class="text-lg font-medium">Tidak ada handphone yang ditemukan.</p>
                    <p class="mt-1">Coba ubah filter pencarian Anda.</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $handphones->withQueryString()->links() }}
        </div>
    </div>
</x-layout>

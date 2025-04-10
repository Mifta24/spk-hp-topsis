<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\handphone\index.blade.php -->
<x-admin-layout header="Manajemen Handphone">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h1 class="text-xl font-bold text-gray-800">Data Handphone</h1>
                <p class="text-gray-600 mt-1">Kelola data handphone untuk rekomendasi TOPSIS</p>
            </div>

            <div class="mt-4 md:mt-0">
                <a href="{{ route('admin.handphone.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm inline-flex items-center transition-colors">
                    <i class="fas fa-plus mr-2"></i> Tambah Handphone
                </a>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="mb-6 bg-gray-50 rounded-lg p-4 border border-gray-200">
            <form action="{{ route('admin.handphone.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Handphone</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md" placeholder="Cari nama handphone...">
                    </div>
                </div>

                <div class="w-full md:w-48">
                    <label for="price_range" class="block text-sm font-medium text-gray-700 mb-1">Kisaran Harga</label>
                    <select name="price_range" id="price_range" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        <option value="">Semua Harga</option>
                        <option value="budget" {{ request('price_range') == 'budget' ? 'selected' : '' }}>Budget (< 2 juta)</option>
                        <option value="entry" {{ request('price_range') == 'entry' ? 'selected' : '' }}>Entry Level (2-4 juta)</option>
                        <option value="mid" {{ request('price_range') == 'mid' ? 'selected' : '' }}>Mid Range (4-8 juta)</option>
                        <option value="premium" {{ request('price_range') == 'premium' ? 'selected' : '' }}>Premium (> 8 juta)</option>
                    </select>
                </div>

                <div class="w-full md:w-48">
                    <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Urutkan</label>
                    <select name="sort" id="sort" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)</option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga (Rendah-Tinggi)</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga (Tinggi-Rendah)</option>
                    </select>
                </div>

                <div class="flex items-end space-x-2">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm">
                        <i class="fas fa-filter mr-2"></i> Filter
                    </button>
                    <a href="{{ route('admin.handphone.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md shadow-sm">
                        <i class="fas fa-sync-alt"></i>
                    </a>
                </div>
            </form>
        </div>

        <!-- Data Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Handphone</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Spesifikasi</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($handphones as $handphone)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden">
                                        @if($handphone->specification && $handphone->specification->image)
                                            <img src="{{ $handphone->specification->image }}" alt="{{ $handphone->name }}" class="max-h-full max-w-full object-contain">
                                        @else
                                            <i class="fas fa-mobile-alt text-gray-400"></i>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $handphone->name }}</div>
                                        <div class="text-xs text-gray-500">
                                            @if($handphone->category)
                                                <span class="px-2 py-0.5 rounded-full {{
                                                    $handphone->category == 'Premium' ? 'bg-purple-100 text-purple-800' :
                                                    ($handphone->category == 'Mid-range' ? 'bg-blue-100 text-blue-800' :
                                                     ($handphone->category == 'Entry-level' ? 'bg-green-100 text-green-800' :
                                                      'bg-gray-100 text-gray-800'))
                                                }}">
                                                    {{ $handphone->category }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Rp{{ number_format($handphone->price, 0, ',', '.') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">
                                    @if($handphone->specification)
                                        <div class="flex flex-col space-y-1">
                                            <span>{{ $handphone->specification->ram_size ?? '-' }} / {{ $handphone->specification->storage_size ?? '-' }}</span>
                                            <span>{{ $handphone->specification->processor_name ?? '-' }}</span>
                                        </div>
                                    @else
                                        <span class="text-gray-400">No specifications</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-1">
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-camera mr-1"></i> {{ $handphone->camera }}
                                    </span>
                                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <i class="fas fa-battery-full mr-1"></i> {{ $handphone->battery }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-3">
                                    <a href="{{ route('admin.handphone.show', $handphone->id) }}" class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye mr-1"></i> Lihat
                                    </a>
                                    <a href="{{ route('admin.handphone.edit', $handphone->id) }}" class="text-indigo-600 hover:text-indigo-900">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.handphone.destroy', $handphone->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus handphone ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                Belum ada data handphone.
                                <a href="{{ route('admin.handphone.create') }}" class="text-indigo-600 hover:text-indigo-900">Tambah handphone baru</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $handphones->withQueryString()->links() }}
        </div>
    </div>
</x-admin-layout>

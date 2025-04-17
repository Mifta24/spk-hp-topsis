<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\brand\index.blade.php -->
<x-admin-layout header="Manajemen Brand">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Daftar Brand</h1>
            <p class="text-gray-600 mt-1">Kelola brand handphone yang tersedia di sistem</p>
        </div>
        <a href="{{ route('admin.brand.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors duration-300 flex items-center">
            <i class="fas fa-plus mr-2"></i> Tambah Brand
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <div class="p-4 border-b border-gray-200 bg-gray-50 flex flex-col md:flex-row justify-between items-start md:items-center space-y-2 md:space-y-0">
            <h2 class="text-lg font-medium text-gray-800">Semua Brand</h2>
            <div class="flex items-center space-x-2">
                <form action="{{ route('admin.brand.index') }}" method="GET" class="flex">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari brand..." class="border border-gray-300 rounded-l-md px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500" style="min-width: 200px;">
                    <button type="submit" class="bg-gray-100 border border-gray-300 border-l-0 rounded-r-md px-3 py-2 text-gray-500 hover:bg-gray-200 focus:outline-none focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Logo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Handphone</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($brands as $brand)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($brand->logo)
                                    <img src="{{ $brand->logo }}" alt="{{ $brand->name }}" class="h-10 w-auto object-contain">
                                @else
                                    <div class="h-10 w-10 bg-gray-200 rounded-md flex items-center justify-center">
                                        <i class="fas fa-mobile-alt text-gray-400"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                {{ $brand->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                {{ $brand->slug }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($brand->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Non-Aktif
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-gray-500">
                                {{ $brand->handphones_count }} unit
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.brand.show', $brand) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.brand.edit', $brand) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.brand.destroy', $brand) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Apakah Anda yakin ingin menghapus brand ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                <div class="flex flex-col items-center justify-center py-8">
                                    <i class="fas fa-box-open text-4xl text-gray-300 mb-3"></i>
                                    <p class="text-gray-500 font-medium">Tidak ada brand yang ditemukan</p>
                                    @if(request('search'))
                                        <p class="text-gray-400 mt-1">Coba dengan kata kunci yang berbeda</p>
                                        <a href="{{ route('admin.brand.index') }}" class="mt-3 text-indigo-600 hover:text-indigo-800">
                                            Tampilkan semua brand
                                        </a>
                                    @else
                                        <p class="text-gray-400 mt-1">Tambahkan brand baru untuk mulai</p>
                                        <a href="{{ route('admin.brand.create') }}" class="mt-3 inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                            <i class="fas fa-plus mr-2"></i> Tambah Brand
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($brands->hasPages())
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                {{ $brands->links() }}
            </div>
        @endif
    </div>
</x-admin-layout>

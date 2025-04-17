<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\brand\show.blade.php -->
<x-admin-layout header="Detail Brand">
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $brand->name }}</h1>
                <p class="text-gray-600 mt-1">Detail informasi brand</p>
            </div>
            <div class="flex space-x-2">
                <a href="{{ route('admin.brand.edit', $brand) }}" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors duration-300 flex items-center">
                    <i class="fas fa-edit mr-2"></i> Edit
                </a>
                <a href="{{ route('admin.brand.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors duration-300 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1">
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                <div class="p-6">
                    <div class="flex justify-center mb-6">
                        @if($brand->logo)
                            <img src="{{ $brand->logo }}" alt="{{ $brand->name }}" class="h-32 object-contain">
                        @else
                            <div class="h-32 w-32 bg-gray-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-copyright text-4xl text-gray-300"></i>
                            </div>
                        @endif
                    </div>

                    <div class="text-center">
                        <h2 class="text-xl font-bold text-gray-800">{{ $brand->name }}</h2>
                        <p class="text-gray-500 text-sm mt-1">{{ $brand->slug }}</p>

                        <div class="mt-4">
                            @if($brand->is_active)
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    <i class="fas fa-check-circle mr-1"></i> Aktif
                                </span>
                            @else
                                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                    <i class="fas fa-times-circle mr-1"></i> Non-Aktif
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="mt-6 border-t border-gray-100 pt-6">
                        <dl>
                            <div class="flex justify-between py-2">
                                <dt class="text-sm font-medium text-gray-500">Total Handphone</dt>
                                <dd class="text-sm font-bold text-gray-900">{{ $brand->handphones_count ?? 0 }} unit</dd>
                            </div>

                            <div class="flex justify-between py-2">
                                <dt class="text-sm font-medium text-gray-500">Dibuat Pada</dt>
                                <dd class="text-sm text-gray-900">{{ $brand->created_at->format('d M Y H:i') }}</dd>
                            </div>

                            <div class="flex justify-between py-2">
                                <dt class="text-sm font-medium text-gray-500">Terakhir Diupdate</dt>
                                <dd class="text-sm text-gray-900">{{ $brand->updated_at->format('d M Y H:i') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                    <form action="{{ route('admin.brand.destroy', $brand) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus brand ini?');" class="flex justify-center">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-red-600 text-sm leading-5 font-medium rounded-md text-red-600 bg-white hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <i class="fas fa-trash mr-2"></i> Hapus Brand
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200 mb-6">
                <div class="p-6">
                    <h2 class="text-lg font-medium text-gray-800 mb-4">Deskripsi</h2>
                    <div class="prose max-w-none">
                        @if($brand->description)
                            <p>{!! nl2br(e($brand->description)) !!}</p>
                        @else
                            <p class="text-gray-500 italic">Tidak ada deskripsi untuk brand ini.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-medium text-gray-800">Handphone dari {{ $brand->name }}</h2>
                        <a href="{{ route('admin.handphone.create', ['brand_id' => $brand->id]) }}" class="inline-flex items-center px-3 py-1.5 border border-indigo-600 text-sm leading-5 font-medium rounded-md text-indigo-600 bg-white hover:bg-indigo-50 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <i class="fas fa-plus mr-1"></i> Tambah Handphone
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                    <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                    <th scope="col" class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($brand->handphones as $handphone)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $handphone->name }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Rp {{ number_format($handphone->price, 0, ',', '.') }}</div>
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap">
                                            @if($handphone->price >= 8000000)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                                    Premium
                                                </span>
                                            @elseif($handphone->price >= 4000000)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    Mid-range
                                                </span>
                                            @elseif($handphone->price >= 2000000)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Entry-level
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Budget
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.handphone.show', $handphone) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.handphone.edit', $handphone) }}" class="text-indigo-600 hover:text-indigo-900">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                            <p class="mb-1">Belum ada handphone untuk brand ini</p>
                                            <a href="{{ route('admin.handphone.create', ['brand_id' => $brand->id]) }}" class="text-indigo-600 hover:text-indigo-900 text-sm">
                                                <i class="fas fa-plus mr-1"></i> Tambahkan handphone baru
                                            </a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

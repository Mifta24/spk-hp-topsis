<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\criteria\index.blade.php -->
<x-admin-layout header="Manajemen Kriteria">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h1 class="text-xl font-bold text-gray-800">Data Kriteria TOPSIS</h1>
                <p class="text-gray-600 mt-1">Kelola kriteria yang digunakan dalam perhitungan rekomendasi</p>
            </div>

            <div class="mt-4 md:mt-0">
                <a href="{{ route('admin.criteria.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm inline-flex items-center transition-colors">
                    <i class="fas fa-plus mr-2"></i> Tambah Kriteria
                </a>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Label</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($criterias as $criteria)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $criteria->name }}</div>
                                <div class="text-xs text-gray-500">ID: {{ $criteria->id }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $criteria->label }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($criteria->type == 'benefit')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Benefit
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        Cost
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-3">
                                    <a href="{{ route('admin.criteria.edit', ['criterion' => $criteria->id]) }}" class="text-indigo-600 hover:text-indigo-900 inline-flex items-center">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.criteria.destroy', ['criterion' => $criteria->id]) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 inline-flex items-center">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                Belum ada data kriteria.
                                <a href="{{ route('admin.criteria.create') }}" class="text-indigo-600 hover:text-indigo-900">Tambah kriteria baru</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-100">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-blue-800">Petunjuk Penggunaan</h3>
                    <div class="mt-2 text-sm text-blue-700">
                        <ul class="list-disc pl-5 space-y-1">
                            <li><strong>Nama</strong>: Harus sesuai dengan nama field pada database (contoh: camera, battery).</li>
                            <li><strong>Label</strong>: Nama yang akan ditampilkan ke pengguna (contoh: Kamera, Baterai).</li>
                            <li><strong>Tipe</strong>:
                                <ul class="list-disc pl-5 mt-1">
                                    <li><strong>Benefit</strong>: Nilai yang lebih tinggi lebih baik (contoh: Kamera, RAM).</li>
                                    <li><strong>Cost</strong>: Nilai yang lebih rendah lebih baik (contoh: Harga, Berat).</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

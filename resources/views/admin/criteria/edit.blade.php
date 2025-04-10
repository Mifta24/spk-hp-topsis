<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\criteria\edit.blade.php -->
<x-admin-layout header="Edit Kriteria">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Edit Kriteria</h1>
                    <p class="text-gray-600 mt-1">Perbarui informasi kriteria untuk sistem rekomendasi TOPSIS</p>
                </div>
                <div class="flex items-center space-x-2">
                    <span class="px-2 py-1 bg-indigo-100 text-indigo-800 text-xs rounded-full">
                        ID: {{ $criteria->id }}
                    </span>
                    <span class="px-2 py-1 {{ $criteria->type == 'benefit' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} text-xs rounded-full">
                        {{ $criteria->type == 'benefit' ? 'Benefit' : 'Cost' }}
                    </span>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.criteria.update', ['criterion' => $criteria->id]) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama <span class="text-red-500">*</span></label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="name" id="name" value="{{ old('name', $criteria->name) }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="camera">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">
                            Field DB
                        </span>
                    </div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Nama field harus sesuai dengan nama kolom pada tabel handphones.</p>
            </div>

            <div>
                <label for="label" class="block text-sm font-medium text-gray-700">Label <span class="text-red-500">*</span></label>
                <div class="mt-1">
                    <input type="text" name="label" id="label" value="{{ old('label', $criteria->label) }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Kamera">
                </div>
                <p class="mt-1 text-xs text-gray-500">Label yang akan ditampilkan kepada pengguna di form rekomendasi.</p>
            </div>

            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Tipe <span class="text-red-500">*</span></label>
                <div class="mt-1">
                    <div class="flex space-x-4">
                        <div class="flex items-center">
                            <input id="type-benefit" name="type" type="radio" value="benefit" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('type', $criteria->type) == 'benefit' ? 'checked' : '' }}>
                            <label for="type-benefit" class="ml-2 block text-sm font-medium text-gray-700">
                                Benefit (nilai tinggi lebih baik)
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="type-cost" name="type" type="radio" value="cost" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('type', $criteria->type) == 'cost' ? 'checked' : '' }}>
                            <label for="type-cost" class="ml-2 block text-sm font-medium text-gray-700">
                                Cost (nilai rendah lebih baik)
                            </label>
                        </div>
                    </div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Tentukan jenis kriteria untuk proses perhitungan TOPSIS.</p>
            </div>

            <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                <a href="{{ route('admin.criteria.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
                <div class="flex space-x-3">
                    <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <form action="{{ route('admin.criteria.destroy', ['criterion' => $criteria->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kriteria ini? Tindakan ini tidak dapat dibatalkan.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-red-300 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <i class="fas fa-trash mr-2"></i>
                    Hapus Kriteria
                </button>
            </form>
        </div>
    </div>
</x-admin-layout>

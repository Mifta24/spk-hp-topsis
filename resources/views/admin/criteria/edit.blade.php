<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\criteria\edit.blade.php -->
<x-admin-layout>
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <div class="flex justify-between items-start">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Edit Kriteria</h1>
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

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-md">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terdapat {{ $errors->count() }} kesalahan pada form:</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

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
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <div class="flex space-x-3">
                    <!-- Tombol "Simpan Perubahan" diletakkan dalam form dengan type="submit" -->
                    <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>

        <!-- Form hapus dikeluarkan dari form update -->
        <div class="mt-6 pt-6 border-t border-gray-200">
            <form action="{{ route('admin.criteria.destroy', ['criterion' => $criteria->id]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kriteria ini? Tindakan ini tidak dapat dibatalkan.');">
                @csrf
                @method('DELETE')
                <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-red-300 shadow-sm text-sm font-medium rounded-md text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Hapus Kriteria
                </button>
            </form>
        </div>
    </div>

    <div class="mt-6 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Handphone yang Terpengaruh</h2>
        <p class="text-sm text-gray-500 mb-4">
            Kriteria <strong>{{ $criteria->label }}</strong> akan memengaruhi peringkat handphone dalam perhitungan rekomendasi TOPSIS.
        </p>

        <div class="bg-yellow-50 p-4 rounded-md flex items-start space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mt-0.5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9a1 1 0 00-1-1z" clip-rule="evenodd" />
            </svg>
            <div>
                <h3 class="text-sm font-medium text-yellow-800">Peringatan Perubahan Kriteria</h3>
                <p class="mt-1 text-sm text-yellow-700">
                    Mengubah kriteria dapat memengaruhi hasil rekomendasi yang diberikan kepada pengguna. Pastikan perubahan sudah sesuai sebelum menyimpan.
                </p>
            </div>
        </div>
    </div>
</x-admin-layout>

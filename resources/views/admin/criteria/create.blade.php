<x-admin-layout>
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ isset($criteria) ? 'Edit' : 'Tambah' }} Kriteria</h1>
            <p class="text-gray-600 mt-1">{{ isset($criteria) ? 'Perbarui' : 'Buat' }} kriteria untuk sistem rekomendasi TOPSIS</p>
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

        <form method="POST" action="{{ isset($criteria) ? route('admin.criteria.update', $criteria) : route('admin.criteria.store') }}" class="space-y-6">
            @csrf
            @if (isset($criteria))
                @method('PUT')
            @endif

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama <span class="text-red-500">*</span></label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <input type="text" name="name" id="name" value="{{ old('name', $criteria->name ?? '') }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-3 pr-12 sm:text-sm border-gray-300 rounded-md" placeholder="camera">
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
                    <input type="text" name="label" id="label" value="{{ old('label', $criteria->label ?? '') }}" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Kamera">
                </div>
                <p class="mt-1 text-xs text-gray-500">Label yang akan ditampilkan kepada pengguna di form rekomendasi.</p>
            </div>

            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Tipe <span class="text-red-500">*</span></label>
                <div class="mt-1">
                    <div class="flex space-x-4">
                        <div class="flex items-center">
                            <input id="type-benefit" name="type" type="radio" value="benefit" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('type', $criteria->type ?? 'benefit') == 'benefit' ? 'checked' : '' }}>
                            <label for="type-benefit" class="ml-2 block text-sm font-medium text-gray-700">
                                Benefit
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="type-cost" name="type" type="radio" value="cost" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" {{ old('type', $criteria->type ?? '') == 'cost' ? 'checked' : '' }}>
                            <label for="type-cost" class="ml-2 block text-sm font-medium text-gray-700">
                                Cost
                            </label>
                        </div>
                    </div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Benefit: nilai tinggi lebih baik. Cost: nilai rendah lebih baik.</p>
            </div>

            <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                <a href="{{ route('admin.criteria.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <button type="submit" class="inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ isset($criteria) ? 'Perbarui' : 'Simpan' }} Kriteria
                </button>
            </div>
        </form>
    </div>

    <div class="mt-6 bg-white rounded-lg shadow-md p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Informasi Kriteria TOPSIS</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-green-50 rounded-lg p-4 border border-green-100">
                <h3 class="font-medium text-green-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    Kriteria Benefit
                </h3>
                <p class="mt-2 text-sm text-green-700">
                    Kriteria yang nilainya semakin tinggi semakin baik. Contoh: kamera, baterai, RAM, prosesor.
                </p>
                <div class="mt-3 bg-white rounded-md p-3">
                    <div class="text-xs text-gray-500 font-medium">Contoh:</div>
                    <ul class="mt-1 space-y-1 text-sm text-gray-700">
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Kamera: Skor 9/10 lebih baik daripada 7/10
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            RAM: 12GB lebih baik daripada 6GB
                        </li>
                    </ul>
                </div>
            </div>

            <div class="bg-red-50 rounded-lg p-4 border border-red-100">
                <h3 class="font-medium text-red-800 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    Kriteria Cost
                </h3>
                <p class="mt-2 text-sm text-red-700">
                    Kriteria yang nilainya semakin rendah semakin baik. Contoh: harga, berat, konsumsi baterai.
                </p>
                <div class="mt-3 bg-white rounded-md p-3">
                    <div class="text-xs text-gray-500 font-medium">Contoh:</div>
                    <ul class="mt-1 space-y-1 text-sm text-gray-700">
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Harga: Rp 3 juta lebih baik daripada Rp 8 juta
                        </li>
                        <li class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Berat: 170g lebih baik daripada 220g
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

<x-layout>
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
        <div class="flex items-center mb-6">
            <div class="rounded-full bg-indigo-100 p-3 mr-4">
                <i class="fas fa-search text-indigo-600 text-xl"></i>
            </div>
            <h2 class="text-xl font-bold">Rekomendasi Handphone</h2>
        </div>

        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium">Mohon perbaiki kesalahan berikut:</p>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
        

        <form action="{{ route('recommendation.result') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <h4 class="text-lg font-semibold mb-3">Rentang Harga</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Harga Minimum</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input type="number" name="min_price"
                                class="pl-10 border rounded w-full px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                                required value="{{ old('min_price') }}">
                        </div>
                    </div>

                    <div>
                        <label class="block mb-1 text-sm font-medium text-gray-700">Harga Maksimum</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input type="number" name="max_price"
                                class="pl-10 border rounded w-full px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                                required value="{{ old('max_price') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <h4 class="text-lg font-semibold mb-3">Bobot Kriteria</h4>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach ($criterias as $criteria)
                        <div
                            class="bg-gray-50 rounded p-4 border border-gray-200 hover:border-indigo-300 transition-colors duration-200">
                            <div class="flex items-center mb-3">
                                <div class="rounded-full bg-indigo-100 p-2 mr-3">
                                    <i class="fas fa-{{ getIconForCriteria($criteria->name) }} text-indigo-600"></i>
                                </div>
                                <label class="font-medium text-gray-700">{{ $criteria->label }}</label>
                            </div>
                            <select name="weights[{{ $criteria->name }}]"
                                class="border rounded w-full px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500"
                                required>
                                <option value="0.1" {{ old('weights.' . $criteria->name) == 0.1 ? 'selected' : '' }}>
                                    Tidak Penting</option>
                                <option value="0.2" {{ old('weights.' . $criteria->name) == 0.2 ? 'selected' : '' }}>
                                    Kurang Penting</option>
                                <option value="0.3"
                                    {{ old('weights.' . $criteria->name, 1 / count($criterias)) == 0.3 ? 'selected' : '' }}>
                                    Cukup Penting</option>
                                <option value="0.4" {{ old('weights.' . $criteria->name) == 0.4 ? 'selected' : '' }}>
                                    Penting</option>
                                <option value="0.5" {{ old('weights.' . $criteria->name) == 0.5 ? 'selected' : '' }}>
                                    Sangat Penting</option>
                            </select>
                            <p class="text-xs text-gray-500 mt-2">
                                @if ($criteria->type === 'benefit')
                                    <span class="text-green-600"><i class="fas fa-arrow-up mr-1"></i> Semakin tinggi
                                        semakin baik</span>
                                @else
                                    <span class="text-red-600"><i class="fas fa-arrow-down mr-1"></i> Semakin rendah
                                        semakin baik</span>
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>

                <div class="text-sm text-gray-500 mt-4">
                    <p><i class="fas fa-info-circle text-blue-500 mr-1"></i> Total bobot akan otomatis disesuaikan menjadi 1 saat proses perhitungan.</p>
                </div>
            </div>

            <div class="mt-8 flex justify-center">
                <button type="submit"
                    class="bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-medium py-3 px-6 rounded-lg shadow-md flex items-center transition duration-300">
                    <i class="fas fa-search mr-2"></i> Cari Rekomendasi
                </button>
            </div>
        </form>
    </div>
</x-layout>

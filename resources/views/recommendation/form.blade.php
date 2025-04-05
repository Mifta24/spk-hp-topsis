<x-layout>
    <h2 class="text-xl font-bold mb-4">Rekomendasi Handphone</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('recommendation.result') }}" method="POST" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block mb-1">Harga Minimum</label>
                <input type="number" name="min_price" class="border rounded w-full px-3 py-2" required value="{{ old('min_price') }}">
            </div>

            <div>
                <label class="block mb-1">Harga Maksimum</label>
                <input type="number" name="max_price" class="border rounded w-full px-3 py-2" required value="{{ old('max_price') }}">
            </div>
        </div>

        <div class="mt-6">
            <h4 class="font-bold mb-3">Bobot Kriteria (Total harus = 1)</h4>
            <p class="text-sm text-gray-600 mb-3">Nilai lebih tinggi menunjukkan kriteria lebih penting</p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($criterias as $criteria)
                    <div>
                        <label class="block mb-1">{{ $criteria->label }}</label>
                        <input type="number" name="weights[{{ $criteria->name }}]" step="0.01" min="0" max="1"
                            class="border rounded w-full px-3 py-2" required
                            value="{{ old('weights.'.$criteria->name, 1/count($criterias)) }}">
                        <p class="text-xs text-gray-500 mt-1">{{ $criteria->type === 'benefit' ? 'Semakin tinggi semakin baik' : 'Semakin rendah semakin baik' }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Cari Rekomendasi
            </button>
        </div>
    </form>
</x-layout>

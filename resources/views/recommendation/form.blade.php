<form action="{{ route('recommendation.result') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label>Harga Minimum</label>
        <input type="number" name="min_price" class="border rounded w-full" required>
    </div>

    <div>
        <label>Harga Maksimum</label>
        <input type="number" name="max_price" class="border rounded w-full" required>
    </div>

    <h4 class="font-bold mt-4">Bobot Kriteria</h4>

    @foreach ($criterias as $criteria)
        <div>
            <label>{{ $criteria->label }}</label>
            <input type="number" name="weights[{{ $criteria->name }}]" step="0.01" min="0" max="1" class="border rounded w-full" required>
        </div>
    @endforeach

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Cari Rekomendasi</button>
</form>

<x-layout>
    <h1 class="text-xl font-bold mb-4">{{ isset($criteria) ? 'Edit' : 'Tambah' }} Kriteria</h1>

    <form method="POST" action="{{ isset($criteria) ? route('criteria.update', $criteria) : route('criteria.store') }}">
        @csrf
        @if(isset($criteria)) @method('PUT') @endif

        <div class="mb-2">
            <label>Nama (untuk field DB)</label>
            <input type="text" name="name" value="{{ old('name', $criteria->name ?? '') }}" class="border rounded w-full">
        </div>

        <div class="mb-2">
            <label>Label (yang ditampilkan)</label>
            <input type="text" name="label" value="{{ old('label', $criteria->label ?? '') }}" class="border rounded w-full">
        </div>

        <div class="mb-4">
            <label>Tipe</label>
            <select name="type" class="border rounded w-full">
                <option value="benefit" @selected(old('type', $criteria->type ?? '') == 'benefit')>Benefit</option>
                <option value="cost" @selected(old('type', $criteria->type ?? '') == 'cost')>Cost</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</x-layout>

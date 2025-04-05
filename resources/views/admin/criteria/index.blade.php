<x-layout>
    <h1 class="text-xl font-bold mb-4">Daftar Kriteria</h1>

    <a href="{{ route('criteria.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Kriteria</a>

    <table class="w-full table-auto border">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-2 py-1">Nama</th>
                <th class="px-2 py-1">Label</th>
                <th class="px-2 py-1">Tipe</th>
                <th class="px-2 py-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($criterias as $criteria)
                <tr>
                    <td class="border px-2 py-1">{{ $criteria->name }}</td>
                    <td class="border px-2 py-1">{{ $criteria->label }}</td>
                    <td class="border px-2 py-1">{{ $criteria->type }}</td>
                    <td class="border px-2 py-1 space-x-2">
                        <a href="{{ route('criteria.edit', $criteria) }}" class="text-blue-600">Edit</a>
                        <form action="{{ route('criteria.destroy', $criteria) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Hapus kriteria ini?')" class="text-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>

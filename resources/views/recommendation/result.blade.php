<x-layout>
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Hasil Rekomendasi Handphone</h2>
        <a href="{{ route('recommendation') }}" class="bg-gray-200 hover:bg-gray-300 px-3 py-1 rounded text-sm">
            Kembali
        </a>
    </div>

    @if(count($result) > 0)
        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-4">
            <p class="text-sm">Menampilkan {{ count($result) }} handphone yang diurutkan berdasarkan skor tertinggi.</p>
        </div>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Harga</th>
                        <th class="border px-4 py-2">Kamera</th>
                        <th class="border px-4 py-2">Baterai</th>
                        <th class="border px-4 py-2">RAM</th>
                        <th class="border px-4 py-2">Skor TOPSIS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($result as $index => $hp)
                        <tr class="{{ $index === 0 ? 'bg-green-50' : '' }}">
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2 font-medium">{{ $hp['name'] }}</td>
                            <td class="border px-4 py-2">Rp{{ number_format($hp['price'], 0, ',', '.') }}</td>
                            <td class="border px-4 py-2">{{ App\Models\Handphone::find($hp['id'])->camera }} / 10</td>
                            <td class="border px-4 py-2">{{ App\Models\Handphone::find($hp['id'])->battery }} / 10</td>
                            <td class="border px-4 py-2">{{ App\Models\Handphone::find($hp['id'])->ram }} / 10</td>
                            <td class="border px-4 py-2 {{ $index === 0 ? 'font-bold' : '' }}">
                                {{ number_format($hp['score'], 4) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            <h3 class="text-lg font-semibold mb-3">Detail Perhitungan TOPSIS</h3>
            <div class="bg-gray-50 p-4 rounded border">
                <p class="mb-3">
                    <strong>Bobot yang digunakan:</strong><br>
                    @foreach($weights as $name => $weight)
                        {{ ucfirst($name) }}: {{ $weight }}<br>
                    @endforeach
                </p>

                <details>
                    <summary class="cursor-pointer text-blue-500 hover:text-blue-700">Lihat Detail Perhitungan</summary>
                    <div class="mt-3">
                        <table class="table-auto w-full border text-sm">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-2 py-1">Handphone</th>
                                    <th class="border px-2 py-1">D+</th>
                                    <th class="border px-2 py-1">D-</th>
                                    <th class="border px-2 py-1">Skor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $hp)
                                    <tr>
                                        <td class="border px-2 py-1">{{ $hp['name'] }}</td>
                                        <td class="border px-2 py-1">{{ number_format($hp['d_plus'], 6) }}</td>
                                        <td class="border px-2 py-1">{{ number_format($hp['d_min'], 6) }}</td>
                                        <td class="border px-2 py-1">{{ number_format($hp['score'], 6) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </details>
            </div>
        </div>
    @else
        <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4">
            <p>Tidak ada handphone yang sesuai dengan kriteria Anda.</p>
        </div>
    @endif
</x-layout>

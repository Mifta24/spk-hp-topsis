<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPK Result</title>
</head>

<body>
    <h2 class="text-2xl font-bold mb-4">Hasil Rekomendasi</h2>

    @if ($result->isEmpty())
    <p>Tidak ada handphone yang sesuai.</p>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($result as $hp)
        <div class="border rounded-lg p-4 shadow">
            <h3 class="font-bold text-lg">{{ $hp->name }}</h3>
            <p>Harga: Rp{{ number_format($hp->price, 0, ',', '.') }}</p>
            <p>Kamera: {{ $hp->camera }}</p>
            <p>RAM: {{ $hp->ram }}</p>
            <p>Baterai: {{ $hp->battery }}</p>
            <p class="mt-2 text-sm text-green-600">Skor: {{ number_format($hp->score, 4) }}</p>
        </div>
        @endforeach
    </div>
    @endif

</body>

</html>

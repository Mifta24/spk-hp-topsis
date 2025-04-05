<x-layout>
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Hasil Rekomendasi Handphone</h2>
                <p class="text-gray-600 mt-1">Berdasarkan preferensi kriteria yang Anda pilih</p>
            </div>
            <a href="{{ route('recommendation') }}" class="mt-3 md:mt-0 inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-md transition-colors">
                <i class="fas fa-chevron-left mr-2"></i> Ubah Kriteria
            </a>
        </div>

        @if (count($result) > 0)
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded-r">
                <div class="flex items-center">
                    <div class="text-blue-500 mr-3">
                        <i class="fas fa-info-circle text-xl"></i>
                    </div>
                    <div>
                        <p class="font-medium">Ditemukan {{ count($result) }} rekomendasi handphone terbaik</p>
                        <p class="text-sm text-gray-700 mt-1">Diurutkan berdasarkan skor TOPSIS tertinggi sesuai kriteria Anda</p>
                    </div>
                </div>
            </div>

            <!-- Best Match -->
            @if(isset($result[0]))
            <div class="bg-gradient-to-r from-green-50 to-blue-50 p-4 border border-green-100 rounded-lg mb-6">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="flex-shrink-0 mb-4 md:mb-0 md:mr-6">
                        @php
                            $topPhone = App\Models\Handphone::with('specification')->find($result[0]['id']);
                            $image = $topPhone && $topPhone->specification ? $topPhone->specification->image : null;
                        @endphp

                        <div class="w-32 h-32 mx-auto bg-white rounded-lg shadow-sm p-2 flex items-center justify-center">
                            @if($image)
                                <img src="{{ $image }}" alt="{{ $result[0]['name'] }}" class="max-w-full max-h-full object-contain">
                            @else
                                <span class="text-gray-400"><i class="fas fa-mobile-alt text-5xl"></i></span>
                            @endif
                        </div>
                    </div>

                    <div class="text-center md:text-left flex-grow">
                        <div class="flex flex-col md:flex-row md:items-center mb-2">
                            <h3 class="text-xl font-bold text-gray-800">{{ $result[0]['name'] }}</h3>
                            <span class="md:ml-3 mt-1 md:mt-0 inline-block bg-green-500 text-white text-xs px-2 py-1 rounded-full">Rekomendasi Terbaik</span>
                        </div>
                        <p class="text-gray-700 mb-2">Rp{{ number_format($result[0]['price'], 0, ',', '.') }}</p>

                        <div class="flex flex-wrap justify-center md:justify-start gap-2 my-3">
                            @php
                                $topPhoneModel = App\Models\Handphone::find($result[0]['id']);
                            @endphp
                            <span class="inline-flex items-center bg-green-50 text-green-700 text-xs px-2 py-1 rounded-full">
                                <i class="fas fa-camera mr-1"></i> Kamera: {{ $topPhoneModel->camera }}/10
                            </span>
                            <span class="inline-flex items-center bg-yellow-50 text-yellow-700 text-xs px-2 py-1 rounded-full">
                                <i class="fas fa-battery-full mr-1"></i> Baterai: {{ $topPhoneModel->battery }}/10
                            </span>
                            <span class="inline-flex items-center bg-blue-50 text-blue-700 text-xs px-2 py-1 rounded-full">
                                <i class="fas fa-memory mr-1"></i> RAM: {{ $topPhoneModel->ram }}/10
                            </span>
                        </div>

                        <div class="flex items-center justify-center md:justify-start mt-2">
                            <div class="relative w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                                <svg class="w-16 h-16" viewBox="0 0 36 36">
                                    <path class="stroke-current text-blue-500"
                                        stroke-dasharray="{{ $result[0]['score'] * 100 }}, 100"
                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                        fill="none" stroke-width="2" stroke-linecap="round"></path>
                                </svg>
                                <span class="absolute text-blue-800 font-bold text-sm">{{ number_format($result[0]['score'] * 100, 0) }}%</span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-800">Skor TOPSIS</p>
                                <p class="text-xs text-gray-600">Tingkat kesesuaian</p>
                            </div>
                        </div>

                        <div class="mt-4">
                            <a href="{{ route('handphone.detail', $result[0]['id']) }}" class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md text-sm transition-colors">
                                <i class="fas fa-info-circle mr-2"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Other Recommendations -->
            <h3 class="font-semibold text-lg mb-3 text-gray-800">Rekomendasi Lainnya</h3>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-8">
                @foreach ($result as $index => $hp)
                    @if($index > 0 && $index < 5) <!-- Only show next 4 recommendations -->
                        @php
                            $phoneModel = App\Models\Handphone::with('specification')->find($hp['id']);
                            $phoneImage = $phoneModel && $phoneModel->specification ? $phoneModel->specification->image : null;
                        @endphp
                        <div class="border rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow bg-white">
                            <div class="flex p-4">
                                <div class="flex-shrink-0 w-20 h-20 bg-gray-50 rounded flex items-center justify-center mr-4">
                                    @if($phoneImage)
                                        <img src="{{ $phoneImage }}" alt="{{ $hp['name'] }}" class="max-w-full max-h-full object-contain">
                                    @else
                                        <span class="text-gray-400"><i class="fas fa-mobile-alt text-3xl"></i></span>
                                    @endif
                                </div>

                                <div class="flex-grow">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h4 class="font-medium text-gray-800">{{ $hp['name'] }}</h4>
                                            <p class="text-gray-600 text-sm">Rp{{ number_format($hp['price'], 0, ',', '.') }}</p>
                                        </div>

                                        <div class="relative w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-12 h-12" viewBox="0 0 36 36">
                                                <path class="stroke-current text-blue-400"
                                                    stroke-dasharray="{{ $hp['score'] * 100 }}, 100"
                                                    d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                                    fill="none" stroke-width="2" stroke-linecap="round"></path>
                                            </svg>
                                            <span class="absolute text-blue-700 font-medium text-xs">{{ number_format($hp['score'] * 100, 0) }}%</span>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap gap-1 mt-2">
                                        @php
                                            $phone = App\Models\Handphone::find($hp['id']);
                                        @endphp
                                        <span class="inline-flex items-center text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-700">
                                            <i class="fas fa-camera mr-1 text-green-600"></i> {{ $phone->camera }}
                                        </span>
                                        <span class="inline-flex items-center text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-700">
                                            <i class="fas fa-battery-full mr-1 text-yellow-600"></i> {{ $phone->battery }}
                                        </span>
                                        <span class="inline-flex items-center text-xs px-2 py-0.5 rounded-full bg-gray-100 text-gray-700">
                                            <i class="fas fa-memory mr-1 text-blue-600"></i> {{ $phone->ram }}
                                        </span>
                                    </div>

                                    <div class="mt-3">
                                        <a href="{{ route('handphone.detail', $hp['id']) }}" class="text-sm text-blue-600 hover:text-blue-800 inline-flex items-center">
                                            Detail <i class="fas fa-chevron-right ml-1 text-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Complete Results Table -->
            <div class="mt-6 mb-4">
                <h3 class="font-semibold text-lg mb-3 flex items-center text-gray-800">
                    <i class="fas fa-table mr-2 text-gray-600"></i> Semua Hasil
                </h3>

                <div class="overflow-x-auto bg-white rounded-lg border shadow-sm">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Handphone</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Harga</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kamera</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Baterai</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">RAM</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor</th>
                                <th scope="col" class="px-3 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($result as $index => $hp)
                                <tr class="{{ $index === 0 ? 'bg-green-50' : ($index % 2 == 0 ? 'bg-gray-50' : '') }}">
                                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">{{ $index + 1 }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @php
                                                $phoneModel = App\Models\Handphone::with('specification')->find($hp['id']);
                                                $phoneImage = $phoneModel && $phoneModel->specification ? $phoneModel->specification->image : null;
                                            @endphp

                                            <div class="flex-shrink-0 h-8 w-8 bg-gray-100 rounded-full overflow-hidden flex items-center justify-center mr-2">
                                                @if($phoneImage)
                                                    <img src="{{ $phoneImage }}" alt="{{ $hp['name'] }}" class="w-auto h-auto max-w-full max-h-full object-contain">
                                                @else
                                                    <i class="fas fa-mobile-alt text-gray-400 text-xs"></i>
                                                @endif
                                            </div>
                                            <div class="text-sm font-medium text-gray-900">{{ $hp['name'] }}</div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-sm text-gray-500">Rp{{ number_format($hp['price'], 0, ',', '.') }}</td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        @php
                                            $phone = App\Models\Handphone::find($hp['id']);
                                            $cameraScore = $phone->camera;
                                            $cameraColor = $cameraScore >= 8 ? 'green' : ($cameraScore >= 6 ? 'yellow' : 'red');
                                        @endphp
                                        <div class="flex items-center">
                                            <div class="relative w-8 h-8 rounded-full bg-{{ $cameraColor }}-100 flex items-center justify-center mr-2">
                                                <svg class="w-8 h-8" viewBox="0 0 36 36">
                                                    <path class="stroke-current text-{{ $cameraColor }}-500"
                                                        stroke-dasharray="{{ $cameraScore * 10 }}, 100"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                                        fill="none" stroke-width="3" stroke-linecap="round"></path>
                                                </svg>
                                                <span class="absolute text-{{ $cameraColor }}-700 text-xs font-medium">{{ $cameraScore }}</span>
                                            </div>
                                            <span class="text-xs text-gray-500">/10</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        @php
                                            $batteryScore = $phone->battery;
                                            $batteryColor = $batteryScore >= 8 ? 'green' : ($batteryScore >= 6 ? 'yellow' : 'red');
                                        @endphp
                                        <div class="flex items-center">
                                            <div class="relative w-8 h-8 rounded-full bg-{{ $batteryColor }}-100 flex items-center justify-center mr-2">
                                                <svg class="w-8 h-8" viewBox="0 0 36 36">
                                                    <path class="stroke-current text-{{ $batteryColor }}-500"
                                                        stroke-dasharray="{{ $batteryScore * 10 }}, 100"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                                        fill="none" stroke-width="3" stroke-linecap="round"></path>
                                                </svg>
                                                <span class="absolute text-{{ $batteryColor }}-700 text-xs font-medium">{{ $batteryScore }}</span>
                                            </div>
                                            <span class="text-xs text-gray-500">/10</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        @php
                                            $ramScore = $phone->ram;
                                            $ramColor = $ramScore >= 8 ? 'green' : ($ramScore >= 6 ? 'yellow' : 'red');
                                        @endphp
                                        <div class="flex items-center">
                                            <div class="relative w-8 h-8 rounded-full bg-{{ $ramColor }}-100 flex items-center justify-center mr-2">
                                                <svg class="w-8 h-8" viewBox="0 0 36 36">
                                                    <path class="stroke-current text-{{ $ramColor }}-500"
                                                        stroke-dasharray="{{ $ramScore * 10 }}, 100"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                                        fill="none" stroke-width="3" stroke-linecap="round"></path>
                                                </svg>
                                                <span class="absolute text-{{ $ramColor }}-700 text-xs font-medium">{{ $ramScore }}</span>
                                            </div>
                                            <span class="text-xs text-gray-500">/10</span>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="relative w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-2">
                                                <svg class="w-10 h-10" viewBox="0 0 36 36">
                                                    <path class="stroke-current text-blue-500"
                                                        stroke-dasharray="{{ $hp['score'] * 100 }}, 100"
                                                        d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831"
                                                        fill="none" stroke-width="2.5" stroke-linecap="round"></path>
                                                </svg>
                                                <span class="absolute text-blue-800 text-xs font-bold">{{ number_format($hp['score'] * 100, 0) }}%</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-3 py-2 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('handphone.detail', $hp['id']) }}" class="text-blue-600 hover:text-blue-900">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Detail Calculation Section -->
            <div class="mt-8">
                <div class="bg-white rounded-lg border p-5 shadow-sm">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Detail Perhitungan TOPSIS</h3>

                    <div class="p-4 rounded bg-gray-50 mb-5">
                        <h4 class="font-medium mb-2 text-gray-700">Bobot Kriteria yang Digunakan</h4>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                            @foreach ($weightLabels as $name => $info)
                                <div class="bg-white rounded-lg border p-3">
                                    <div class="text-sm text-gray-600 mb-1">{{ $name }}</div>
                                    <div class="flex justify-between items-center">
                                        <span class="font-medium text-gray-800">{{ $info['original'] }}</span>
                                        <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">Normalisasi: {{ number_format($info['value'], 3) }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <details>
                        <summary class="cursor-pointer text-blue-600 hover:text-blue-800 font-medium py-2 flex items-center">
                            <i class="fas fa-calculator mr-2"></i> Lihat Detail Perhitungan TOPSIS
                        </summary>
                        <div class="mt-4 bg-gray-50 p-4 rounded border">
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200 text-sm">
                                    <thead class="bg-gray-100">
                                        <tr>
                                            <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Handphone</th>
                                            <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">D+</th>
                                            <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">D-</th>
                                            <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Skor</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($result as $hp)
                                            <tr>
                                                <td class="px-3 py-2 whitespace-nowrap">{{ $hp['name'] }}</td>
                                                <td class="px-3 py-2 whitespace-nowrap">{{ number_format($hp['d_plus'], 6) }}</td>
                                                <td class="px-3 py-2 whitespace-nowrap">{{ number_format($hp['d_min'], 6) }}</td>
                                                <td class="px-3 py-2 whitespace-nowrap font-medium">{{ number_format($hp['score'], 6) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-4 text-sm text-gray-600">
                                <p class="mb-2"><strong>Keterangan:</strong></p>
                                <ul class="list-disc list-inside space-y-1 ml-2">
                                    <li>D+ adalah jarak ke solusi ideal positif</li>
                                    <li>D- adalah jarak ke solusi ideal negatif</li>
                                    <li>Skor TOPSIS dihitung dengan rumus: D- / (D+ + D-)</li>
                                    <li>Semakin tinggi skor, semakin dekat dengan preferensi Anda</li>
                                </ul>
                            </div>
                        </div>
                    </details>
                </div>
            </div>
        @else
            <div class="flex items-center bg-yellow-50 border-l-4 border-yellow-400 p-5 rounded-r">
                <div class="text-yellow-400 mr-4">
                    <i class="fas fa-exclamation-circle text-2xl"></i>
                </div>
                <div>
                    <h3 class="font-medium">Tidak ada hasil yang ditemukan</h3>
                    <p class="text-gray-600 mt-1">Tidak ada handphone yang sesuai dengan kriteria Anda. Coba ubah preferensi Anda.</p>
                </div>
            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('recommendation') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition-colors">
                    <i class="fas fa-redo mr-2"></i> Coba Kembali
                </a>
            </div>
        @endif
    </div>
</x-layout>

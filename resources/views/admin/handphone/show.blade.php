<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\handphone\show.blade.php -->
<x-admin-layout header="Detail Handphone">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">{{ $handphone->name }}</h2>
            <p class="text-gray-600 text-sm mt-1">Brand: {{ $handphone->brand->name }}</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.handphone.edit', $handphone->id) }}"
                class="text-indigo-600 hover:text-indigo-900 px-4 py-2 rounded-md shadow-sm inline-flex items-center">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <form action="{{ route('admin.handphone.destroy', $handphone->id) }}" method="POST"
                onsubmit="return confirm('Apakah Anda yakin ingin menghapus handphone ini?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="text-red-600 hover:text-red-900 px-4 py-2 rounded-md shadow-sm inline-flex items-center">
                    <i class="fas fa-trash mr-2"></i> Hapus
                </button>
            </form>
            <a href="{{ route('admin.handphone.index') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md shadow-sm inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>

    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
            <!-- Image Section -->
            <div class="md:col-span-1 bg-gray-50 p-6 flex items-center justify-center">
                <div class="w-72 h-72 flex items-center justify-center bg-white rounded-lg shadow-sm p-4">
                    @if ($handphone->specification && $handphone->specification->image)
                        <img src="{{ $handphone->specification->image }}" alt="{{ $handphone->name }}"
                            class="max-w-full max-h-full object-contain">
                    @else
                        <div class="text-gray-400 flex flex-col items-center justify-center">
                            <i class="fas fa-mobile-alt text-6xl"></i>
                            <p class="mt-2 text-xs">Tidak ada gambar</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Main Info -->
            <div class="md:col-span-2 p-6">
                <div class="flex flex-wrap items-center gap-3 mb-3">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $handphone->name }}</h3>
                    <span
                        class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                        {{ $handphone->category == 'Premium'
                            ? 'bg-purple-100 text-purple-800'
                            : ($handphone->category == 'Mid-range'
                                ? 'bg-blue-100 text-blue-800'
                                : ($handphone->category == 'Entry-level'
                                    ? 'bg-green-100 text-green-800'
                                    : 'bg-gray-100 text-gray-800')) }}">
                        {{ $handphone->category }}
                    </span>
                </div>

                <div class="mt-4">
                    <p class="text-2xl font-bold text-gray-800">Rp{{ number_format($handphone->price, 0, ',', '.') }}
                    </p>
                </div>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 uppercase">Rating</h4>
                        <div class="mt-3 space-y-3">
                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Kamera</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->camera }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full"
                                        style="width: {{ $handphone->camera * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Baterai</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->battery }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-yellow-500 h-2 rounded-full"
                                        style="width: {{ $handphone->battery * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">RAM</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->ram }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full"
                                        style="width: {{ $handphone->ram * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Prosesor</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->prosessor }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-red-500 h-2 rounded-full"
                                        style="width: {{ $handphone->prosessor * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Desain</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->design }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-500 h-2 rounded-full"
                                        style="width: {{ $handphone->design * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Penyimpanan</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->storage }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-indigo-500 h-2 rounded-full"
                                        style="width: {{ $handphone->storage * 10 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500 uppercase">Spesifikasi</h4>
                        <div class="mt-3 space-y-2">
                            @if ($handphone->specification)
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Prosesor</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->processor_name }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Kamera</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->camera_detail }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Baterai</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->battery_capacity }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">RAM</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->ram_size }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Storage</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->storage_size }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Layar</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->screen_size }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">OS</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->os_version }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Jaringan</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->network }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">SIM</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->sim }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Berat</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->weight }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Dimensi</span>
                                    <span
                                        class="text-gray-800 font-medium">{{ $handphone->specification->dimensions }}</span>
                                </div>
                            @else
                                <p class="text-gray-500 text-sm">Data spesifikasi tidak tersedia</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Colors and Features -->
                @if ($handphone->specification)
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Colors -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 uppercase mb-3">Warna yang tersedia</h4>
                            @php
                                $colors =
                                    $handphone->specification && $handphone->specification->colors
                                        ? (is_string($handphone->specification->colors)
                                            ? json_decode($handphone->specification->colors)
                                            : $handphone->specification->colors)
                                        : [];
                                if (!is_array($colors)) {
                                    $colors = [$colors];
                                }
                            @endphp

                            @if (count($colors) > 0)
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($colors as $color)
                                        <span
                                            class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-indigo-100 text-indigo-800">
                                            {{ $color }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 text-sm">Tidak ada informasi warna</p>
                            @endif
                        </div>

                        <!-- Features -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 uppercase mb-3">Fitur Utama</h4>
                            @php
                                $features =
                                    $handphone->specification && $handphone->specification->features
                                        ? (is_string($handphone->specification->features)
                                            ? json_decode($handphone->specification->features)
                                            : $handphone->specification->features)
                                        : [];
                                if (!is_array($features)) {
                                    $features = [$features];
                                }
                            @endphp

                            @if (count($features) > 0)
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($features as $feature)
                                        <span
                                            class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                                            {{ $feature }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 text-sm">Tidak ada informasi fitur</p>
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <h4 class="text-sm font-medium text-gray-500 uppercase mb-3">Deskripsi</h4>
                        <div class="text-gray-700 text-sm p-3 bg-gray-50 rounded-md">
                            {{ $handphone->specification->description ?? 'Tidak ada deskripsi' }}
                        </div>
                    </div>
                @endif

                <!-- Timestamps -->
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <div class="flex flex-wrap gap-4 text-xs text-gray-500">
                        <div>Dibuat: {{ $handphone->created_at->format('d M Y, H:i') }}</div>
                        <div>Diperbarui: {{ $handphone->updated_at->format('d M Y, H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- TOPSIS Preview Section -->
    <div class="mt-6 bg-white rounded-lg shadow-sm p-6">
        <h3 class="font-semibold text-lg mb-3 text-gray-800">
            <i class="fas fa-calculator mr-2 text-indigo-600"></i> Preview TOPSIS
        </h3>
        <p class="text-sm text-gray-600 mb-4">
            Dalam perhitungan TOPSIS, handphone ini memiliki peringkat sebagai berikut untuk berbagai kriteria:
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-4">
            <div class="bg-gray-50 border rounded-lg p-3">
                <div class="text-xs text-gray-500 mb-1">Kamera</div>
                <div class="flex items-center">
                    <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div class="bg-green-500 h-2" style="width: {{ ($handphone->camera / 10) * 100 }}%"></div>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $handphone->camera }}/10</span>
                </div>
            </div>

            <div class="bg-gray-50 border rounded-lg p-3">
                <div class="text-xs text-gray-500 mb-1">Baterai</div>
                <div class="flex items-center">
                    <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div class="bg-yellow-500 h-2" style="width: {{ ($handphone->battery / 10) * 100 }}%"></div>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $handphone->battery }}/10</span>
                </div>
            </div>

            <div class="bg-gray-50 border rounded-lg p-3">
                <div class="text-xs text-gray-500 mb-1">RAM</div>
                <div class="flex items-center">
                    <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div class="bg-blue-500 h-2" style="width: {{ ($handphone->ram / 10) * 100 }}%"></div>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $handphone->ram }}/10</span>
                </div>
            </div>

            <div class="bg-gray-50 border rounded-lg p-3">
                <div class="text-xs text-gray-500 mb-1">Prosesor</div>
                <div class="flex items-center">
                    <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div class="bg-red-500 h-2" style="width: {{ ($handphone->prosessor / 10) * 100 }}%"></div>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $handphone->prosessor }}/10</span>
                </div>
            </div>

            <div class="bg-gray-50 border rounded-lg p-3">
                <div class="text-xs text-gray-500 mb-1">Desain</div>
                <div class="flex items-center">
                    <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div class="bg-purple-500 h-2" style="width: {{ ($handphone->design / 10) * 100 }}%"></div>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $handphone->design }}/10</span>
                </div>
            </div>

            <div class="bg-gray-50 border rounded-lg p-3">
                <div class="text-xs text-gray-500 mb-1">Penyimpanan</div>
                <div class="flex items-center">
                    <div class="h-2 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div class="bg-indigo-500 h-2" style="width: {{ ($handphone->storage / 10) * 100 }}%"></div>
                    </div>
                    <span class="ml-2 text-sm font-medium text-gray-700">{{ $handphone->storage }}/10</span>
                </div>
            </div>
        </div>

        <div class="mt-4 bg-gray-50 p-3 border rounded-lg">
            <p class="text-sm text-gray-600">
                <i class="fas fa-lightbulb text-yellow-500 mr-1"></i>
                Rating tertinggi:
                <strong>{{ max([$handphone->camera, $handphone->battery, $handphone->ram, $handphone->prosessor, $handphone->design, $handphone->storage]) }}/10</strong>
                untuk kriteria
                <strong>{{ array_search(
                    max([
                        $handphone->camera,
                        $handphone->battery,
                        $handphone->ram,
                        $handphone->prosessor,
                        $handphone->design,
                        $handphone->storage,
                    ]),
                    [
                        'camera' => $handphone->camera,
                        'battery' => $handphone->battery,
                        'ram' => $handphone->ram,
                        'prosessor' => $handphone->prosessor,
                        'design' => $handphone->design,
                        'storage' => $handphone->storage,
                    ],
                ) == 'camera'
                    ? 'Kamera'
                    : (array_search(
                        max([
                            $handphone->camera,
                            $handphone->battery,
                            $handphone->ram,
                            $handphone->prosessor,
                            $handphone->design,
                            $handphone->storage,
                        ]),
                        [
                            'camera' => $handphone->camera,
                            'battery' => $handphone->battery,
                            'ram' => $handphone->ram,
                            'prosessor' => $handphone->prosessor,
                            'design' => $handphone->design,
                            'storage' => $handphone->storage,
                        ],
                    ) == 'battery'
                        ? 'Baterai'
                        : (array_search(
                            max([
                                $handphone->camera,
                                $handphone->battery,
                                $handphone->ram,
                                $handphone->prosessor,
                                $handphone->design,
                                $handphone->storage,
                            ]),
                            [
                                'camera' => $handphone->camera,
                                'battery' => $handphone->battery,
                                'ram' => $handphone->ram,
                                'prosessor' => $handphone->prosessor,
                                'design' => $handphone->design,
                                'storage' => $handphone->storage,
                            ],
                        ) == 'ram'
                            ? 'RAM'
                            : (array_search(
                                max([
                                    $handphone->camera,
                                    $handphone->battery,
                                    $handphone->ram,
                                    $handphone->prosessor,
                                    $handphone->design,
                                    $handphone->storage,
                                ]),
                                [
                                    'camera' => $handphone->camera,
                                    'battery' => $handphone->battery,
                                    'ram' => $handphone->ram,
                                    'prosessor' => $handphone->prosessor,
                                    'design' => $handphone->design,
                                    'storage' => $handphone->storage,
                                ],
                            ) == 'prosessor'
                                ? 'Prosesor'
                                : (array_search(
                                    max([
                                        $handphone->camera,
                                        $handphone->battery,
                                        $handphone->ram,
                                        $handphone->prosessor,
                                        $handphone->design,
                                        $handphone->storage,
                                    ]),
                                    [
                                        'camera' => $handphone->camera,
                                        'battery' => $handphone->battery,
                                        'ram' => $handphone->ram,
                                        'prosessor' => $handphone->prosessor,
                                        'design' => $handphone->design,
                                        'storage' => $handphone->storage,
                                    ],
                                ) == 'design'
                                    ? 'Desain'
                                    : 'Penyimpanan')))) }}</strong>
            </p>
        </div>
    </div>
</x-admin-layout>

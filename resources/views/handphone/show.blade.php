<x-layout>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="p-1 bg-gradient-to-r from-blue-600 to-indigo-700"></div>

        <!-- Back Button -->
        <div class="px-6 pt-6">
            <a href="{{ url()->previous() }}" class="inline-flex items-center text-gray-600 hover:text-indigo-600 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>

        <!-- Phone Details -->
        <div class="p-6">
            <div class="md:flex">
                <!-- Phone Image -->
                <div class="md:w-1/3 mb-6 md:mb-0 md:pr-6">
                    <div class="bg-gray-100 rounded-lg p-4 flex items-center justify-center h-full">
                        <img src="{{ $handphone->specification->image ?? 'https://via.placeholder.com/300x300?text='.$handphone->name }}"
                            alt="{{ $handphone->name }}"
                            class="max-w-full max-h-64 object-contain">
                    </div>
                </div>

                <!-- Phone Info -->
                <div class="md:w-2/3">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $handphone->name }}</h1>

                    <div class="flex items-center mb-4">
                        <div class="bg-indigo-100 text-indigo-800 py-1 px-3 rounded-full text-sm font-medium">
                            {{ $handphone->category }}
                        </div>

                        <div class="mx-2 text-gray-300">|</div>

                        <div class="text-xl font-bold text-gray-800">
                            Rp{{ number_format($handphone->price, 0, ',', '.') }}
                        </div>
                    </div>

                    @if($handphone->specification)
                    <!-- Highlight Specs -->
                    <div class="grid grid-cols-2 gap-3 mb-6">
                        <div class="flex items-center">
                            <div class="rounded-full bg-blue-100 p-2 mr-2">
                                <i class="fas fa-microchip text-blue-600"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600">Processor</div>
                                <div class="font-medium">{{ $handphone->specification->processor_name }}</div>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="rounded-full bg-green-100 p-2 mr-2">
                                <i class="fas fa-camera text-green-600"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600">Kamera</div>
                                <div class="font-medium">{{ $handphone->specification->camera_detail }}</div>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="rounded-full bg-yellow-100 p-2 mr-2">
                                <i class="fas fa-battery-full text-yellow-600"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600">Baterai</div>
                                <div class="font-medium">{{ $handphone->specification->battery_capacity }}</div>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <div class="rounded-full bg-purple-100 p-2 mr-2">
                                <i class="fas fa-memory text-purple-600"></i>
                            </div>
                            <div>
                                <div class="text-sm text-gray-600">RAM</div>
                                <div class="font-medium">{{ $handphone->specification->ram_size }}</div>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex flex-wrap gap-3 mb-4">
                        <a href="{{ route('recommendation') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-lg flex items-center transition duration-300">
                            <i class="fas fa-search mr-2"></i> Cari Handphone Serupa
                        </a>

                        <button class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg flex items-center transition duration-300" onclick="window.open('https://wa.me/?text=Lihat handphone {{ $handphone->name }} di {{ url()->current() }}')">
                            <i class="fab fa-whatsapp mr-2"></i> Bagikan
                        </button>
                    </div>

                    @if($handphone->specification && $handphone->specification->description)
                    <div class="mt-4 text-gray-700">
                        <p>{{ $handphone->specification->description }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @if($handphone->specification)
        <!-- Detailed Specifications -->
        <div class="border-t border-gray-200">
            <div class="p-6">
                <h2 class="text-xl font-bold mb-4">Spesifikasi Lengkap</h2>

                <div class="grid md:grid-cols-2 gap-6">
                    <div>
                        <table class="w-full text-sm">
                            <tbody>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">Display</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->screen_size }}</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">Processor</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->processor_name }}</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">RAM</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->ram_size }}</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">Storage</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->storage_size }}</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">Operating System</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->os_version }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div>
                        <table class="w-full text-sm">
                            <tbody>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">Kamera</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->camera_detail }}</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">Baterai</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->battery_capacity }}</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">Network</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->network }}</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">SIM</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->sim }}</td>
                                </tr>
                                <tr class="border-b border-gray-200">
                                    <td class="py-3 text-gray-600 font-medium">Dimensi & Berat</td>
                                    <td class="py-3 text-gray-800">{{ $handphone->specification->dimensions }} | {{ $handphone->specification->weight }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                @if($handphone->specification->features)
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-800 mb-2">Fitur Tambahan</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($handphone->specification->features as $feature)
                        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $feature }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($handphone->specification->colors)
                <div class="mt-6">
                    <h3 class="font-semibold text-gray-800 mb-2">Warna Tersedia</h3>
                    <div class="flex flex-wrap gap-2">
                        @foreach($handphone->specification->colors as $color)
                        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">{{ $color }}</span>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
        @endif

        <!-- Performance Ratings -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
            <h2 class="text-lg font-bold mb-4">Penilaian Performa</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium">Kamera</span>
                        <span class="text-sm font-medium">{{ $handphone->camera }}/10</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: {{ $handphone->camera * 10 }}%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium">Baterai</span>
                        <span class="text-sm font-medium">{{ $handphone->battery }}/10</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-yellow-600 h-2 rounded-full" style="width: {{ $handphone->battery * 10 }}%"></div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between mb-1">
                        <span class="text-sm font-medium">RAM</span>
                        <span class="text-sm font-medium">{{ $handphone->ram }}/10</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $handphone->ram * 10 }}%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

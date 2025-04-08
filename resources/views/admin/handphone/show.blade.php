<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\handphone\show.blade.php -->
<x-admin-layout header="Detail Handphone">
    <div class="mb-6 flex justify-between items-center">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">{{ $handphone->name }}</h2>
            <p class="text-gray-600 text-sm mt-1">ID: {{ $handphone->id }}</p>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('admin.handphone.edit', $handphone->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm inline-flex items-center">
                <i class="fas fa-edit mr-2"></i> Edit
            </a>
            <form action="{{ route('admin.handphone.destroy', $handphone->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus handphone ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md shadow-sm inline-flex items-center">
                    <i class="fas fa-trash mr-2"></i> Hapus
                </button>
            </form>
            <a href="{{ route('admin.handphone.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md shadow-sm inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>

    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-0">
            <!-- Image Section -->
            <div class="md:col-span-1 bg-gray-50 p-6 flex items-center justify-center">
                <div class="w-72 h-72 flex items-center justify-center bg-white rounded-lg shadow-sm p-4">
                    @if($handphone->specification && $handphone->specification->image)
                        <img src="{{ $handphone->specification->image }}" alt="{{ $handphone->name }}" class="max-w-full max-h-full object-contain">
                    @else
                        <div class="text-gray-400">
                            <i class="fas fa-mobile-alt text-6xl"></i>
                            <p class="mt-2 text-xs">No image available</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Main Info -->
            <div class="md:col-span-2 p-6">
                <h3 class="text-xl font-semibold text-gray-800">{{ $handphone->name }}</h3>
                <div class="mt-2">
                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full
                        {{ $handphone->category == 'Premium' ? 'bg-purple-100 text-purple-800' :
                           ($handphone->category == 'Mid-range' ? 'bg-blue-100 text-blue-800' :
                           ($handphone->category == 'Entry-level' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800')) }}">
                        {{ $handphone->category }}
                    </span>
                </div>

                <div class="mt-4">
                    <p class="text-2xl font-bold text-gray-800">Rp{{ number_format($handphone->price, 0, ',', '.') }}</p>
                </div>

                <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">RATINGS</h4>
                        <div class="mt-3 space-y-3">
                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Kamera</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->camera }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full" style="width: {{ $handphone->camera * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Baterai</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->battery }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $handphone->battery * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">RAM</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->ram }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $handphone->ram * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Processor</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->prosessor }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-red-500 h-2 rounded-full" style="width: {{ $handphone->prosessor * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Design</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->design }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-500 h-2 rounded-full" style="width: {{ $handphone->design * 10 }}%"></div>
                                </div>
                            </div>

                            <div>
                                <div class="flex items-center justify-between mb-1">
                                    <div class="text-sm font-medium text-gray-700">Storage</div>
                                    <div class="text-sm text-gray-500">{{ $handphone->storage }}/10</div>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-indigo-500 h-2 rounded-full" style="width: {{ $handphone->storage * 10 }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-500">SPECIFICATIONS</h4>
                        <div class="mt-3 space-y-2">
                            @if($handphone->specification)
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Processor</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->processor_name }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Camera</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->camera_detail }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Battery</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->battery_capacity }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">RAM</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->ram_size }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Storage</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->storage_size }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Screen</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->screen_size }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">OS</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->os_version }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Network</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->network }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">SIM</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->sim }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Weight</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->weight }}</span>
                                </div>
                                <div class="flex text-sm">
                                    <span class="text-gray-500 w-24 flex-shrink-0">Dimensions</span>
                                    <span class="text-gray-800 font-medium">{{ $handphone->specification->dimensions }}</span>
                                </div>
                            @else
                                <p class="text-gray-500 text-sm">No specification data available</p>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Colors and Features -->
                @if($handphone->specification)
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Colors -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-3">AVAILABLE COLORS</h4>
                            @php
                                $colors = $handphone->specification && $handphone->specification->colors
                                    ? json_decode($handphone->specification->colors)
                                    : [];
                            @endphp

                            @if(count($colors) > 0)
                                <div class="flex flex-wrap gap-2">
                                    @foreach($colors as $color)
                                        <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                                            {{ $color }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 text-sm">No color information available</p>
                            @endif
                        </div>

                        <!-- Features -->
                        <div>
                            <h4 class="text-sm font-medium text-gray-500 mb-3">KEY FEATURES</h4>
                            @php
                                $features = $handphone->specification && $handphone->specification->features
                                    ? json_decode($handphone->specification->features)
                                    : [];
                            @endphp

                            @if(count($features) > 0)
                                <div class="flex flex-wrap gap-2">
                                    @foreach($features as $feature)
                                        <span class="inline-flex px-3 py-1 text-xs font-medium rounded-full bg-blue-50 text-blue-800">
                                            {{ $feature }}
                                        </span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-gray-500 text-sm">No feature information available</p>
                            @endif
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mt-6">
                        <h4 class="text-sm font-medium text-gray-500 mb-3">DESCRIPTION</h4>
                        <div class="text-gray-700 text-sm">
                            {{ $handphone->specification->description ?? 'No description available' }}
                        </div>
                    </div>
                @endif

                <!-- Timestamps -->
                <div class="mt-6 pt-4 border-t border-gray-200">
                    <div class="flex flex-wrap gap-4 text-xs text-gray-500">
                        <div>Created: {{ $handphone->created_at->format('d M Y, H:i') }}</div>
                        <div>Updated: {{ $handphone->updated_at->format('d M Y, H:i') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>

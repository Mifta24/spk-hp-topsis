<x-layout>
    <div class="bg-white rounded-lg shadow-lg p-6">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Perbandingan Handphone</h1>
                <p class="text-gray-600 mt-1">Bandingkan hingga 3 handphone secara berdampingan</p>
            </div>

            <div class="mt-4 md:mt-0 flex space-x-2">
                <a href="{{ route('handphone.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fas fa-mobile-alt mr-2"></i> Lihat Katalog
                </a>
                @if(count(session('compare_ids', [])) > 0)
                <a href="{{ route('compare.clear') }}" class="bg-red-100 hover:bg-red-200 text-red-700 font-medium py-2 px-4 rounded-md inline-flex items-center">
                    <i class="fas fa-trash-alt mr-2"></i> Kosongkan
                </a>
                @endif
            </div>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm">{{ session('error') }}</p>
                </div>
            </div>
        </div>
        @endif

        <!-- Comparison Content -->
        @if(count($handphones) > 0)
            <div class="overflow-x-auto">
                <table class="w-full comparison-table">
                    <thead>
                        <tr>
                            <th class="min-w-[180px] bg-gray-50 p-4 text-left text-gray-600 font-medium border-b">Spesifikasi</th>
                            @foreach($handphones as $handphone)
                            <th class="min-w-[250px] p-4 text-center border-b relative group">
                                <div class="absolute top-2 right-2">
                                    <a href="{{ route('compare.remove', $handphone->id) }}" class="text-gray-400 hover:text-red-600 opacity-70 group-hover:opacity-100 transition-opacity">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </div>

                                <div class="flex flex-col items-center">
                                    @if($handphone->specification && $handphone->specification->image)
                                        <img src="{{ $handphone->specification->image }}" alt="{{ $handphone->name }}" class="w-24 h-24 object-contain mb-2">
                                    @else
                                        <div class="w-24 h-24 bg-gray-200 flex items-center justify-center mb-2 rounded">
                                            <i class="fas fa-mobile-alt text-gray-400 text-2xl"></i>
                                        </div>
                                    @endif

                                    <a href="{{ route('handphone.detail', $handphone->id) }}" class="font-bold text-indigo-600 hover:text-indigo-800">{{ $handphone->name }}</a>
                                    <div class="text-sm text-gray-500">{{ $handphone->brand->name ?? 'Brand' }}</div>
                                    <div class="font-bold mt-2">Rp{{ number_format($handphone->price, 0, ',', '.') }}</div>
                                </div>
                            </th>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <th class="min-w-[250px] p-4 text-center border-b bg-gray-50">
                                <div class="flex flex-col items-center justify-center h-40">
                                    <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mb-3">
                                        <i class="fas fa-plus text-gray-400"></i>
                                    </div>
                                    <p class="text-gray-500 text-sm">Tambahkan handphone untuk dibandingkan</p>
                                    <a href="{{ route('handphone.index') }}" class="mt-2 text-indigo-600 hover:text-indigo-800 text-sm">Pilih dari katalog</a>
                                </div>
                            </th>
                            @endfor
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rating Section -->
                        <tr class="bg-indigo-50">
                            <td class="p-4 font-medium text-indigo-800 border-b" colspan="{{ count($handphones) + 4 }}">
                                <i class="fas fa-star mr-2"></i> Penilaian Performa
                            </td>
                        </tr>

                        <!-- Camera Rating -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Kamera</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                <div class="flex flex-col items-center">
                                    <div class="h-2 w-full bg-gray-200 rounded-full mb-1">
                                        <div class="h-2 bg-green-600 rounded-full" style="width: {{ $handphone->camera * 10 }}%"></div>
                                    </div>
                                    <span class="text-sm font-semibold">{{ $handphone->camera }}/10</span>
                                </div>
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- Battery Rating -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Baterai</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                <div class="flex flex-col items-center">
                                    <div class="h-2 w-full bg-gray-200 rounded-full mb-1">
                                        <div class="h-2 bg-yellow-600 rounded-full" style="width: {{ $handphone->battery * 10 }}%"></div>
                                    </div>
                                    <span class="text-sm font-semibold">{{ $handphone->battery }}/10</span>
                                </div>
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- RAM Rating -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">RAM</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                <div class="flex flex-col items-center">
                                    <div class="h-2 w-full bg-gray-200 rounded-full mb-1">
                                        <div class="h-2 bg-blue-600 rounded-full" style="width: {{ $handphone->ram * 10 }}%"></div>
                                    </div>
                                    <span class="text-sm font-semibold">{{ $handphone->ram }}/10</span>
                                </div>
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- Processor Rating -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Processor</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                <div class="flex flex-col items-center">
                                    <div class="h-2 w-full bg-gray-200 rounded-full mb-1">
                                        <div class="h-2 bg-red-600 rounded-full" style="width: {{ $handphone->prosessor * 10 }}%"></div>
                                    </div>
                                    <span class="text-sm font-semibold">{{ $handphone->prosessor }}/10</span>
                                </div>
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- Design Rating -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Desain</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                <div class="flex flex-col items-center">
                                    <div class="h-2 w-full bg-gray-200 rounded-full mb-1">
                                        <div class="h-2 bg-purple-600 rounded-full" style="width: {{ $handphone->design * 10 }}%"></div>
                                    </div>
                                    <span class="text-sm font-semibold">{{ $handphone->design }}/10</span>
                                </div>
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- Storage Rating -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Penyimpanan</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                <div class="flex flex-col items-center">
                                    <div class="h-2 w-full bg-gray-200 rounded-full mb-1">
                                        <div class="h-2 bg-indigo-600 rounded-full" style="width: {{ $handphone->storage * 10 }}%"></div>
                                    </div>
                                    <span class="text-sm font-semibold">{{ $handphone->storage }}/10</span>
                                </div>
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- Specifications Section -->
                        <tr class="bg-indigo-50">
                            <td class="p-4 font-medium text-indigo-800 border-b" colspan="{{ count($handphones) + 4 }}">
                                <i class="fas fa-microchip mr-2"></i> Spesifikasi Teknis
                            </td>
                        </tr>

                        @if($handphones->first() && $handphones->first()->specification)
                        <!-- Processor -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Processor</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                {{ $handphone->specification->processor_name ?? '-' }}
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- RAM -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">RAM</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                {{ $handphone->specification->ram_size ?? '-' }}
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- Storage -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Penyimpanan</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                {{ $handphone->specification->storage_size ?? '-' }}
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- Camera -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Kamera</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                {{ $handphone->specification->camera_detail ?? '-' }}
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- Battery -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Baterai</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                {{ $handphone->specification->battery_capacity ?? '-' }}
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- Screen Size -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Layar</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                {{ $handphone->specification->screen_size ?? '-' }}
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>

                        <!-- OS -->
                        <tr>
                            <td class="p-4 text-gray-700 border-b">Sistem Operasi</td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center border-b">
                                {{ $handphone->specification->os_version ?? '-' }}
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center border-b bg-gray-50"></td>
                            @endfor
                        </tr>
                        @endif

                        <!-- Actions Section -->
                        <tr>
                            <td class="p-4 text-gray-700 bg-gray-50"></td>
                            @foreach($handphones as $handphone)
                            <td class="p-4 text-center bg-gray-50">
                                <a href="{{ route('handphone.detail', $handphone->id) }}" class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md text-sm transition-colors duration-300">
                                    <i class="fas fa-eye mr-2"></i> Lihat Detail
                                </a>
                            </td>
                            @endforeach

                            @for($i = count($handphones); $i < 3; $i++)
                            <td class="p-4 text-center bg-gray-50"></td>
                            @endfor
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="p-10 text-center border border-gray-200 rounded-lg">
                <div class="flex flex-col items-center justify-center py-8">
                    <div class="mb-4 bg-gray-100 rounded-full p-4">
                        <i class="fas fa-exchange-alt text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-800 mb-2">Belum ada handphone yang dibandingkan</h3>
                    <p class="text-gray-600 mb-6 max-w-md mx-auto">Pilih minimal 2 handphone untuk membandingkan spesifikasi dan fiturnya secara berdampingan</p>
                    <a href="{{ route('handphone.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md inline-flex items-center transition-colors duration-300">
                        <i class="fas fa-mobile-alt mr-2"></i> Pilih Handphone dari Katalog
                    </a>
                </div>
            </div>

            <!-- Recent Phones -->
            @if($recentHandphones->count() > 0)
            <div class="mt-8">
                <h2 class="text-lg font-bold mb-4">Handphone Terbaru</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                    @foreach($recentHandphones as $phone)
                    <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <div class="p-4">
                            @if($phone->specification && $phone->specification->image)
                                <img src="{{ $phone->specification->image }}" alt="{{ $phone->name }}" class="w-full h-32 object-contain mb-3">
                            @else
                                <div class="w-full h-32 bg-gray-200 flex items-center justify-center mb-3 rounded">
                                    <i class="fas fa-mobile-alt text-gray-400 text-2xl"></i>
                                </div>
                            @endif

                            <h3 class="font-medium text-gray-800">{{ $phone->name }}</h3>
                            <div class="text-sm text-gray-500 mb-2">{{ $phone->brand->name ?? '' }}</div>
                            <div class="flex justify-between items-center">
                                <span class="font-semibold">Rp{{ number_format($phone->price, 0, ',', '.') }}</span>
                                <a href="{{ route('compare.add', $phone->id) }}" class="text-indigo-600 hover:text-indigo-800 text-sm">
                                    <i class="fas fa-plus-circle mr-1"></i> Tambahkan
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endif
    </div>
</x-layout>

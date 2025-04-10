<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\handphone\edit.blade.php -->
<x-admin-layout header="Edit Handphone">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <a href="{{ route('admin.handphone.index') }}" class="text-indigo-600 hover:text-indigo-800 inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Handphone
            </a>
        </div>

        <form action="{{ route('admin.handphone.update', $handphone->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">
                    <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i> Informasi Dasar
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Handphone <span class="text-red-600">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name', $handphone->name) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp) <span class="text-red-600">*</span></label>
                        <input type="number" name="price" id="price" value="{{ old('price', $handphone->price) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                        @error('price')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">
                    <i class="fas fa-star-half-alt text-indigo-600 mr-2"></i> Rating (1-10)
                </h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    <!-- Camera -->
                    <div>
                        <label for="camera" class="block text-sm font-medium text-gray-700 mb-1">Rating Kamera <span class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="camera" id="camera" min="1" max="10" value="{{ old('camera', $handphone->camera) }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">{{ $handphone->camera }}</output>
                        </div>
                        @error('camera')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Battery -->
                    <div>
                        <label for="battery" class="block text-sm font-medium text-gray-700 mb-1">Rating Baterai <span class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="battery" id="battery" min="1" max="10" value="{{ old('battery', $handphone->battery) }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">{{ $handphone->battery }}</output>
                        </div>
                        @error('battery')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- RAM -->
                    <div>
                        <label for="ram" class="block text-sm font-medium text-gray-700 mb-1">Rating RAM <span class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="ram" id="ram" min="1" max="10" value="{{ old('ram', $handphone->ram) }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">{{ $handphone->ram }}</output>
                        </div>
                        @error('ram')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Processor -->
                    <div>
                        <label for="prosessor" class="block text-sm font-medium text-gray-700 mb-1">Rating Prosesor <span class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="prosessor" id="prosessor" min="1" max="10" value="{{ old('prosessor', $handphone->prosessor) }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">{{ $handphone->prosessor }}</output>
                        </div>
                        @error('prosessor')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Design -->
                    <div>
                        <label for="design" class="block text-sm font-medium text-gray-700 mb-1">Rating Desain <span class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="design" id="design" min="1" max="10" value="{{ old('design', $handphone->design) }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">{{ $handphone->design }}</output>
                        </div>
                        @error('design')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Storage -->
                    <div>
                        <label for="storage" class="block text-sm font-medium text-gray-700 mb-1">Rating Penyimpanan <span class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="storage" id="storage" min="1" max="10" value="{{ old('storage', $handphone->storage) }}" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer" oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">{{ $handphone->storage }}</output>
                        </div>
                        @error('storage')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">
                    <i class="fas fa-cog text-indigo-600 mr-2"></i> Spesifikasi
                </h3>

                @if($handphone->specification)
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Image URL -->
                    <div class="md:col-span-2">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">URL Gambar</label>
                        <div x-data="{ imageUrl: '{{ old('image_url', $handphone->specification->image) }}', useUrl: true }">
                            <div class="flex gap-2 mb-2">
                                <button type="button" @click="useUrl = false" :class="!useUrl ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700'" class="px-3 py-1 rounded text-sm">Upload Gambar</button>
                                <button type="button" @click="useUrl = true" :class="useUrl ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700'" class="px-3 py-1 rounded text-sm">URL Gambar</button>
                            </div>

                            <div x-show="!useUrl" class="mb-2">
                                <input type="file" name="image" id="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <p class="text-xs text-gray-500 mt-1">Ukuran yang direkomendasikan: 500x500 pixels, max 2MB</p>
                            </div>

                            <div x-show="useUrl" class="mb-2">
                                <input type="text" name="image_url" id="image_url" x-model="imageUrl" placeholder="https://example.com/image.jpg" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>

                            <div class="mt-2 bg-gray-100 border rounded p-2 h-40 flex items-center justify-center" x-show="imageUrl">
                                <img :src="imageUrl" alt="Preview" class="max-h-36 max-w-full object-contain">
                            </div>
                        </div>
                    </div>

                    <!-- Processor Name -->
                    <div>
                        <label for="processor_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Prosesor</label>
                        <input type="text" name="processor_name" id="processor_name" value="{{ old('processor_name', $handphone->specification->processor_name) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Camera Details -->
                    <div>
                        <label for="camera_detail" class="block text-sm font-medium text-gray-700 mb-1">Detail Kamera</label>
                        <input type="text" name="camera_detail" id="camera_detail" value="{{ old('camera_detail', $handphone->specification->camera_detail) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Battery Capacity -->
                    <div>
                        <label for="battery_capacity" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas Baterai</label>
                        <input type="text" name="battery_capacity" id="battery_capacity" value="{{ old('battery_capacity', $handphone->specification->battery_capacity) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- RAM Size -->
                    <div>
                        <label for="ram_size" class="block text-sm font-medium text-gray-700 mb-1">Ukuran RAM</label>
                        <input type="text" name="ram_size" id="ram_size" value="{{ old('ram_size', $handphone->specification->ram_size) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Storage Size -->
                    <div>
                        <label for="storage_size" class="block text-sm font-medium text-gray-700 mb-1">Ukuran Penyimpanan</label>
                        <input type="text" name="storage_size" id="storage_size" value="{{ old('storage_size', $handphone->specification->storage_size) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Screen Size -->
                    <div>
                        <label for="screen_size" class="block text-sm font-medium text-gray-700 mb-1">Ukuran Layar</label>
                        <input type="text" name="screen_size" id="screen_size" value="{{ old('screen_size', $handphone->specification->screen_size) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- OS Version -->
                    <div>
                        <label for="os_version" class="block text-sm font-medium text-gray-700 mb-1">Versi OS</label>
                        <input type="text" name="os_version" id="os_version" value="{{ old('os_version', $handphone->specification->os_version) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Network -->
                    <div>
                        <label for="network" class="block text-sm font-medium text-gray-700 mb-1">Jaringan</label>
                        <select name="network" id="network" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="5G" {{ old('network', $handphone->specification->network) == '5G' ? 'selected' : '' }}>5G</option>
                            <option value="4G LTE" {{ old('network', $handphone->specification->network) == '4G LTE' ? 'selected' : '' }}>4G LTE</option>
                            <option value="3G" {{ old('network', $handphone->specification->network) == '3G' ? 'selected' : '' }}>3G</option>
                        </select>
                    </div>

                    <!-- SIM -->
                    <div>
                        <label for="sim" class="block text-sm font-medium text-gray-700 mb-1">Tipe SIM</label>
                        <input type="text" name="sim" id="sim" value="{{ old('sim', $handphone->specification->sim) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Weight -->
                    <div>
                        <label for="weight" class="block text-sm font-medium text-gray-700 mb-1">Berat</label>
                        <input type="text" name="weight" id="weight" value="{{ old('weight', $handphone->specification->weight) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Dimensions -->
                    <div>
                        <label for="dimensions" class="block text-sm font-medium text-gray-700 mb-1">Dimensi</label>
                        <input type="text" name="dimensions" id="dimensions" value="{{ old('dimensions', $handphone->specification->dimensions) }}" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    </div>

                    <!-- Colors -->
                    <div class="md:col-span-2">
                        <label for="colors" class="block text-sm font-medium text-gray-700 mb-1">Warna yang Tersedia</label>
                        <div x-data="{
                            colors: {{ is_string($handphone->specification->colors) ? $handphone->specification->colors : (is_array($handphone->specification->colors) ? json_encode($handphone->specification->colors) : '[]') }},
                            newColor: ''
                        }">
                            <div class="flex">
                                <input type="text" x-model="newColor" placeholder="Tambahkan warna" class="w-full rounded-l-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <button type="button" @click="if(newColor.trim()) { colors.push(newColor.trim()); newColor = ''; }" class="px-4 py-2 bg-indigo-600 text-white rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Tambah
                                </button>
                            </div>

                            <div class="mt-2 flex flex-wrap gap-2">
                                <template x-for="(color, index) in colors" :key="index">
                                    <div class="inline-flex items-center bg-indigo-100 text-indigo-800 rounded-full px-3 py-1 text-sm">
                                        <span x-text="color"></span>
                                        <button type="button" @click="colors.splice(index, 1)" class="ml-1 text-indigo-600 hover:text-indigo-800">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <input type="hidden" name="colors[]" :value="color">
                                    </div>
                                </template>
                            </div>

                            <p class="text-xs text-gray-500 mt-1">Masukkan warna satu per satu (mis. Hitam, Biru, dll.)</p>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="md:col-span-2">
                        <label for="features" class="block text-sm font-medium text-gray-700 mb-1">Fitur</label>
                        <div x-data="{
                            features: {{ is_string($handphone->specification->features) ? $handphone->specification->features : (is_array($handphone->specification->features) ? json_encode($handphone->specification->features) : '[]') }},
                            newFeature: ''
                        }">
                            <div class="flex">
                                <input type="text" x-model="newFeature" placeholder="Tambahkan fitur" class="w-full rounded-l-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <button type="button" @click="if(newFeature.trim()) { features.push(newFeature.trim()); newFeature = ''; }" class="px-4 py-2 bg-indigo-600 text-white rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Tambah
                                </button>
                            </div>

                            <div class="mt-2 flex flex-wrap gap-2">
                                <template x-for="(feature, index) in features" :key="index">
                                    <div class="inline-flex items-center bg-green-100 text-green-800 rounded-full px-3 py-1 text-sm">
                                        <span x-text="feature"></span>
                                        <button type="button" @click="features.splice(index, 1)" class="ml-1 text-green-600 hover:text-green-800">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <input type="hidden" name="features[]" :value="feature">
                                    </div>
                                </template>
                            </div>

                            <p class="text-xs text-gray-500 mt-1">Masukkan fitur satu per satu (mis. Fast charging, NFC, dll.)</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                        <textarea name="description" id="description" rows="3" class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">{{ old('description', $handphone->specification->description) }}</textarea>
                    </div>
                </div>
                @else
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-yellow-400"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">Belum ada data spesifikasi untuk handphone ini. Data spesifikasi akan dibuat otomatis saat Anda menyimpan.</p>
                        </div>
                    </div>
                </div>
                @endif
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('admin.handphone.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded inline-flex items-center transition-colors">
                    <i class="fas fa-times mr-2"></i> Batal
                </a>
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded inline-flex items-center transition-colors">
                    <i class="fas fa-save mr-2"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>

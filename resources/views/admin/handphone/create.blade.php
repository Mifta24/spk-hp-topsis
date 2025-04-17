<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\handphone\create.blade.php -->
<x-admin-layout header="Tambah Handphone Baru">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="mb-6">
            <a href="{{ route('admin.handphone.index') }}"
                class="text-indigo-600 hover:text-indigo-800 inline-flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Handphone
            </a>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-md">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terdapat {{ $errors->count() }} kesalahan pada
                            form:</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <form action="{{ route('admin.handphone.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">
                    <i class="fas fa-mobile-alt text-indigo-600 mr-2"></i> Informasi Dasar
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Handphone <span
                                class="text-red-600">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="brand_id" class="block text-sm font-medium text-gray-700 mb-1">Brand</label>
                        <select name="brand_id" id="brand_id"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="">-- Pilih Brand --</option>
                            @foreach (\App\Models\Brand::where('is_active', true)->orderBy('name')->get() as $brand)
                                <option value="{{ $brand->id }}"
                                    {{ old('brand_id', $handphone->brand_id ?? '') == $brand->id ? 'selected' : '' }}>
                                    {{ $brand->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Price -->
                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp) <span
                                class="text-red-600">*</span></label>
                        <input type="number" name="price" id="price" value="{{ old('price') }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>
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
                        <label for="camera" class="block text-sm font-medium text-gray-700 mb-1">Rating Kamera <span
                                class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="camera" id="camera" min="1" max="10"
                                value="{{ old('camera', 5) }}"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">5</output>
                        </div>
                    </div>

                    <!-- Battery -->
                    <div>
                        <label for="battery" class="block text-sm font-medium text-gray-700 mb-1">Rating Baterai <span
                                class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="battery" id="battery" min="1" max="10"
                                value="{{ old('battery', 5) }}"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">5</output>
                        </div>
                    </div>

                    <!-- RAM -->
                    <div>
                        <label for="ram" class="block text-sm font-medium text-gray-700 mb-1">Rating RAM <span
                                class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="ram" id="ram" min="1" max="10"
                                value="{{ old('ram', 5) }}"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">5</output>
                        </div>
                    </div>

                    <!-- Processor -->
                    <div>
                        <label for="prosessor" class="block text-sm font-medium text-gray-700 mb-1">Rating Prosesor
                            <span class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="prosessor" id="prosessor" min="1" max="10"
                                value="{{ old('prosessor', 5) }}"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">5</output>
                        </div>
                    </div>

                    <!-- Design -->
                    <div>
                        <label for="design" class="block text-sm font-medium text-gray-700 mb-1">Rating Desain <span
                                class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="design" id="design" min="1" max="10"
                                value="{{ old('design', 5) }}"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">5</output>
                        </div>
                    </div>

                    <!-- Storage -->
                    <div>
                        <label for="storage" class="block text-sm font-medium text-gray-700 mb-1">Rating Penyimpanan
                            <span class="text-red-600">*</span></label>
                        <div class="flex items-center">
                            <input type="range" name="storage" id="storage" min="1" max="10"
                                value="{{ old('storage', 5) }}"
                                class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer"
                                oninput="this.nextElementSibling.value = this.value">
                            <output class="w-10 text-center text-sm font-medium text-gray-700 ml-2">5</output>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-6">
                <h3 class="text-lg font-medium text-gray-800 mb-4">
                    <i class="fas fa-cogs text-indigo-600 mr-2"></i> Spesifikasi
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Image -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                        <div x-data="{ imageUrl: '', useUrl: false }">
                            <div class="flex gap-2 mb-2">
                                <button type="button" @click="useUrl = false"
                                    :class="!useUrl ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700'"
                                    class="px-3 py-1 rounded text-sm">Upload Gambar</button>
                                <button type="button" @click="useUrl = true"
                                    :class="useUrl ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700'"
                                    class="px-3 py-1 rounded text-sm">URL Gambar</button>
                            </div>

                            <div x-show="!useUrl" class="mb-2">
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                <p class="text-xs text-gray-500 mt-1">Ukuran yang direkomendasikan: 500x500 piksel,
                                    maks 2MB</p>
                            </div>

                            <div x-show="useUrl" class="mb-2">
                                <input type="text" name="image_url" id="image_url"
                                    value="{{ old('image_url') }}" x-model="imageUrl"
                                    placeholder="https://example.com/image.jpg"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>

                            <div class="mt-2 bg-gray-100 border rounded p-2 h-40 flex items-center justify-center"
                                x-show="imageUrl">
                                <img :src="imageUrl" alt="Preview" class="max-h-36 max-w-full object-contain">
                            </div>
                        </div>
                    </div>

                    <!-- Processor Name -->
                    <div>
                        <label for="processor_name" class="block text-sm font-medium text-gray-700 mb-1">Nama Prosesor
                            <span class="text-red-600">*</span></label>
                        <input type="text" name="processor_name" id="processor_name"
                            value="{{ old('processor_name') }}" placeholder="contoh: Snapdragon 8 Gen 2"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>
                    </div>

                    <!-- Camera Detail -->
                    <div>
                        <label for="camera_detail" class="block text-sm font-medium text-gray-700 mb-1">Detail Kamera
                            <span class="text-red-600">*</span></label>
                        <input type="text" name="camera_detail" id="camera_detail"
                            value="{{ old('camera_detail') }}" placeholder="contoh: 50 MP (wide) + 12 MP (ultrawide)"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>
                    </div>

                    <!-- Battery Capacity -->
                    <div>
                        <label for="battery_capacity" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas
                            Baterai <span class="text-red-600">*</span></label>
                        <input type="text" name="battery_capacity" id="battery_capacity"
                            value="{{ old('battery_capacity') }}" placeholder="contoh: 5000 mAh Li-Po"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>
                    </div>

                    <!-- RAM Size -->
                    <div>
                        <label for="ram_size" class="block text-sm font-medium text-gray-700 mb-1">Ukuran RAM <span
                                class="text-red-600">*</span></label>
                        <input type="text" name="ram_size" id="ram_size" value="{{ old('ram_size') }}"
                            placeholder="contoh: 8 GB"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>
                    </div>

                    <!-- Storage Size -->
                    <div>
                        <label for="storage_size" class="block text-sm font-medium text-gray-700 mb-1">Ukuran
                            Penyimpanan <span class="text-red-600">*</span></label>
                        <input type="text" name="storage_size" id="storage_size"
                            value="{{ old('storage_size') }}" placeholder="contoh: 128 GB / 256 GB"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>
                    </div>

                    <!-- Screen Size -->
                    <div>
                        <label for="screen_size" class="block text-sm font-medium text-gray-700 mb-1">Ukuran Layar
                            <span class="text-red-600">*</span></label>
                        <input type="text" name="screen_size" id="screen_size" value="{{ old('screen_size') }}"
                            placeholder="contoh: 6.5 inches AMOLED, 120Hz"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>
                    </div>

                    <!-- OS Version -->
                    <div>
                        <label for="os_version" class="block text-sm font-medium text-gray-700 mb-1">Versi OS <span
                                class="text-red-600">*</span></label>
                        <input type="text" name="os_version" id="os_version" value="{{ old('os_version') }}"
                            placeholder="contoh: Android 13, One UI 5.1"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>
                    </div>

                    <!-- Optional fields in a collapsible section -->
                    <div class="md:col-span-2" x-data="{ open: false }">
                        <button type="button" @click="open = !open"
                            class="flex items-center justify-between w-full text-sm font-medium text-left text-indigo-600 hover:text-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 py-2">
                            <span>Spesifikasi Tambahan (Opsional)</span>
                            <i class="fas" :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                        </button>

                        <div x-show="open" class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                            <!-- Network -->
                            <div>
                                <label for="network"
                                    class="block text-sm font-medium text-gray-700 mb-1">Jaringan</label>
                                <select name="network" id="network"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                    <option value="">Pilih Jaringan</option>
                                    <option value="5G" {{ old('network') == '5G' ? 'selected' : '' }}>5G</option>
                                    <option value="4G LTE" {{ old('network') == '4G LTE' ? 'selected' : '' }}>4G LTE
                                    </option>
                                    <option value="3G" {{ old('network') == '3G' ? 'selected' : '' }}>3G</option>
                                </select>
                            </div>

                            <!-- SIM -->
                            <div>
                                <label for="sim" class="block text-sm font-medium text-gray-700 mb-1">Tipe
                                    SIM</label>
                                <input type="text" name="sim" id="sim" value="{{ old('sim') }}"
                                    placeholder="contoh: Dual SIM (Nano-SIM)"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>

                            <!-- Weight -->
                            <div>
                                <label for="weight"
                                    class="block text-sm font-medium text-gray-700 mb-1">Berat</label>
                                <input type="text" name="weight" id="weight" value="{{ old('weight') }}"
                                    placeholder="contoh: 195 g"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>

                            <!-- Dimensions -->
                            <div>
                                <label for="dimensions"
                                    class="block text-sm font-medium text-gray-700 mb-1">Dimensi</label>
                                <input type="text" name="dimensions" id="dimensions"
                                    value="{{ old('dimensions') }}" placeholder="contoh: 162.9 x 76.6 x 8.9 mm"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                            </div>
                        </div>
                    </div>

                    <!-- Colors -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Warna yang Tersedia <span
                                class="text-red-600">*</span></label>
                        <div x-data="{ colors: [], newColor: '' }">
                            <div class="flex">
                                <input type="text" x-model="newColor" placeholder="Tambahkan warna"
                                    class="w-full rounded-l-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                <button type="button"
                                    @click="if(newColor.trim()) { colors.push(newColor.trim()); newColor = ''; }"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Tambah
                                </button>
                            </div>

                            <div class="mt-2 flex flex-wrap gap-2">
                                <template x-for="(color, index) in colors" :key="index">
                                    <div
                                        class="inline-flex items-center bg-indigo-100 text-indigo-800 rounded-full px-3 py-1 text-sm">
                                        <span x-text="color"></span>
                                        <button type="button" @click="colors.splice(index, 1)"
                                            class="ml-1 text-indigo-600 hover:text-indigo-800">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <input type="hidden" name="colors[]" :value="color">
                                    </div>
                                </template>
                            </div>

                            <p class="text-xs text-gray-500 mt-1">Masukkan warna satu per satu (contoh: Hitam, Biru,
                                dll.)</p>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Fitur Utama</label>
                        <div x-data="{ features: [], newFeature: '' }">
                            <div class="flex">
                                <input type="text" x-model="newFeature" placeholder="Tambahkan fitur"
                                    class="w-full rounded-l-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                                <button type="button"
                                    @click="if(newFeature.trim()) { features.push(newFeature.trim()); newFeature = ''; }"
                                    class="px-4 py-2 bg-indigo-600 text-white rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Tambah
                                </button>
                            </div>

                            <div class="mt-2 flex flex-wrap gap-2">
                                <template x-for="(feature, index) in features" :key="index">
                                    <div
                                        class="inline-flex items-center bg-green-100 text-green-800 rounded-full px-3 py-1 text-sm">
                                        <span x-text="feature"></span>
                                        <button type="button" @click="features.splice(index, 1)"
                                            class="ml-1 text-green-600 hover:text-green-800">
                                            <i class="fas fa-times"></i>
                                        </button>
                                        <input type="hidden" name="features[]" :value="feature">
                                    </div>
                                </template>
                            </div>

                            <p class="text-xs text-gray-500 mt-1">Masukkan fitur satu per satu (contoh: Fast charging,
                                NFC, dll.)</p>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi <span
                                class="text-red-600">*</span></label>
                        <textarea name="description" id="description" rows="4"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
                            required>{{ old('description') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.handphone.index') }}"
                    class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    <i class="fas fa-times mr-2"></i> Batal
                </a>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    <i class="fas fa-save mr-2"></i> Simpan Handphone
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>

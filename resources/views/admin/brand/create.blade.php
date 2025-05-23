<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\brand\create.blade.php -->
<x-admin-layout header="Tambah Brand">
    <div class="mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Tambah Brand Baru</h1>
                <p class="text-gray-600 mt-1">Masukkan informasi untuk brand baru</p>
            </div>
            <a href="{{ route('admin.brand.index') }}" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors duration-300 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <div class="p-6">
            <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="mb-6">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Brand <span class="text-red-600">*</span></label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="slug" class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Otomatis diisi berdasarkan nama">
                            <p class="mt-1 text-xs text-gray-500">Biarkan kosong untuk otomatis mengisi berdasarkan nama</p>
                            @error('slug')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">Logo URL</label>
                            <input type="text" name="logo" id="logo" value="{{ old('logo') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="https://example.com/logo.png">
                            <p class="mt-1 text-xs text-gray-500">Masukkan URL logo (opsional)</p>
                            @error('logo')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <div class="flex items-center">
                                <input type="checkbox" name="is_active" id="is_active" value="1" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label for="is_active" class="ml-2 block text-sm text-gray-700">Brand Aktif</label>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Brand yang tidak aktif tidak akan ditampilkan di website</p>
                        </div>
                    </div>

                    <div>
                        <div class="mb-6">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                            <textarea name="description" id="description" rows="8" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6" id="logo-preview" style="display: none;">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Preview Logo</label>
                            <div class="mt-1 border rounded-md p-2 bg-gray-50 flex justify-center">
                                <img src="" alt="Logo Preview" id="logo-preview-image" class="h-24 object-contain">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 border-t border-gray-200 pt-6 flex justify-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fas fa-save mr-2"></i> Simpan Brand
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Script untuk slug otomatis dan preview logo
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');
            const logoInput = document.getElementById('logo');
            const logoPreview = document.getElementById('logo-preview');
            const logoPreviewImage = document.getElementById('logo-preview-image');

            // Generate slug from name
            nameInput.addEventListener('blur', function() {
                if (!slugInput.value) {
                    slugInput.value = nameInput.value
                        .toLowerCase()
                        .replace(/[^\w\s-]/g, '')
                        .replace(/[\s_-]+/g, '-')
                        .replace(/^-+|-+$/g, '');
                }
            });

            // Show logo preview
            logoInput.addEventListener('input', function() {
                if (logoInput.value) {
                    logoPreviewImage.src = logoInput.value;
                    logoPreview.style.display = 'block';

                    // Check if image loads correctly
                    logoPreviewImage.onerror = function() {
                        logoPreviewImage.src = 'https://via.placeholder.com/200x100.png?text=Invalid+Image';
                    };
                } else {
                    logoPreview.style.display = 'none';
                }
            });

            // Initial check for logo preview
            if (logoInput.value) {
                logoPreviewImage.src = logoInput.value;
                logoPreview.style.display = 'block';
            }
        });
    </script>
</x-admin-layout>

<!-- filepath: c:\laragon\www\spk-hp-topsis\resources\views\admin\handphone\index.blade.php -->
<x-admin-layout header="Manajemen Handphone">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6">
            <div>
                <h1 class="text-xl font-bold text-gray-800">Data Handphone</h1>
                <p class="text-gray-600 mt-1">Kelola data handphone untuk rekomendasi TOPSIS</p>
            </div>

            <div class="mt-4 md:mt-0">
                <a href="{{ route('admin.handphone.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm inline-flex items-center transition-colors mr-2">
                    <i class="fas fa-plus mr-2"></i> Tambah Handphone
                </a>

                <button id="deleteSelectedBtn"
                    class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-md shadow-sm inline-flex items-center transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    disabled>
                    <i class="fas fa-trash-alt mr-2"></i> Hapus Terpilih <span id="selectedCount"
                        class="ml-1">(0)</span>
                </button>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="mb-6 bg-gray-50 rounded-lg p-4 border border-gray-200">
            <form action="{{ route('admin.handphone.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Handphone</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 sm:text-sm border-gray-300 rounded-md"
                            placeholder="Cari nama handphone...">
                    </div>
                </div>

                <div class="w-full md:w-48">
                    <label for="price_range" class="block text-sm font-medium text-gray-700 mb-1">Kisaran Harga</label>
                    <select name="price_range" id="price_range"
                        class="block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        <option value="">Semua Harga</option>
                        <option value="budget" {{ request('price_range') == 'budget' ? 'selected' : '' }}>Budget (< 2
                                juta)</option>
                        <option value="entry" {{ request('price_range') == 'entry' ? 'selected' : '' }}>Entry Level
                            (2-4 juta)</option>
                        <option value="mid" {{ request('price_range') == 'mid' ? 'selected' : '' }}>Mid Range (4-8
                            juta)</option>
                        <option value="premium" {{ request('price_range') == 'premium' ? 'selected' : '' }}>Premium (> 8
                            juta)</option>
                    </select>
                </div>

                <div class="w-full md:w-48">
                    <label for="sort" class="block text-sm font-medium text-gray-700 mb-1">Urutkan</label>
                    <select name="sort" id="sort"
                        class="block w-full focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm border-gray-300 rounded-md">
                        <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Terlama</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama (A-Z)
                        </option>
                        <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama (Z-A)
                        </option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga
                            (Rendah-Tinggi)</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga
                            (Tinggi-Rendah)</option>
                    </select>
                </div>

                <div class="flex items-end space-x-2">
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md shadow-sm">
                        <i class="fas fa-filter mr-2"></i> Filter
                    </button>
                    <a href="{{ route('admin.handphone.index') }}"
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md shadow-sm">
                        <i class="fas fa-sync-alt"></i>
                    </a>
                </div>
            </form>
        </div>

        <!-- Multiple delete form -->
        <form id="deleteMultipleForm" action="{{ route('admin.handphone.destroyMultiple') }}" method="POST">
            @csrf
            @method('DELETE')

            <!-- Data Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <input type="checkbox" id="selectAll"
                                        class="form-checkbox h-4 w-4 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                                    <span class="ml-2">Pilih</span>
                                </div>
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Handphone</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Harga</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Spesifikasi</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Rating</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($handphones as $handphone)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" name="ids[]" value="{{ $handphone->id }}"
                                        class="handphone-checkbox form-checkbox h-4 w-4 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded-md flex items-center justify-center overflow-hidden">
                                            @if ($handphone->specification && $handphone->specification->image)
                                                <img src="{{ $handphone->specification->image }}"
                                                    alt="{{ $handphone->name }}"
                                                    class="max-h-full max-w-full object-contain">
                                            @else
                                                <i class="fas fa-mobile-alt text-gray-400"></i>
                                            @endif
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $handphone->name }}
                                            </div>
                                            <div class="text-xs text-gray-500">
                                                @if ($handphone->category)
                                                    <span
                                                        class="px-2 py-0.5 rounded-full {{ $handphone->category == 'Premium'
                                                            ? 'bg-purple-100 text-purple-800'
                                                            : ($handphone->category == 'Mid-range'
                                                                ? 'bg-blue-100 text-blue-800'
                                                                : ($handphone->category == 'Entry-level'
                                                                    ? 'bg-green-100 text-green-800'
                                                                    : 'bg-gray-100 text-gray-800')) }}">
                                                        {{ $handphone->category }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        Rp{{ number_format($handphone->price, 0, ',', '.') }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">
                                        @if ($handphone->specification)
                                            <div class="flex flex-col space-y-1">
                                                <span>{{ $handphone->specification->ram_size ?? '-' }} /
                                                    {{ $handphone->specification->storage_size ?? '-' }}</span>
                                                <span>{{ $handphone->specification->processor_name ?? '-' }}</span>
                                            </div>
                                        @else
                                            <span class="text-gray-400">No specifications</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex space-x-1">
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-camera mr-1"></i> {{ $handphone->camera }}
                                        </span>
                                        <span
                                            class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <i class="fas fa-battery-full mr-1"></i> {{ $handphone->battery }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex items-center justify-end space-x-3">
                                        <a href="{{ route('admin.handphone.show', $handphone->id) }}"
                                            class="text-blue-600 hover:text-blue-900">
                                            <i class="fas fa-eye mr-1"></i> Lihat
                                        </a>
                                        <a href="{{ route('admin.handphone.edit', $handphone->id) }}"
                                            class="text-indigo-600 hover:text-indigo-900">
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>

                                        <form action="{{ route('admin.handphone.destroy', $handphone->id) }}"
                                            method="POST" class="inline-block delete-single-form"
                                            onsubmit="return confirmSingleDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash mr-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                    Belum ada data handphone.
                                    <a href="{{ route('admin.handphone.create') }}"
                                        class="text-indigo-600 hover:text-indigo-900">Tambah handphone baru</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </form>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $handphones->withQueryString()->links() }}
        </div>
    </div>

    <!-- Konfirmasi Modal untuk Multiple Delete -->
    <div id="confirmDeleteModal"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Konfirmasi Hapus</h3>
            <p class="text-gray-700 mb-6">Apakah Anda yakin ingin menghapus <span id="deleteCount"
                    class="font-bold">0</span> handphone yang dipilih? Tindakan ini tidak dapat dibatalkan.</p>
            <div class="flex justify-end space-x-3">
                <button id="cancelDelete"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">Batal</button>
                <button id="confirmDelete" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">Ya,
                    Hapus</button>
            </div>
        </div>
    </div>

    <!-- Konfirmasi Modal untuk Single Delete -->
    <div id="confirmSingleDeleteModal"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
        <div class="bg-white rounded-lg p-6 w-full max-w-md">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Konfirmasi Hapus</h3>
            <p class="text-gray-700 mb-6">Apakah Anda yakin ingin menghapus handphone ini? Tindakan ini tidak dapat
                dibatalkan.</p>
            <div class="flex justify-end space-x-3">
                <button id="cancelSingleDelete"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md">Batal</button>
                <button id="confirmSingleDelete" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <style>
        /* Style untuk form-checkbox */
        .form-checkbox {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            height: 16px;
            width: 16px;
            background-color: #fff;
            border: 1px solid #d1d5db;
            border-radius: 0.25rem;
            cursor: pointer;
            display: inline-block;
            position: relative;
            vertical-align: middle;
        }

        .form-checkbox:checked {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .form-checkbox:checked::after {
            content: '';
            display: block;
            position: absolute;
            left: 5px;
            top: 2px;
            width: 5px;
            height: 9px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .form-checkbox:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements untuk multiple delete
            const selectAllCheckbox = document.getElementById('selectAll');
            const handphoneCheckboxes = document.querySelectorAll('.handphone-checkbox');
            const deleteSelectedBtn = document.getElementById('deleteSelectedBtn');
            const selectedCountEl = document.getElementById('selectedCount');
            const deleteCountEl = document.getElementById('deleteCount');
            const deleteMultipleForm = document.getElementById('deleteMultipleForm');
            const confirmDeleteModal = document.getElementById('confirmDeleteModal');
            const confirmDeleteBtn = document.getElementById('confirmDelete');
            const cancelDeleteBtn = document.getElementById('cancelDelete');

            // Elements untuk single delete
            const confirmSingleDeleteModal = document.getElementById('confirmSingleDeleteModal');
            const confirmSingleDeleteBtn = document.getElementById('confirmSingleDelete');
            const cancelSingleDeleteBtn = document.getElementById('cancelSingleDelete');
            let currentDeleteForm = null;

            // Update selected count
            function updateSelectedCount() {
                const checkedCount = document.querySelectorAll('.handphone-checkbox:checked').length;
                selectedCountEl.textContent = `(${checkedCount})`;
                deleteCountEl.textContent = checkedCount;
                deleteSelectedBtn.disabled = checkedCount === 0;

                // Update the select all checkbox state
                if (handphoneCheckboxes.length > 0) {
                    selectAllCheckbox.checked = checkedCount === handphoneCheckboxes.length;
                    selectAllCheckbox.indeterminate = checkedCount > 0 && checkedCount < handphoneCheckboxes.length;
                }
            }

            // Toggle all checkboxes
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function() {
                    handphoneCheckboxes.forEach(checkbox => {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                    updateSelectedCount();
                });
            }

            // Individual checkbox change
            handphoneCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelectedCount);
            });

            // MULTIPLE DELETE HANDLING
            // -----------------------

            // Show confirmation modal for multiple delete
            if (deleteSelectedBtn) {
                deleteSelectedBtn.addEventListener('click', function(e) {
                    e.preventDefault();

                    // Check if any items are selected
                    const checkedCount = document.querySelectorAll('.handphone-checkbox:checked').length;
                    if (checkedCount === 0) {
                        alert('Pilih minimal satu handphone untuk dihapus');
                        return;
                    }

                    confirmDeleteModal.classList.remove('hidden');
                });
            }

            // Hide confirmation modal for multiple delete
            if (cancelDeleteBtn) {
                cancelDeleteBtn.addEventListener('click', function() {
                    confirmDeleteModal.classList.add('hidden');
                });
            }

            // Submit form when confirmed for multiple delete
            if (confirmDeleteBtn) {
                confirmDeleteBtn.addEventListener('click', function() {
                    deleteMultipleForm.submit();
                });
            }

            // Close modal when clicking outside for multiple delete
            if (confirmDeleteModal) {
                confirmDeleteModal.addEventListener('click', function(e) {
                    if (e.target === confirmDeleteModal) {
                        confirmDeleteModal.classList.add('hidden');
                    }
                });
            }

            // SINGLE DELETE HANDLING
            // ---------------------

            // Function to handle single delete confirmation
            window.confirmSingleDelete = function(event) {
                event.preventDefault();
                currentDeleteForm = event.target;
                confirmSingleDeleteModal.classList.remove('hidden');
                return false;
            };

            // Hide confirmation modal for single delete
            if (cancelSingleDeleteBtn) {
                cancelSingleDeleteBtn.addEventListener('click', function() {
                    confirmSingleDeleteModal.classList.add('hidden');
                    currentDeleteForm = null;
                });
            }

            // Submit form when confirmed for single delete
            if (confirmSingleDeleteBtn) {
                confirmSingleDeleteBtn.addEventListener('click', function() {
                    if (currentDeleteForm) {
                        currentDeleteForm.submit();
                    }
                    confirmSingleDeleteModal.classList.add('hidden');
                });
            }

            // Close modal when clicking outside for single delete
            if (confirmSingleDeleteModal) {
                confirmSingleDeleteModal.addEventListener('click', function(e) {
                    if (e.target === confirmSingleDeleteModal) {
                        confirmSingleDeleteModal.classList.add('hidden');
                        currentDeleteForm = null;
                    }
                });
            }

            // Initialize count
            updateSelectedCount();
        });
    </script>
</x-admin-layout>

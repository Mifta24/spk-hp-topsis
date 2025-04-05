<x-layout>
    <!-- Introduction -->
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-3">Temukan Handphone Sesuai Kebutuhan Anda</h2>
        <p class="text-gray-600">Sistem ini akan membantu Anda menemukan handphone yang paling sesuai berdasarkan
            preferensi dan budget yang Anda miliki.</p>

        <div class="mt-6">
            <a href="{{ route('recommendation') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg shadow transition duration-300">
                <i class="fas fa-search mr-2"></i> Mulai Cari Rekomendasi
            </a>
        </div>
    </div>

    <!-- List Handphone -->
    <div class="mt-12">
        <h3 class="text-xl font-bold text-gray-800 mb-6">Handphone Populer</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Phone 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <img src="https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-s23-5g.jpg" alt="Samsung Galaxy S23"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-indigo-600 text-white text-xs py-1 px-2 rounded-full">
                        Premium
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg mb-1">Samsung Galaxy S23</h4>
                    <p class="text-gray-500 text-sm mb-2">Rp 9.999.000</p>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Kamera: Tinggi</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">RAM: Tinggi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phone 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <img src="https://fdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-12.jpg" alt="Xiaomi Redmi Note 12"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-green-600 text-white text-xs py-1 px-2 rounded-full">
                        Budget
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg mb-1">Xiaomi Redmi Note 12</h4>
                    <p class="text-gray-500 text-sm mb-2">Rp 2.499.000</p>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Baterai: Tinggi</span>
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Kamera: Sedang</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phone 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <img src="https://fdn2.gsmarena.com/vv/bigpic/google-pixel7-pro.jpg" alt="Google Pixel 7a"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-blue-600 text-white text-xs py-1 px-2 rounded-full">
                        Fotografi
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg mb-1">Google Pixel 7a</h4>
                    <p class="text-gray-500 text-sm mb-2">Rp 7.499.000</p>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Kamera: Tinggi</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">RAM: Tinggi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phone 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <img src="https://fdn2.gsmarena.com/vv/bigpic/oppo-reno8-5g.jpg" alt="Oppo Reno 8"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-purple-600 text-white text-xs py-1 px-2 rounded-full">
                        Design
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg mb-1">Oppo Reno 8</h4>
                    <p class="text-gray-500 text-sm mb-2">Rp 4.599.000</p>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Kamera: Tinggi</span>
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Baterai: Sedang</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phone 5 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <img src="https://fdn2.gsmarena.com/vv/bigpic/vivo-v27-pro.jpg" alt="Vivo V27"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-pink-600 text-white text-xs py-1 px-2 rounded-full">
                        Selfie
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg mb-1">Vivo V27</h4>
                    <p class="text-gray-500 text-sm mb-2">Rp 5.499.000</p>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Kamera: Tinggi</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">RAM: Tinggi</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Phone 6 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <img src="https://fdn2.gsmarena.com/vv/bigpic/poco-f5.jpg" alt="Poco F5"
                        class="w-full h-48 object-cover">
                    <div class="absolute top-2 right-2 bg-yellow-600 text-white text-xs py-1 px-2 rounded-full">
                        Gaming
                    </div>
                </div>
                <div class="p-4">
                    <h4 class="font-semibold text-lg mb-1">Poco F5</h4>
                    <p class="text-gray-500 text-sm mb-2">Rp 4.799.000</p>
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-2">
                            <span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Kamera: Sedang</span>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded">RAM: Tinggi</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('recommendation') }}"
                class="text-indigo-600 hover:text-indigo-800 font-medium inline-flex items-center">
                Temukan lebih banyak handphone <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>

    <!-- How it Works -->
    <div class="mt-16">
        <h3 class="text-xl font-bold text-gray-800 text-center mb-6">Bagaimana Sistem Ini Bekerja?</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg p-5 shadow text-center">
                <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold">1</span>
                </div>
                <h4 class="font-medium text-gray-800 mb-2">Masukkan Kriteria</h4>
                <p class="text-gray-600 text-sm">Tentukan rentang harga dan tingkat kepentingan kriteria</p>
            </div>

            <div class="bg-white rounded-lg p-5 shadow text-center">
                <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold">2</span>
                </div>
                <h4 class="font-medium text-gray-800 mb-2">Analisis TOPSIS</h4>
                <p class="text-gray-600 text-sm">Sistem melakukan perhitungan dengan metode TOPSIS</p>
            </div>

            <div class="bg-white rounded-lg p-5 shadow text-center">
                <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mx-auto mb-4">
                    <span class="text-blue-600 font-bold">3</span>
                </div>
                <h4 class="font-medium text-gray-800 mb-2">Dapatkan Rekomendasi</h4>
                <p class="text-gray-600 text-sm">Lihat daftar handphone yang direkomendasikan sesuai preferensi</p>
            </div>
        </div>
    </div>
    </div>


</x-layout>

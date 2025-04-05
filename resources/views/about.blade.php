<x-layout pageTitle="Tentang TOPSIS" pageSubtitle="Metode Pengambilan Keputusan Multi-Kriteria">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Hero Section -->
        <div class="bg-gradient-to-r from-indigo-900 to-indigo-700 py-12 px-6 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10">
                <svg viewBox="0 0 2000 1500" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#ffffff" d="M2000,1500H0V0h2000V1500z M984.8,1083.3C901.5,952.8,831,882.9,690.5,800c69.4,165.2,158.9,342.3,342.3,342.3c183.4,0,271.9-176.1,341.3-341.3c-140.1,82.9-211.2,153.2-293.9,282.3H984.8z" opacity="0.05"></path>
                    <path fill="#ffffff" d="M2000,1500H0V0h2000V1500z M984.8,1093.3C881.5,920.8,771,830.9,590.5,730c109.4,195.2,198.9,372.3,442.3,372.3c243.4,0,331.9-176.1,441.3-371.3c-180.1,102.9-291.2,193.2-393.9,362.3H984.8z" opacity="0.1"></path>
                </svg>
            </div>
            <div class="container mx-auto max-w-4xl relative">
                <h1 class="text-3xl md:text-4xl font-bold text-white mb-4 text-center">TOPSIS (Technique for Order Preference by Similarity to Ideal Solution)</h1>
                <p class="text-lg text-indigo-100 text-center max-w-3xl mx-auto">Memahami metode pengambilan keputusan yang membantu Anda menemukan handphone terbaik berdasarkan kriteria yang penting.</p>

                <div class="mt-8 flex justify-center">
                    <a href="{{ route('recommendation') }}" class="bg-white text-indigo-700 hover:bg-indigo-50 px-6 py-3 rounded-lg shadow-lg font-medium transition-colors inline-flex items-center">
                        <i class="fas fa-search mr-2"></i> Coba Rekomendasi TOPSIS
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="p-6 md:p-8">
            <div class="max-w-4xl mx-auto">
                <!-- What is TOPSIS -->
                <div class="mb-12">
                    <div class="flex items-center mb-4">
                        <div class="bg-indigo-100 rounded-full p-2 mr-3">
                            <i class="fas fa-question-circle text-indigo-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Apa Itu TOPSIS?</h2>
                    </div>

                    <div class="pl-12 text-gray-700 space-y-4">
                        <p>TOPSIS (Technique for Order Preference by Similarity to Ideal Solution) adalah metode pengambilan keputusan multi-kriteria yang diperkenalkan oleh Hwang dan Yoon pada tahun 1981. Metode ini didasarkan pada konsep bahwa alternatif terbaik harus memiliki jarak terdekat dari solusi ideal positif dan jarak terjauh dari solusi ideal negatif.</p>

                        <p>Dalam konteks <strong>PhoneMatch</strong>, TOPSIS membantu menemukan handphone yang paling mendekati preferensi Anda dengan mempertimbangkan berbagai kriteria seperti harga, kamera, baterai, RAM, prosesor, dan lainnya secara simultan.</p>

                        <div class="bg-indigo-50 p-4 rounded-lg border-l-4 border-indigo-500 my-6">
                            <h4 class="font-medium text-indigo-800 mb-2">Keunggulan TOPSIS:</h4>
                            <ul class="list-disc list-inside space-y-1 text-gray-700">
                                <li>Konsep yang rasional dan mudah dipahami</li>
                                <li>Proses perhitungan yang sederhana</li>
                                <li>Mampu mengukur kinerja relatif dari alternatif-alternatif keputusan</li>
                                <li>Mempertimbangkan solusi ideal positif dan negatif secara bersamaan</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- How TOPSIS Works -->
                <div class="mb-12">
                    <div class="flex items-center mb-4">
                        <div class="bg-green-100 rounded-full p-2 mr-3">
                            <i class="fas fa-cogs text-green-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Cara Kerja TOPSIS</h2>
                    </div>

                    <div class="pl-12">
                        <p class="text-gray-700 mb-6">Metode TOPSIS mengikuti serangkaian langkah sistematis untuk memberikan peringkat alternatif berdasarkan kriteria yang telah ditentukan:</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="bg-white p-5 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-shadow">
                                <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mb-4">
                                    <span class="text-blue-700 font-bold">1</span>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-2">Membangun Matriks Keputusan</h3>
                                <p class="text-gray-600 text-sm">Menyusun matriks yang berisi nilai-nilai dari setiap alternatif (handphone) untuk setiap kriteria (spesifikasi).</p>
                            </div>

                            <div class="bg-white p-5 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-shadow">
                                <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mb-4">
                                    <span class="text-blue-700 font-bold">2</span>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-2">Normalisasi Matriks Keputusan</h3>
                                <p class="text-gray-600 text-sm">Mengubah dimensi berbagai kriteria menjadi nilai yang tidak berdimensi untuk perbandingan yang adil.</p>
                            </div>

                            <div class="bg-white p-5 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-shadow">
                                <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mb-4">
                                    <span class="text-blue-700 font-bold">3</span>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-2">Matriks Keputusan Ternormalisasi Terbobot</h3>
                                <p class="text-gray-600 text-sm">Menerapkan bobot kriteria yang ditentukan pengguna pada matriks yang telah dinormalisasi.</p>
                            </div>

                            <div class="bg-white p-5 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-shadow">
                                <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mb-4">
                                    <span class="text-blue-700 font-bold">4</span>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-2">Solusi Ideal Positif & Negatif</h3>
                                <p class="text-gray-600 text-sm">Mengidentifikasi nilai terbaik dan terburuk untuk setiap kriteria dari seluruh alternatif.</p>
                            </div>

                            <div class="bg-white p-5 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-shadow">
                                <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mb-4">
                                    <span class="text-blue-700 font-bold">5</span>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-2">Perhitungan Jarak ke Solusi Ideal</h3>
                                <p class="text-gray-600 text-sm">Menghitung jarak Euclidean dari setiap alternatif ke solusi ideal positif dan negatif.</p>
                            </div>

                            <div class="bg-white p-5 rounded-xl shadow-md border border-gray-100 hover:shadow-lg transition-shadow">
                                <div class="rounded-full bg-blue-100 w-12 h-12 flex items-center justify-center mb-4">
                                    <span class="text-blue-700 font-bold">6</span>
                                </div>
                                <h3 class="font-semibold text-gray-800 mb-2">Perhitungan Skor Preferensi</h3>
                                <p class="text-gray-600 text-sm">Menghitung nilai preferensi untuk setiap alternatif berdasarkan kedekatan relatif ke solusi ideal.</p>
                            </div>
                        </div>

                        <!-- Mathematical Representation -->
                        <div class="bg-gray-50 rounded-xl p-6 mb-8 border border-gray-200">
                            <h3 class="font-semibold text-gray-800 mb-4">Representasi Matematis</h3>

                            <div class="space-y-4">
                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">1. Normalisasi Matriks</h4>
                                    <div class="bg-white p-3 rounded border border-gray-200 overflow-x-auto">
                                        <img src="https://kantinit.com/wp-content/uploads/2022/12/rumus-topsis-300x233.png" alt="normalisasi matriks" class="w-contain mb-2">
                                        {{-- <div class="text-center font-mono">
                                            r<sub>ij</sub> = x<sub>ij</sub> / √(Σ x<sub>ij</sub><sup>2</sup>)
                                        </div> --}}
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">2. Matriks Ternormalisasi Terbobot</h4>
                                    <div class="bg-white p-3 rounded border border-gray-200 overflow-x-auto">
                                        <img src="https://kantinit.com/wp-content/uploads/2022/12/rumus-topsis-bobot-ternormalisasi-300x158.png" alt="matriks ternormalisasi terbobot" class="w-contain mb-2">
                                        {{-- <div class="text-center font-mono">
                                            v<sub>ij</sub> = w<sub>j</sub> × r<sub>ij</sub>
                                        </div> --}}
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">3. Perhitungan Solusi Ideal</h4>
                                    <div class="bg-white p-3 rounded border border-gray-200 overflow-x-auto">
                                        <img src="https://kantinit.com/wp-content/uploads/2022/12/rumus-topsis-bobot-ternormalisasi-300x158.png" alt="perhitungan solusi ideal" class="w-contain mb-2">
                                        {{-- <div class="text-center font-mono mb-2">
                                            A<sup>+</sup> = {v<sub>1</sub><sup>+</sup>, v<sub>2</sub><sup>+</sup>, ..., v<sub>n</sub><sup>+</sup>}
                                        </div>
                                        <div class="text-center font-mono">
                                            A<sup>-</sup> = {v<sub>1</sub><sup>-</sup>, v<sub>2</sub><sup>-</sup>, ..., v<sub>n</sub><sup>-</sup>}
                                        </div> --}}
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">4. Jarak ke Solusi Ideal</h4>
                                    <div class="bg-white p-3 rounded border border-gray-200 overflow-x-auto">
                                        <img src="https://kantinit.com/wp-content/uploads/2022/12/rumus-topsis-step-6-ideal-postitif-300x134.png" alt="jarak ke solusi ideal positif" class="w-contain mb-2">
                                        <img src="https://kantinit.com/wp-content/uploads/2022/12/rumus-topsis-step-6-ideal-postitif-300x134.png" alt="jarak ke solusi ideal negatif" class="w-contain mb-2">
                                        {{-- <div class="text-center font-mono mb-2">
                                            S<sub>i</sub><sup>+</sup> = √[Σ(v<sub>ij</sub> - v<sub>j</sub><sup>+</sup>)<sup>2</sup>]
                                        </div>
                                        <div class="text-center font-mono">
                                            S<sub>i</sub><sup>-</sup> = √[Σ(v<sub>ij</sub> - v<sub>j</sub><sup>-</sup>)<sup>2</sup>]
                                        </div> --}}
                                    </div>
                                </div>

                                <div>
                                    <h4 class="font-medium text-gray-700 mb-2">5. Perhitungan Skor Preferensi</h4>
                                    <div class="bg-white p-3 rounded border border-gray-200 overflow-x-auto">
                                        <img src="https://kantinit.com/wp-content/uploads/2022/12/rumus-topsis-step-6-300x167.png" alt="perhitungan skor preferensi" class="w-contain mb-2">
                                        {{-- <div class="text-center font-mono">
                                            C<sub>i</sub> = S<sub>i</sub><sup>-</sup> / (S<sub>i</sub><sup>+</sup> + S<sub>i</sub><sup>-</sup>)
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- TOPSIS in PhoneMatch -->
                <div class="mb-12">
                    <div class="flex items-center mb-4">
                        <div class="bg-purple-100 rounded-full p-2 mr-3">
                            <i class="fas fa-mobile-alt text-purple-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">TOPSIS dalam PhoneMatch</h2>
                    </div>

                    <div class="pl-12 text-gray-700 space-y-4">
                        <p>Di PhoneMatch, kami mengimplementasikan TOPSIS untuk membantu Anda menemukan handphone yang paling sesuai dengan preferensi Anda:</p>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-6">
                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                                <div class="text-indigo-500 mb-2"><i class="fas fa-sliders-h text-xl"></i></div>
                                <h3 class="font-medium text-gray-800 mb-1">Input Preferensi</h3>
                                <p class="text-sm text-gray-600">Anda memberikan bobot untuk kriteria yang penting bagi Anda (kamera, baterai, performa, dll).</p>
                            </div>

                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                                <div class="text-indigo-500 mb-2"><i class="fas fa-calculator text-xl"></i></div>
                                <h3 class="font-medium text-gray-800 mb-1">Kalkulasi TOPSIS</h3>
                                <p class="text-sm text-gray-600">Sistem kami menerapkan algoritma TOPSIS pada database handphone kami.</p>
                            </div>

                            <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
                                <div class="text-indigo-500 mb-2"><i class="fas fa-list-ol text-xl"></i></div>
                                <h3 class="font-medium text-gray-800 mb-1">Hasil Terurut</h3>
                                <p class="text-sm text-gray-600">Anda mendapatkan daftar handphone yang diurutkan berdasarkan kesesuaian dengan preferensi Anda.</p>
                            </div>
                        </div>

                        <div class="bg-gradient-to-r from-indigo-50 to-purple-50 p-6 rounded-xl border border-indigo-100 my-8">
                            <h3 class="font-semibold text-gray-800 mb-3">Kasus Penggunaan Praktis</h3>

                            <div class="space-y-4">
                                <div class="flex">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="rounded-full bg-green-100 w-7 h-7 flex items-center justify-center">
                                            <i class="fas fa-camera text-green-600 text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="font-medium text-gray-800">Fotografer Mobile</h4>
                                        <p class="text-sm text-gray-600">Jika Anda mengutamakan kualitas kamera, beri bobot tinggi pada kriteria kamera.</p>
                                    </div>
                                </div>

                                <div class="flex">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="rounded-full bg-blue-100 w-7 h-7 flex items-center justify-center">
                                            <i class="fas fa-gamepad text-blue-600 text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="font-medium text-gray-800">Gamer Mobile</h4>
                                        <p class="text-sm text-gray-600">Jika Anda suka bermain game, beri bobot tinggi pada performa dan RAM.</p>
                                    </div>
                                </div>

                                <div class="flex">
                                    <div class="flex-shrink-0 mt-1">
                                        <div class="rounded-full bg-yellow-100 w-7 h-7 flex items-center justify-center">
                                            <i class="fas fa-battery-full text-yellow-600 text-xs"></i>
                                        </div>
                                    </div>
                                    <div class="ml-3">
                                        <h4 class="font-medium text-gray-800">Pengguna Intensif</h4>
                                        <p class="text-sm text-gray-600">Jika daya tahan baterai penting, berikan bobot tinggi pada baterai.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Applications of TOPSIS -->
                <div class="mb-12">
                    <div class="flex items-center mb-4">
                        <div class="bg-orange-100 rounded-full p-2 mr-3">
                            <i class="fas fa-briefcase text-orange-600 text-xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Aplikasi TOPSIS</h2>
                    </div>

                    <div class="pl-12">
                        <p class="text-gray-700 mb-6">Metode TOPSIS tidak hanya digunakan dalam pemilihan handphone, tetapi juga di berbagai bidang lain yang memerlukan pengambilan keputusan multi-kriteria:</p>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white p-5 rounded-lg shadow border-l-4 border-blue-500">
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-building text-blue-500 mr-3"></i>
                                    <h3 class="font-semibold text-gray-800">Manajemen & Bisnis</h3>
                                </div>
                                <ul class="text-gray-600 text-sm space-y-2 ml-7">
                                    <li>Pemilihan lokasi bisnis</li>
                                    <li>Evaluasi kinerja supplier</li>
                                    <li>Rekrutmen & seleksi karyawan</li>
                                    <li>Penilaian risiko investasi</li>
                                </ul>
                            </div>

                            <div class="bg-white p-5 rounded-lg shadow border-l-4 border-green-500">
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-industry text-green-500 mr-3"></i>
                                    <h3 class="font-semibold text-gray-800">Teknik & Manufaktur</h3>
                                </div>
                                <ul class="text-gray-600 text-sm space-y-2 ml-7">
                                    <li>Pemilihan material</li>
                                    <li>Seleksi mesin & peralatan</li>
                                    <li>Optimasi proses produksi</li>
                                    <li>Quality control</li>
                                </ul>
                            </div>

                            <div class="bg-white p-5 rounded-lg shadow border-l-4 border-purple-500">
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-heartbeat text-purple-500 mr-3"></i>
                                    <h3 class="font-semibold text-gray-800">Kesehatan & Medis</h3>
                                </div>
                                <ul class="text-gray-600 text-sm space-y-2 ml-7">
                                    <li>Pemilihan alat medis</li>
                                    <li>Evaluasi metode pengobatan</li>
                                    <li>Penentuan prioritas pasien</li>
                                    <li>Alokasi sumber daya medis</li>
                                </ul>
                            </div>

                            <div class="bg-white p-5 rounded-lg shadow border-l-4 border-red-500">
                                <div class="flex items-center mb-3">
                                    <i class="fas fa-city text-red-500 mr-3"></i>
                                    <h3 class="font-semibold text-gray-800">Perencanaan & Kebijakan</h3>
                                </div>
                                <ul class="text-gray-600 text-sm space-y-2 ml-7">
                                    <li>Perencanaan kota & transportasi</li>
                                    <li>Evaluasi kebijakan publik</li>
                                    <li>Manajemen lingkungan</li>
                                    <li>Distribusi dana publik</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Summary -->
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Ringkasan</h2>

                    <div class="text-gray-700 space-y-3">
                        <p>TOPSIS adalah metode yang powerful dan fleksibel untuk mengambil keputusan berdasarkan beberapa kriteria. Dalam PhoneMatch, TOPSIS membantu Anda menemukan handphone yang paling sesuai dengan kebutuhan Anda dengan:</p>

                        <ol class="list-decimal list-inside space-y-2 pl-2">
                            <li>Mempertimbangkan semua kriteria secara simultan</li>
                            <li>Memberikan bobot sesuai tingkat kepentingan masing-masing kriteria</li>
                            <li>Mengidentifikasi alternatif terbaik berdasarkan jarak ke solusi ideal</li>
                            <li>Memberikan skor preferensi yang jelas dan terukur</li>
                        </ol>

                        <div class="mt-6 text-center">
                            <a href="{{ route('recommendation') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2 px-6 rounded-lg shadow-md transition-colors inline-flex items-center">
                                <i class="fas fa-search mr-2"></i> Coba Cari Rekomendasi Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>

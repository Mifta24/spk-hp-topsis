
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Rekomendasi Handphone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white shadow-md">
            <div class="container mx-auto px-4 py-6">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold">PhoneMatch</h1>
                        <p class="text-blue-100">Sistem Rekomendasi Handphone dengan Metode TOPSIS</p>
                    </div>
                    <div class="hidden md:block">
                        <img src="https://cdn-icons-png.flaticon.com/512/9492/9492929.png" alt="Phone Icon" class="h-16">
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow container mx-auto px-4 py-8">
            <div class="max-w-4xl mx-auto">
                <!-- Introduction -->
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-bold text-gray-800 mb-3">Temukan Handphone Sesuai Kebutuhan Anda</h2>
                    <p class="text-gray-600">Sistem ini akan membantu Anda menemukan handphone yang paling sesuai berdasarkan preferensi dan budget yang Anda miliki.</p>
                </div>

                <!-- Card -->
                <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
                    <div class="flex items-center mb-6">
                        <div class="rounded-full bg-indigo-100 p-3 mr-4">
                            <i class="fas fa-mobile-alt text-indigo-600 text-xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800">Isi Kriteria Pencarian</h3>
                    </div>

                    <form method="GET" action="{{ route('recommendation') }}" class="space-y-6">
                        <!-- Budget Range -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Harga Minimum</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" name="min_price" class="pl-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 p-2.5 border" placeholder="1000000" required min="0">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Harga Maksimum</label>
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">Rp</span>
                                    </div>
                                    <input type="number" name="max_price" class="pl-10 focus:ring-indigo-500 focus:border-indigo-500 block w-full rounded-md border-gray-300 p-2.5 border" placeholder="5000000" required min="0">
                                </div>
                            </div>
                        </div>

                        <!-- Criteria Section -->
                        <div class="mt-6">
                            <h4 class="font-medium text-gray-800 mb-3">Seberapa penting kriteria berikut bagi Anda?</h4>
                            <p class="text-sm text-gray-500 mb-4">Pilih tingkat kepentingan untuk setiap kriteria handphone.</p>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- Camera -->
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:border-indigo-300 transition duration-300">
                                    <div class="flex items-center mb-3">
                                        <div class="rounded-full bg-yellow-100 p-2 mr-3">
                                            <i class="fas fa-camera text-yellow-600"></i>
                                        </div>
                                        <label class="font-medium text-gray-700">Kamera</label>
                                    </div>
                                    <select name="weights[camera]" class="block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="0.5">Sangat Penting</option>
                                        <option value="0.3">Penting</option>
                                        <option value="0.2" selected>Biasa Saja</option>
                                    </select>
                                </div>

                                <!-- Battery -->
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:border-indigo-300 transition duration-300">
                                    <div class="flex items-center mb-3">
                                        <div class="rounded-full bg-green-100 p-2 mr-3">
                                            <i class="fas fa-battery-full text-green-600"></i>
                                        </div>
                                        <label class="font-medium text-gray-700">Baterai</label>
                                    </div>
                                    <select name="weights[battery]" class="block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="0.5">Sangat Penting</option>
                                        <option value="0.3" selected>Penting</option>
                                        <option value="0.2">Biasa Saja</option>
                                    </select>
                                </div>

                                <!-- RAM -->
                                <div class="bg-gray-50 rounded-lg p-4 border border-gray-200 hover:border-indigo-300 transition duration-300">
                                    <div class="flex items-center mb-3">
                                        <div class="rounded-full bg-purple-100 p-2 mr-3">
                                            <i class="fas fa-memory text-purple-600"></i>
                                        </div>
                                        <label class="font-medium text-gray-700">RAM</label>
                                    </div>
                                    <select name="weights[ram]" class="block w-full p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="0.5">Sangat Penting</option>
                                        <option value="0.3">Penting</option>
                                        <option value="0.2" selected>Biasa Saja</option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-sm text-gray-500 mt-4">
                                <p><i class="fas fa-info-circle text-blue-500 mr-1"></i> Total bobot akan otomatis disesuaikan menjadi 1 saat proses perhitungan.</p>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-8 flex justify-center">
                            <button type="submit" class="bg-gradient-to-r from-blue-600 to-indigo-700 hover:from-blue-700 hover:to-indigo-800 text-white font-medium py-3 px-6 rounded-lg shadow-md flex items-center transition duration-300">
                                <i class="fas fa-search mr-2"></i> Cari Rekomendasi
                            </button>
                        </div>
                    </form>
                </div>

                <!-- How it Works -->
                <div class="mt-12">
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
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-6">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="mb-4 md:mb-0">&copy; {{ date('Y') }} SPK Handphone TOPSIS. All rights reserved.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

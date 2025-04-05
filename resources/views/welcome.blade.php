<x-layout>
    <!-- Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-br from-indigo-900 to-purple-800 rounded-2xl shadow-xl mb-12">
        <div class="absolute inset-0 opacity-20">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 left-0">
                <path fill="rgba(255,255,255,0.2)" fill-opacity="1" d="M0,192L48,165.3C96,139,192,85,288,74.7C384,64,480,96,576,133.3C672,171,768,213,864,213.3C960,213,1056,171,1152,165.3C1248,160,1344,192,1392,208L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
        <div class="relative px-6 py-12 md:py-16 md:px-12 text-center md:text-left flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 md:pr-10 mb-8 md:mb-0">
                <h1 class="text-3xl md:text-4xl font-bold text-white leading-tight mb-4">
                    Temukan Handphone Sempurna untuk Kebutuhan Anda
                </h1>
                <p class="text-indigo-100 text-lg mb-8 max-w-lg">
                    Sistem rekomendasi handphone menggunakan metode TOPSIS untuk memberikan pilihan terbaik berdasarkan preferensi Anda.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                    <a href="{{ route('recommendation') }}" class="bg-white hover:bg-gray-100 text-indigo-700 font-medium py-3 px-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300 flex items-center justify-center">
                        <i class="fas fa-search mr-2"></i> Cari Rekomendasi
                    </a>
                    <a href="{{ route('handphone.index') }}" class="bg-transparent hover:bg-indigo-700 text-white border border-white py-3 px-6 rounded-lg flex items-center justify-center hover:shadow-lg transition duration-300">
                        <i class="fas fa-mobile-alt mr-2"></i> Lihat Daftar Handphone
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 flex justify-center">
                <div class="relative w-64 h-72">
                    <!-- Phone mockup -->
                    <div class="absolute inset-0 z-10 bg-black rounded-[40px] shadow-2xl overflow-hidden border-[8px] border-gray-800">
                        <img src="https://source.unsplash.com/xsGxhtAsfSA/800x1600" alt="Phone" class="object-cover h-full w-full" />
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -right-16 -bottom-10 w-48 h-48 bg-pink-500 rounded-full opacity-20 blur-2xl"></div>
                    <div class="absolute -left-12 -top-10 w-40 h-40 bg-blue-500 rounded-full opacity-20 blur-2xl"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Cards -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Kategori Populer</h2>
            <a href="{{ route('handphone.index') }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('handphone.index', ['price_range' => 'premium']) }}" class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all p-5 text-white text-center">
                <i class="fas fa-crown text-3xl mb-2 text-yellow-300"></i>
                <h3 class="font-semibold">Premium</h3>
                <p class="text-xs text-blue-100">High-end devices</p>
            </a>

            <a href="{{ route('handphone.index', ['feature' => 'camera']) }}" class="bg-gradient-to-br from-violet-500 to-purple-600 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all p-5 text-white text-center">
                <i class="fas fa-camera text-3xl mb-2 text-purple-200"></i>
                <h3 class="font-semibold">Kamera Bagus</h3>
                <p class="text-xs text-purple-100">Photography focus</p>
            </a>

            <a href="{{ route('handphone.index', ['feature' => 'battery']) }}" class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all p-5 text-white text-center">
                <i class="fas fa-battery-full text-3xl mb-2 text-green-200"></i>
                <h3 class="font-semibold">Baterai Awet</h3>
                <p class="text-xs text-green-100">Long-lasting power</p>
            </a>

            <a href="{{ route('handphone.index', ['price_range' => 'budget']) }}" class="bg-gradient-to-br from-orange-500 to-red-600 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all p-5 text-white text-center">
                <i class="fas fa-piggy-bank text-3xl mb-2 text-yellow-200"></i>
                <h3 class="font-semibold">Budget</h3>
                <p class="text-xs text-red-100">Best value phones</p>
            </a>
        </div>
    </div>

    <!-- Handphone Slider -->
    <div class="mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">Handphone Populer</h2>
            <div class="flex space-x-2">
                <button id="prev-slide" class="bg-gray-200 hover:bg-gray-300 text-gray-600 rounded-full w-8 h-8 flex items-center justify-center focus:outline-none transition">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button id="next-slide" class="bg-gray-200 hover:bg-gray-300 text-gray-600 rounded-full w-8 h-8 flex items-center justify-center focus:outline-none transition">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>

        @php
            $topHandphones = App\Models\Handphone::with('specification')
                ->orderBy('camera', 'desc')
                ->orderBy('battery', 'desc')
                ->orderBy('ram', 'desc')
                ->limit(10)
                ->get();
        @endphp

        <div class="relative">
            <div id="phone-slider" class="overflow-hidden">
                <div id="slider-track" class="flex transition-transform duration-500 ease-out space-x-4" style="transform: translateX(0);">
                    @foreach($topHandphones as $phone)
                    <div class="min-w-[280px] md:min-w-[320px] flex-shrink-0">
                        <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 h-full border border-gray-100">
                            <div class="relative">
                                @if($phone->specification && $phone->specification->image)
                                    <div class="w-full h-52 bg-gray-50 flex items-center justify-center p-4">
                                        <img src="{{ $phone->specification->image }}" alt="{{ $phone->name }}"
                                            class="w-auto h-auto max-h-44 max-w-[90%] object-contain">
                                    </div>
                                @else
                                    <div class="w-full h-52 bg-gray-50 flex items-center justify-center">
                                        <span class="text-gray-400"><i class="fas fa-mobile-alt text-5xl"></i></span>
                                    </div>
                                @endif

                                <div class="absolute top-2 right-2 bg-gradient-to-r from-indigo-600 to-indigo-800 text-white text-xs py-1 px-3 rounded-full font-medium">
                                    {{ $phone->category }}
                                </div>
                            </div>
                            <div class="p-5">
                                <div class="mb-2">
                                    <h4 class="font-semibold text-lg text-gray-800 line-clamp-1">{{ $phone->name }}</h4>
                                    <p class="text-gray-700 font-medium">Rp{{ number_format($phone->price, 0, ',', '.') }}</p>
                                </div>

                                <div class="flex flex-wrap gap-1 mb-4">
                                    <span class="inline-flex items-center bg-green-50 text-green-700 text-xs px-2 py-1 rounded-full">
                                        <i class="fas fa-camera mr-1"></i> {{ $phone->camera }}/10
                                    </span>
                                    <span class="inline-flex items-center bg-yellow-50 text-yellow-700 text-xs px-2 py-1 rounded-full">
                                        <i class="fas fa-battery-full mr-1"></i> {{ $phone->battery }}/10
                                    </span>
                                    <span class="inline-flex items-center bg-blue-50 text-blue-700 text-xs px-2 py-1 rounded-full">
                                        <i class="fas fa-memory mr-1"></i> {{ $phone->ram }}/10
                                    </span>
                                </div>

                                <a href="{{ route('handphone.detail', $phone->id) }}" class="mt-2 block text-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium py-2 px-3 rounded-lg transition">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Mobile Scroll Indicator -->
            <div class="mt-4 flex justify-center md:hidden">
                <div class="flex space-x-1">
                    @foreach($topHandphones as $index => $phone)
                        <button class="scroll-dot w-2 h-2 rounded-full bg-gray-300 focus:outline-none" data-index="{{ $index }}"></button>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Redirect --}}
        <div class="text-center mt-8">
            <a href="{{ route('handphone.index') }}"
                class="text-indigo-600 hover:text-indigo-800 font-medium inline-flex items-center">
                Temukan lebih banyak handphone <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>

    <!-- How it Works -->
    <div class="mt-16">
        <h3 class="text-xl font-bold text-gray-800 text-center mb-6">Bagaimana Sistem Ini Bekerja?</h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg p-6 shadow-md border border-gray-100 text-center relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-12 h-12 bg-indigo-100 rounded-full"></div>
                <div class="rounded-full bg-indigo-100 w-16 h-16 flex items-center justify-center mx-auto mb-4 relative">
                    <i class="fas fa-sliders-h text-indigo-600 text-xl"></i>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Masukkan Kriteria</h4>
                <p class="text-gray-600 text-sm">Tentukan rentang harga dan tingkat kepentingan untuk setiap kriteria yang Anda inginkan</p>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-md border border-gray-100 text-center relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-12 h-12 bg-purple-100 rounded-full"></div>
                <div class="rounded-full bg-purple-100 w-16 h-16 flex items-center justify-center mx-auto mb-4 relative">
                    <i class="fas fa-calculator text-purple-600 text-xl"></i>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Analisis TOPSIS</h4>
                <p class="text-gray-600 text-sm">Sistem akan melakukan perhitungan dengan metode TOPSIS untuk memberikan peringkat handphone</p>
            </div>

            <div class="bg-white rounded-lg p-6 shadow-md border border-gray-100 text-center relative overflow-hidden">
                <div class="absolute -right-6 -top-6 w-12 h-12 bg-blue-100 rounded-full"></div>
                <div class="rounded-full bg-blue-100 w-16 h-16 flex items-center justify-center mx-auto mb-4 relative">
                    <i class="fas fa-check-circle text-blue-600 text-xl"></i>
                </div>
                <h4 class="font-semibold text-gray-800 mb-2">Dapatkan Rekomendasi</h4>
                <p class="text-gray-600 text-sm">Lihat daftar handphone yang paling sesuai dengan kriteria yang Anda tentukan</p>
            </div>
        </div>
    </div>

    <!-- Popular Search Section -->
    <div class="mt-16 bg-gradient-to-r from-indigo-50 to-blue-50 rounded-xl p-6 shadow-sm">
        <div class="text-center mb-6">
            <h3 class="text-xl font-bold text-gray-800 mb-2">Pencarian Populer</h3>
            <p class="text-gray-600">Rekomendasi handphone berdasarkan kebutuhan spesifik</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('recommendation', ['camera' => 5, 'battery' => 3, 'ram' => 4, 'processor' => 5, 'design' => 4, 'storage' => 3]) }}"
               class="bg-white rounded-lg p-4 shadow-sm hover:shadow-md transition flex flex-col items-center text-center">
                <div class="rounded-full bg-red-50 p-3 mb-3">
                    <i class="fas fa-camera text-red-500"></i>
                </div>
                <h4 class="font-medium text-gray-800 text-sm">Photography</h4>
            </a>

            <a href="{{ route('recommendation', ['camera' => 3, 'battery' => 3, 'ram' => 5, 'processor' => 5, 'design' => 3, 'storage' => 4]) }}"
               class="bg-white rounded-lg p-4 shadow-sm hover:shadow-md transition flex flex-col items-center text-center">
                <div class="rounded-full bg-purple-50 p-3 mb-3">
                    <i class="fas fa-gamepad text-purple-500"></i>
                </div>
                <h4 class="font-medium text-gray-800 text-sm">Gaming</h4>
            </a>

            <a href="{{ route('recommendation', ['camera' => 3, 'battery' => 5, 'ram' => 3, 'processor' => 3, 'design' => 3, 'storage' => 3]) }}"
               class="bg-white rounded-lg p-4 shadow-sm hover:shadow-md transition flex flex-col items-center text-center">
                <div class="rounded-full bg-green-50 p-3 mb-3">
                    <i class="fas fa-battery-full text-green-500"></i>
                </div>
                <h4 class="font-medium text-gray-800 text-sm">Baterai Tahan Lama</h4>
            </a>

            <a href="{{ route('recommendation', ['camera' => 3, 'battery' => 3, 'ram' => 3, 'processor' => 3, 'design' => 3, 'storage' => 3, 'price_max' => 3000000]) }}"
               class="bg-white rounded-lg p-4 shadow-sm hover:shadow-md transition flex flex-col items-center text-center">
                <div class="rounded-full bg-blue-50 p-3 mb-3">
                    <i class="fas fa-piggy-bank text-blue-500"></i>
                </div>
                <h4 class="font-medium text-gray-800 text-sm">Budget Friendly</h4>
            </a>
        </div>
    </div>

    <!-- Add JavaScript for slider -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Slider functionality
            const slider = document.getElementById('slider-track');
            const phoneSlider = document.getElementById('phone-slider');
            const prevButton = document.getElementById('prev-slide');
            const nextButton = document.getElementById('next-slide');
            const slides = slider.children;
            const scrollDots = document.querySelectorAll('.scroll-dot');

            let currentIndex = 0;
            let slideWidth = 0;
            let maxIndex = 0;

            // Initialize slider
            function initSlider() {
                // Calculate slide width including margin
                if (slides.length > 0) {
                    slideWidth = slides[0].offsetWidth + 16; // 16px is the margin-right
                }

                // Calculate how many slides can be visible at once
                const sliderWidth = phoneSlider.offsetWidth;
                const visibleSlides = Math.floor(sliderWidth / slideWidth);
                maxIndex = Math.max(0, slides.length - visibleSlides);

                // Update active dot
                updateActiveDot();
            }

            // Update the active dot
            function updateActiveDot() {
                scrollDots.forEach((dot, index) => {
                    if (index === currentIndex) {
                        dot.classList.add('bg-indigo-600');
                        dot.classList.remove('bg-gray-300');
                    } else {
                        dot.classList.remove('bg-indigo-600');
                        dot.classList.add('bg-gray-300');
                    }
                });
            }

            // Slide to specific index
            function slideTo(index) {
                currentIndex = Math.max(0, Math.min(index, maxIndex));
                slider.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
                updateActiveDot();
            }

            // Initialize
            initSlider();

            // Handle window resize
            window.addEventListener('resize', initSlider);

            // Next button
            nextButton.addEventListener('click', () => {
                slideTo(currentIndex + 1);
            });

            // Previous button
            prevButton.addEventListener('click', () => {
                slideTo(currentIndex - 1);
            });

            // Dot navigation
            scrollDots.forEach((dot, index) => {
                dot.addEventListener('click', () => {
                    slideTo(index);
                });
            });

            // Touch events for mobile swipe
            let touchStartX = 0;
            let touchEndX = 0;

            phoneSlider.addEventListener('touchstart', (e) => {
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            phoneSlider.addEventListener('touchend', (e) => {
                touchEndX = e.changedTouches[0].screenX;
                handleSwipe();
            }, { passive: true });

            function handleSwipe() {
                const swipeThreshold = 50;
                if (touchEndX < touchStartX - swipeThreshold) {
                    slideTo(currentIndex + 1); // Swipe left, next slide
                } else if (touchEndX > touchStartX + swipeThreshold) {
                    slideTo(currentIndex - 1); // Swipe right, previous slide
                }
            }
        });
    </script>
</x-layout>

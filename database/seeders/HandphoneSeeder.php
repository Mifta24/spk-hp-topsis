<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Handphone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class HandphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Path to JSON file - adjust this to where you saved the file
        $jsonPath = Storage::path('devices.json');

        // If the file doesn't exist in storage, try database path
        if (!file_exists($jsonPath)) {
            $jsonPath = database_path('json/devices.json');
        }

        // If the file doesn't exist in either location, try seeders folder
        if (!file_exists($jsonPath)) {
            $jsonPath = database_path('seeders/devices.json');
        }

        // If the file doesn't exist in either location, exit
        if (!file_exists($jsonPath)) {
            $this->command->error('JSON file not found. Make sure to place devices.json in storage/app/ or database/json/ or database/seeders/');
            return;
        }


        $jsonContent = file_get_contents($jsonPath);
        $devicesData = json_decode($jsonContent, true);

        if (!isset($devicesData['RECORDS']) || !is_array($devicesData['RECORDS'])) {
            $this->command->error('Invalid JSON format. Expected "RECORDS" key with an array.');
            return;
        }

        // Handphone data dengan brand_id terisi
        $handphones = [
            [
                'brand_id' => $this->getBrandIdByName('Samsung'),
                'name' => 'Samsung Galaxy S23 Ultra',
                'price' => 17999000,
                'camera' => 10,
                'battery' => 9,
                'ram' => 10,
                'prosessor' => 10,
                'design' => 9,
                'storage' => 10,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Apple'),
                'name' => 'iPhone 15 Pro Max',
                'price' => 19999000,
                'camera' => 9,
                'battery' => 8,
                'ram' => 9,
                'prosessor' => 10,
                'design' => 10,
                'storage' => 9,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Google'),
                'name' => 'Google Pixel 7 Pro',
                'price' => 12999000,
                'camera' => 10,
                'battery' => 8,
                'ram' => 8,
                'prosessor' => 9,
                'design' => 8,
                'storage' => 8,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Xiaomi'),
                'name' => 'Xiaomi 13 Ultra',
                'price' => 14999000,
                'camera' => 10,
                'battery' => 9,
                'ram' => 9,
                'prosessor' => 10,
                'design' => 8,
                'storage' => 9,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Samsung'),
                'name' => 'Samsung Galaxy A54',
                'price' => 5999000,
                'camera' => 8,
                'battery' => 9,
                'ram' => 7,
                'prosessor' => 7,
                'design' => 8,
                'storage' => 7,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Xiaomi'),
                'name' => 'Xiaomi Redmi Note 12 Pro',
                'price' => 3999000,
                'camera' => 8,
                'battery' => 9,
                'ram' => 7,
                'prosessor' => 7,
                'design' => 7,
                'storage' => 7,
            ],
            [
                'brand_id' => $this->getBrandIdByName('OnePlus'),
                'name' => 'OnePlus 11',
                'price' => 9999000,
                'camera' => 9,
                'battery' => 8,
                'ram' => 9,
                'prosessor' => 10,
                'design' => 8,
                'storage' => 9,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Nothing'),
                'name' => 'Nothing Phone 2',
                'price' => 7999000,
                'camera' => 8,
                'battery' => 8,
                'ram' => 8,
                'prosessor' => 8,
                'design' => 10,
                'storage' => 8,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Apple'),
                'name' => 'iPhone 14',
                'price' => 12999000,
                'camera' => 8,
                'battery' => 7,
                'ram' => 8,
                'prosessor' => 9,
                'design' => 8,
                'storage' => 8,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Realme'),
                'name' => 'Realme GT 5 Pro',
                'price' => 8999000,
                'camera' => 9,
                'battery' => 9,
                'ram' => 9,
                'prosessor' => 10,
                'design' => 8,
                'storage' => 8,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Xiaomi'),
                'name' => 'Xiaomi Poco F5',
                'price' => 4999000,
                'camera' => 7,
                'battery' => 9,
                'ram' => 8,
                'prosessor' => 8,
                'design' => 7,
                'storage' => 7,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Samsung'),
                'name' => 'Samsung Galaxy S23 FE',
                'price' => 8999000,
                'camera' => 8,
                'battery' => 8,
                'ram' => 8,
                'prosessor' => 9,
                'design' => 8,
                'storage' => 8,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Xiaomi'),
                'name' => 'Xiaomi Redmi Note 12',
                'price' => 2499000,
                'camera' => 7,
                'battery' => 9,
                'ram' => 6,
                'prosessor' => 6,
                'design' => 7,
                'storage' => 6,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Samsung'),
                'name' => 'Samsung Galaxy A34',
                'price' => 4299000,
                'camera' => 7,
                'battery' => 9,
                'ram' => 7,
                'prosessor' => 7,
                'design' => 7,
                'storage' => 7,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Motorola'),
                'name' => 'Motorola Edge 40',
                'price' => 4999000,
                'camera' => 8,
                'battery' => 8,
                'ram' => 8,
                'prosessor' => 7,
                'design' => 8,
                'storage' => 8,
            ],
            [
                'brand_id' => $this->getBrandIdByName('OPPO'),
                'name' => 'Oppo Reno 10',
                'price' => 5699000,
                'camera' => 8,
                'battery' => 8,
                'ram' => 8,
                'prosessor' => 7,
                'design' => 9,
                'storage' => 7,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Vivo'),
                'name' => 'Vivo V27',
                'price' => 5499000,
                'camera' => 9,
                'battery' => 8,
                'ram' => 8,
                'prosessor' => 8,
                'design' => 8,
                'storage' => 8,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Nokia'),
                'name' => 'Nokia G42',
                'price' => 2999000,
                'camera' => 6,
                'battery' => 9,
                'ram' => 6,
                'prosessor' => 6,
                'design' => 7,
                'storage' => 6,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Samsung'),
                'name' => 'Samsung Galaxy A14',
                'price' => 1999000,
                'camera' => 6,
                'battery' => 8,
                'ram' => 5,
                'prosessor' => 5,
                'design' => 6,
                'storage' => 5,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Realme'),
                'name' => 'Realme C55',
                'price' => 2499000,
                'camera' => 7,
                'battery' => 8,
                'ram' => 6,
                'prosessor' => 6,
                'design' => 7,
                'storage' => 6,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Infinix'),
                'name' => 'Infinix Note 30',
                'price' => 2299000,
                'camera' => 6,
                'battery' => 9,
                'ram' => 6,
                'prosessor' => 6,
                'design' => 6,
                'storage' => 6,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Xiaomi'),
                'name' => 'Xiaomi Redmi 12',
                'price' => 1899000,
                'camera' => 6,
                'battery' => 8,
                'ram' => 5,
                'prosessor' => 5,
                'design' => 7,
                'storage' => 5,
            ],
            [
                'brand_id' => $this->getBrandIdByName('Vivo'),
                'name' => 'Vivo Y27',
                'price' => 1999000,
                'camera' => 6,
                'battery' => 9,
                'ram' => 5,
                'prosessor' => 5,
                'design' => 7,
                'storage' => 5,
            ],
            [
                'brand_id' => $this->getBrandIdByName('OPPO'),
                'name' => 'OPPO A78',
                'price' => 2999000,
                'camera' => 7,
                'battery' => 8,
                'ram' => 6,
                'prosessor' => 6,
                'design' => 7,
                'storage' => 6,
            ],

            // Tambahkan data dari JSON jika diperlukan
            // Ini akan menambahkan data tambahan dari JSON devices jika ada
            // Format nama selalu mengambil dari model smartphone yang tersedia di json
        ];

        // Tambahkan data dari JSON
        $jsonHandphones = $this->createHandphonesFromJSON($devicesData['RECORDS']);

        // Menggabungkan dengan data yang sudah ada
        $handphones = array_merge($handphones, $jsonHandphones);

        // Masukkan semua handphone ke database
        $count = 0;
        foreach ($handphones as $hp) {
            if (!empty($hp['brand_id']) && !empty($hp['name'])) {
                // Periksa apakah handphone sudah ada
                $existingHandphone = Handphone::where('name', $hp['name'])->first();

                if (!$existingHandphone) {
                    Handphone::create($hp);
                    $count++;
                }
            }
        }

        $this->command->info("Successfully seeded $count handphones");
    }

    /**
     * Mendapatkan ID brand berdasarkan nama
     * TIDAK membuat brand baru jika tidak ada
     *
     * @param string $name
     * @return int|null
     */
    private function getBrandIdByName(string $name): ?int
    {
        $brand = Brand::where('name', $name)->first();

        if (!$brand) {
            $this->command->warn("Brand '$name' tidak ditemukan di database.");
            return null;
        }

        return $brand->id;
    }

    /**
     * Buat data handphone dari JSON records
     * Menyesuaikan dengan struktur JSON yang sebenarnya
     */
    private function createHandphonesFromJSON(array $records): array
    {
        $additionalHandphones = [];
        $brandMap = $this->getPopularBrands();

        // Pastikan setiap brand memiliki minimal beberapa handphone
        $brandCounts = array_fill_keys(array_values($brandMap), 0);
        $minPerBrand = 10; // Minimal 20 handphone per brand

        // Tentukan berapa banyak handphone yang akan dibuat dari JSON
        $totalToCreate = min(count($records), 200); // Ditingkatkan ke 150 untuk menjamin semua brand masuk

        // Tentukan berapa banyak handphone yang akan dibuat dari JSON
        $totalToCreate = min(count($records), 200); // Maksimal 50 atau sesuai kebutuhan

        for ($i = 0; $i < $totalToCreate; $i++) {
            // Tentukan brand yang akan digunakan untuk handphone ini
            $brandName = '';

            // Cek brand mana yang belum mencapai minimal
            $underrepresentedBrands = [];
            foreach ($brandMap as $key => $name) {
                if ($brandCounts[$name] < $minPerBrand) {
                    $underrepresentedBrands[] = $name;
                }
            }

            if (!empty($underrepresentedBrands)) {
                // Jika masih ada brand yang belum mencapai minimum, pilih dari situ
                $brandName = $underrepresentedBrands[array_rand($underrepresentedBrands)];
            } else {
                // Jika semua brand sudah mencapai minimum, pilih secara acak
                $brandKey = array_rand($brandMap);
                $brandName = $brandMap[$brandKey];
            }

            $brandId = $this->getBrandIdByName($brandName);

            if (!$brandId) {
                continue; // Lewati jika brand tidak ditemukan
            }

            // Update counter untuk brand ini
            $brandCounts[$brandName]++;

            // Generate nama berdasarkan brand dan varian
            $deviceName = $this->generateDeviceName($brandName);

            // Gunakan beberapa properti dari JSON jika ada, atau generate secara acak
            $record = $records[$i % count($records)] ?? []; // Looping jika records habis

            // Gunakan data asli dari JSON jika tersedia atau generate
            $price = isset($record['price']) ? intval(str_replace(['₹', ','], '', $record['price'])) * 190 :
                rand(1499000, 25999000);

            $cameraScore = $this->getRandomScore(6, 10);
            $batteryScore = $this->getRandomScore(6, 10);
            $ramScore = $this->getRandomScore(5, 10);
            $processorScore = $this->getRandomScore(5, 10);
            $designScore = $this->getRandomScore(6, 9);
            $storageScore = $this->getRandomScore(5, 10);

            // Adjust scores based on price range
            if ($price > 10000000) { // Premium phones
                $cameraScore = max($cameraScore, 8);
                $processorScore = max($processorScore, 9);
            } elseif ($price < 3000000) { // Budget phones
                $cameraScore = min($cameraScore + 2, 7);
                $processorScore = min($processorScore + 2, 7);
            }

            // Brand-specific adjustments
            if ($brandName === 'Sony') {
                $cameraScore = max($cameraScore, 9); // Sony terkenal dengan kamera
            } elseif ($brandName === 'Asus' && strpos($deviceName, 'ROG') !== false) {
                $processorScore = max($processorScore, 9); // ROG Phone untuk gaming
                $ramScore = max($ramScore, 9);
            } elseif ($brandName === 'Huawei') {
                $designScore = max($designScore, 8); // Huawei punya design yang bagus
            }

            $additionalHandphones[] = [
                'brand_id' => $brandId,
                'name' => $deviceName,
                'price' => $price,
                'camera' => $cameraScore,
                'battery' => $batteryScore,
                'ram' => $ramScore,
                'prosessor' => $processorScore,
                'design' => $designScore,
                'storage' => $storageScore,
            ];
        }

        // Debug info - tampilkan jumlah handphone per brand
        $this->command->info("Brand distribution in generated data:");
        foreach ($brandCounts as $brand => $count) {
            $this->command->info("- $brand: $count phones");
        }
        return $additionalHandphones;
    }

    /**
     * Generate device name berdasarkan brand
     */
    private function generateDeviceName(string $brandName): string
    {
        $seriesMap = [
            'Samsung' => ['Galaxy A', 'Galaxy M', 'Galaxy F', 'Galaxy S', 'Galaxy Note', 'Galaxy Z Fold', 'Galaxy Z Flip'],
            'Apple' => ['iPhone SE', 'iPhone', 'iPhone Plus', 'iPhone Pro', 'iPhone Pro Max'],
            'Xiaomi' => ['Redmi', 'Redmi Note', 'Poco F', 'Poco X', 'Mi', '13T'],
            'OPPO' => ['A', 'Reno', 'Find X', 'F'],
            'Vivo' => ['V', 'Y', 'X', 'S', 'T'],
            'Google' => ['Pixel', 'Pixel Pro', 'Pixel Fold', 'Pixel A'],
            'OnePlus' => ['Nord', '', 'CE', 'R'],
            'Nothing' => ['Phone', 'Phone CMF'],
            'Realme' => ['C', 'GT', 'GT Neo', 'Narzo'],
            'Motorola' => ['Edge', 'Moto G', 'Moto E', 'Razr'],
            'Nokia' => ['G', 'C', 'X', 'XR'],
            'Infinix' => ['Note', 'Hot', 'Zero', 'Smart'],
            'Huawei' => ['P', 'Mate', 'Nova', 'Y', 'T', 'Honor'],
            'Sony' => ['Xperia XZ', 'Xperia Compact', 'Xperia Pro'],
            'Asus' => ['Zenfone', 'ROG Phone', 'ROG Phone II', 'V', 'M'],


        ];

        $series = isset($seriesMap[$brandName]) ?
            $seriesMap[$brandName][array_rand($seriesMap[$brandName])] : '';

        $number = rand(1, 30);
        $suffix = '';

        // Add suffixes like Pro, Plus etc. with some probability
        if (rand(0, 100) > 70) {
            $suffixes = ['Pro', 'Plus', 'Ultra', 'Lite', 'FE', 'SE', 'Max'];
            $suffix = ' ' . $suffixes[array_rand($suffixes)];
        }

        return trim("$brandName $series $number$suffix");
    }

    /**
     * Get a map of popular phone brands
     */
    private function getPopularBrands(): array
    {
        return [
            'samsung' => 'Samsung',
            'apple' => 'Apple',
            'xiaomi' => 'Xiaomi',
            'oppo' => 'OPPO',
            'vivo' => 'Vivo',
            'google' => 'Google',
            'oneplus' => 'OnePlus',
            'nothing' => 'Nothing',
            'realme' => 'Realme',
            'motorola' => 'Motorola',
            'nokia' => 'Nokia',
            'infinix' => 'Infinix',
            'huawei' => 'Huawei',
            'sony' => 'Sony',
            'asus' => 'Asus',

        ];
    }

    /**
     * Get a random score with weighted distribution
     */
    private function getRandomScore(int $min, int $max): int
    {
        // Bias towards middle values for more realistic distribution
        $score = rand($min * 10, $max * 10) / 10;
        return round($score);
    }
}

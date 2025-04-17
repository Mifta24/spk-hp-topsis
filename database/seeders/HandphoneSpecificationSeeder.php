<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Handphone;
use Illuminate\Database\Seeder;
use App\Models\HandphoneSpecification;
use Illuminate\Support\Facades\Storage;

class HandphoneSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load JSON data untuk devices yang mungkin memiliki spesifikasi tambahan
        $jsonPath = storage_path('app/devices.json');

        if (!file_exists($jsonPath)) {
            $jsonPath = base_path('database/seeders/devices.json');
        }

        // Cek jika file JSON ada
        $jsonData = [];
        if (file_exists($jsonPath)) {
            $jsonContent = file_get_contents($jsonPath);
            $jsonData = json_decode($jsonContent, true);
        }

        // Dapatkan semua handphone dari database
        $handphones = Handphone::all();

        // Spesifikasi dasar yang diketahui
        $specifications = [
            // Samsung Galaxy S23 Ultra
            [
                'handphone_id' => $this->getHandphoneIdByName('Samsung Galaxy S23 Ultra', $handphones),
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-s23-ultra-5g.jpg',
                'processor_name' => 'Snapdragon 8 Gen 2 (4 nm)',
                'camera_detail' => '200 MP (wide) + 10 MP (periscope telephoto) + 10 MP (telephoto) + 12 MP (ultrawide)',
                'battery_capacity' => '5000 mAh Li-Ion',
                'ram_size' => '12 GB',
                'storage_size' => '256 GB / 512 GB / 1 TB',
                'screen_size' => '6.8 inches Dynamic AMOLED 2X, 120Hz',
                'os_version' => 'Android 13, One UI 5.1',
                'network' => '5G',
                'sim' => 'Nano-SIM and eSIM',
                'weight' => '234 g',
                'dimensions' => '163.4 x 78.1 x 8.9 mm',
                'colors' => json_encode(['Phantom Black', 'Green', 'Cream', 'Lavender']),
                'features' => json_encode(['S Pen stylus', 'IP68 dust/water resistant', 'Wireless charging', 'Samsung DeX', 'Ultra Wideband (UWB)']),
                'description' => 'The Samsung Galaxy S23 Ultra is the top-tier flagship featuring a built-in S Pen, incredible camera system with a 200MP main shooter, and powerful performance.'
            ],

            // iPhone 15 Pro Max
            [
                'handphone_id' => $this->getHandphoneIdByName('iPhone 15 Pro Max', $handphones),
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/apple-iphone-15-pro-max.jpg',
                'processor_name' => 'Apple A17 Pro (3 nm)',
                'camera_detail' => '48 MP (wide) + 12 MP (telephoto) with 5x optical zoom + 12 MP (ultrawide)',
                'battery_capacity' => '4441 mAh Li-Ion',
                'ram_size' => '8 GB',
                'storage_size' => '256 GB / 512 GB / 1 TB',
                'screen_size' => '6.7 inches Super Retina XDR OLED, 120Hz',
                'os_version' => 'iOS 17',
                'network' => '5G',
                'sim' => 'Nano-SIM and eSIM',
                'weight' => '221 g',
                'dimensions' => '159.9 x 76.7 x 8.3 mm',
                'colors' => json_encode(['Natural Titanium', 'Blue Titanium', 'White Titanium', 'Black Titanium']),
                'features' => json_encode(['Action button', 'Dynamic Island', 'Always-on display', 'IP68 dust/water resistant', 'MagSafe wireless charging']),
                'description' => 'The iPhone 15 Pro Max features a titanium design, 5x optical zoom, A17 Pro chip and an Action button replacing the mute switch.'
            ],

            // Google Pixel 7 Pro
            [
                'handphone_id' => $this->getHandphoneIdByName('Google Pixel 7 Pro', $handphones),
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/google-pixel7-pro-new.jpg',
                'processor_name' => 'Google Tensor G2',
                'camera_detail' => '50 MP (wide) + 48 MP (telephoto) with 5x optical zoom + 12 MP (ultrawide)',
                'battery_capacity' => '5000 mAh Li-Po',
                'ram_size' => '12 GB',
                'storage_size' => '128 GB / 256 GB / 512 GB',
                'screen_size' => '6.7 inches LTPO AMOLED, 120Hz',
                'os_version' => 'Android 13, upgradable to Android 14',
                'network' => '5G',
                'sim' => 'Nano-SIM and eSIM',
                'weight' => '212 g',
                'dimensions' => '162.9 x 76.6 x 8.9 mm',
                'colors' => json_encode(['Obsidian', 'Snow', 'Hazel']),
                'features' => json_encode(['IP68 dust/water resistant', 'Google Assistant', 'Fast wireless charging', 'Pixel-exclusive AI features']),
                'description' => 'The Google Pixel 7 Pro offers exceptional camera capabilities, pure Android experience, and Google\'s AI-powered features in a premium package.'
            ],

            // Xiaomi 13 Ultra
            [
                'handphone_id' => $this->getHandphoneIdByName('Xiaomi 13 Ultra', $handphones),
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/xiaomi-13-ultra.jpg',
                'processor_name' => 'Snapdragon 8 Gen 2 (4 nm)',
                'camera_detail' => '50 MP (wide) + 50 MP (periscope telephoto) + 50 MP (telephoto) + 50 MP (ultrawide)',
                'battery_capacity' => '5000 mAh Li-Po',
                'ram_size' => '12 GB / 16 GB',
                'storage_size' => '256 GB / 512 GB / 1 TB',
                'screen_size' => '6.73 inches LTPO AMOLED, 120Hz',
                'os_version' => 'Android 13, MIUI 14',
                'network' => '5G',
                'sim' => 'Dual SIM (Nano-SIM, dual stand-by)',
                'weight' => '227 g',
                'dimensions' => '163.2 x 74.6 x 9.1 mm',
                'colors' => json_encode(['Black', 'White', 'Olive Green']),
                'features' => json_encode(['Leica optics', 'IP68 dust/water resistant', '90W wired charging', '50W wireless charging']),
                'description' => 'The Xiaomi 13 Ultra is a camera-focused flagship featuring Leica optics with four 50MP cameras and top-tier specifications.'
            ],

            // Samsung Galaxy A54
            [
                'handphone_id' => $this->getHandphoneIdByName('Samsung Galaxy A54', $handphones),
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-a54.jpg',
                'processor_name' => 'Exynos 1380 (5 nm)',
                'camera_detail' => '50 MP (wide) + 12 MP (ultrawide) + 5 MP (macro)',
                'battery_capacity' => '5000 mAh Li-Po',
                'ram_size' => '8 GB',
                'storage_size' => '128 GB / 256 GB',
                'screen_size' => '6.4 inches Super AMOLED, 120Hz',
                'os_version' => 'Android 13, One UI 5.1',
                'network' => '5G',
                'sim' => 'Nano-SIM and eSIM',
                'weight' => '202 g',
                'dimensions' => '158.2 x 76.7 x 8.2 mm',
                'colors' => json_encode(['Awesome Lime', 'Awesome Graphite', 'Awesome Violet', 'Awesome White']),
                'features' => json_encode(['IP67 dust/water resistant', 'Stereo speakers', 'microSD card slot (up to 1TB)']),
                'description' => 'The Samsung Galaxy A54 is a mid-range smartphone offering premium features like 120Hz AMOLED display, IP67 rating, and a versatile camera system.'
            ],

            // Xiaomi Redmi Note 12 Pro
            [
                'handphone_id' => $this->getHandphoneIdByName('Xiaomi Redmi Note 12 Pro', $handphones),
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-12-pro.jpg',
                'processor_name' => 'MediaTek Dimensity 1080 (6 nm)',
                'camera_detail' => '50 MP (wide) + 8 MP (ultrawide) + 2 MP (macro)',
                'battery_capacity' => '5000 mAh Li-Po',
                'ram_size' => '6 GB / 8 GB / 12 GB',
                'storage_size' => '128 GB / 256 GB',
                'screen_size' => '6.67 inches AMOLED, 120Hz',
                'os_version' => 'Android 12, MIUI 13',
                'network' => '5G',
                'sim' => 'Dual SIM (Nano-SIM, dual stand-by)',
                'weight' => '187 g',
                'dimensions' => '162.9 x 76 x 8 mm',
                'colors' => json_encode(['Midnight Black', 'Glacier Blue', 'Forest Green', 'Polar White']),
                'features' => json_encode(['67W fast charging', 'Dolby Vision', 'Dolby Atmos', 'IR blaster']),
                'description' => 'The Redmi Note 12 Pro offers a high refresh rate AMOLED display, 50MP camera with OIS, and fast charging in a mid-range package.'
            ],

            // OnePlus 11
            [
                'handphone_id' => $this->getHandphoneIdByName('OnePlus 11', $handphones),
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/oneplus-11.jpg',
                'processor_name' => 'Snapdragon 8 Gen 2 (4 nm)',
                'camera_detail' => '50 MP (wide) + 32 MP (telephoto) + 48 MP (ultrawide)',
                'battery_capacity' => '5000 mAh Li-Po',
                'ram_size' => '8 GB / 12 GB / 16 GB',
                'storage_size' => '128 GB / 256 GB / 512 GB',
                'screen_size' => '6.7 inches LTPO3 AMOLED, 120Hz',
                'os_version' => 'Android 13, OxygenOS 13',
                'network' => '5G',
                'sim' => 'Dual SIM (Nano-SIM, dual stand-by)',
                'weight' => '205 g',
                'dimensions' => '163.1 x 74.1 x 8.5 mm',
                'colors' => json_encode(['Titan Black', 'Eternal Green']),
                'features' => json_encode(['Hasselblad camera tuning', '100W fast charging', 'Alert slider', 'In-display fingerprint']),
                'description' => 'The OnePlus 11 features the powerful Snapdragon 8 Gen 2, Hasselblad cameras, and incredibly fast 100W charging for a flagship experience.'
            ],

            // Sisanya periksa di JSON data
            // Jika tidak ada di JSON, gunakan generateDefaultSpecification()
        ];

        // Untuk handphone yang tidak memiliki spesifikasi di atas, kita generate otomatis
        foreach ($handphones as $handphone) {
            $hasSpecInList = false;

            foreach ($specifications as $spec) {
                if ($spec['handphone_id'] == $handphone->id) {
                    $hasSpecInList = true;
                    break;
                }
            }

            if (!$hasSpecInList) {
                // Cari di data JSON jika ada
                $specFromJson = $this->findSpecificationInJson($handphone->name, $jsonData);

                if ($specFromJson) {
                    $specifications[] = $specFromJson;
                } else {
                    // Jika tidak ditemukan di JSON, gunakan template default
                    $specifications[] = $this->generateDefaultSpecification($handphone);
                }
            }
        }

        // Masukkan semua spesifikasi ke database
        $count = 0;
        foreach ($specifications as $spec) {
            HandphoneSpecification::create($spec);
            $count++;
        }

        $this->command->info("Successfully seeded " . $count . " handphone specifications");
    }

    /**
     * Mendapatkan ID handphone berdasarkan nama
     */
    private function getHandphoneIdByName(string $name, $handphones)
    {
        foreach ($handphones as $handphone) {
            if ($handphone->name === $name) {
                return $handphone->id;
            }
        }

        return null; // Jika tidak ditemukan
    }

    /**
     * Mencari spesifikasi di data JSON
     */
    private function findSpecificationInJson(string $handphoneName, array $jsonData): ?array
    {
        if (!isset($jsonData['RECORDS']) || !is_array($jsonData['RECORDS'])) {
            return null;
        }

        foreach ($jsonData['RECORDS'] as $record) {
            if (!empty($record['name']) && strpos($handphoneName, $record['name']) !== false) {
                return [
                    'handphone_id' => $this->getHandphoneIdByName($handphoneName, Handphone::all()),
                    'image' => $record['image'] ?? $this->getDefaultImage($handphoneName),
                    'processor_name' => $record['processor'] ?? $this->generateProcessorInfo($handphoneName),
                    'camera_detail' => $record['camera'] ?? $this->generateCameraInfo($handphoneName),
                    'battery_capacity' => $record['battery'] ?? $this->generateBatteryInfo($handphoneName),
                    'ram_size' => $record['ram'] ?? $this->generateRamInfo($handphoneName),
                    'storage_size' => $record['storage'] ?? $this->generateStorageInfo($handphoneName),
                    'screen_size' => $record['screen'] ?? $this->generateScreenInfo($handphoneName),
                    'os_version' => $record['os'] ?? 'Android 13',
                    'network' => $record['network'] ?? '4G LTE, 5G',
                    'sim' => $record['sim'] ?? 'Dual SIM (Nano-SIM)',
                    'weight' => $record['weight'] ?? (rand(170, 230) . ' g'),
                    'dimensions' => $record['dimensions'] ?? $this->generateDimensionsInfo(),
                    'colors' => json_encode($record['colors'] ?? $this->generateColorsInfo()),
                    'features' => json_encode($record['features'] ?? $this->generateFeaturesInfo()),
                    'description' => $record['description'] ?? "The $handphoneName is a smartphone with modern features."
                ];
            }
        }

        return null;
    }

    /**
     * Generate default specification untuk handphone
     */
    private function generateDefaultSpecification($handphone): array
    {
        $brandName = Brand::find($handphone->brand_id)->name ?? 'Unknown';
        $isPremium = $handphone->price >= 8000000;
        $isMidRange = $handphone->price >= 3000000 && $handphone->price < 8000000;
        $isBudget = $handphone->price < 3000000;

        // Sesuaikan spesifikasi berdasarkan range harga
        if ($isPremium) {
            $processor = $this->chooseOne([
                'Snapdragon 8 Gen 2',
                'Snapdragon 888',
                'MediaTek Dimensity 9000',
                'Exynos 2200'
            ]) . ' (' . $this->chooseOne(['4 nm', '5 nm']) . ')';

            $camera = $this->chooseOne([
                '50 MP (wide) + 12 MP (telephoto) + 12 MP (ultrawide)',
                '48 MP (wide) + 12 MP (telephoto) + 16 MP (ultrawide)',
                '108 MP (wide) + 10 MP (telephoto) + 12 MP (ultrawide)',
                '64 MP (wide) + 5 MP (macro) + 12 MP (ultrawide)',
            ]);

            $ram = $this->chooseOne(['8 GB', '12 GB', '6 GB / 8 GB / 12 GB']);
            $storage = $this->chooseOne(['128 GB / 256 GB', '256 GB / 512 GB', '128 GB / 256 GB / 512 GB']);
            $screen = $this->chooseOne(['6.7', '6.8', '6.6', '6.5', '6.4']) . ' inches ' . $this->chooseOne(['AMOLED', 'Super AMOLED', 'LTPO AMOLED']) . ', ' . $this->chooseOne(['90Hz', '120Hz', '144Hz']);
            $batterySize = $this->chooseOne(['4500', '5000', '4800', '4700', '4600']);

            $features = ['In-display fingerprint', 'Fast charging', 'Wireless charging', 'Stereo speakers'];
        } elseif ($isMidRange) {
            $processor = $this->chooseOne([
                'Snapdragon 778G',
                'Snapdragon 695',
                'MediaTek Dimensity 1080',
                'MediaTek Helio G96'
            ]) . ' (' . $this->chooseOne(['6 nm', '8 nm']) . ')';

            $camera = $this->chooseOne([
                '50 MP (wide) + 8 MP (ultrawide) + 2 MP (macro)',
                '48 MP (wide) + 5 MP (ultrawide) + 2 MP (depth)',
                '64 MP (wide) + 8 MP (ultrawide)',
                '32 MP (wide) + 8 MP (ultrawide) + 2 MP (macro)',
            ]);

            $ram = $this->chooseOne(['6 GB', '8 GB', '4 GB / 6 GB']);
            $storage = $this->chooseOne(['64 GB / 128 GB', '128 GB', '128 GB / 256 GB']);
            $screen = $this->chooseOne(['6.5', '6.6', '6.4', '6.3']) . ' inches ' . $this->chooseOne(['LCD', 'AMOLED', 'IPS LCD']) . ', ' . $this->chooseOne(['60Hz', '90Hz', '120Hz']);
            $batterySize = $this->chooseOne(['4500', '5000', '4000', '4300']);

            $features = ['Fingerprint (side-mounted)', 'Fast charging', '3.5mm headphone jack'];
        } else { // Budget
            $processor = $this->chooseOne([
                'MediaTek Helio G35',
                'Snapdragon 680',
                'Unisoc T612',
                'MediaTek Helio G37'
            ]) . ' (' . $this->chooseOne(['12 nm', '11 nm', '14 nm']) . ')';

            $camera = $this->chooseOne([
                '13 MP (wide) + 2 MP (macro) + 2 MP (depth)',
                '50 MP (wide) + 2 MP (depth)',
                '48 MP (wide)',
                '16 MP (wide) + 2 MP (macro)',
            ]);

            $ram = $this->chooseOne(['3 GB', '4 GB', '3 GB / 4 GB']);
            $storage = $this->chooseOne(['32 GB / 64 GB', '64 GB', '32 GB / 128 GB']);
            $screen = $this->chooseOne(['6.5', '6.1', '6.3', '6.2']) . ' inches ' . $this->chooseOne(['LCD', 'IPS LCD']) . ', ' . $this->chooseOne(['60Hz', '90Hz']);
            $batterySize = $this->chooseOne(['4000', '5000', '4500', '3500']);

            $features = ['Fingerprint (rear)', '10W charging', '3.5mm headphone jack', 'microSD card slot'];
        }

        return [
            'handphone_id' => $handphone->id,
            'image' => $this->getDefaultImage($handphone->name),
            'processor_name' => $processor,
            'camera_detail' => $camera,
            'battery_capacity' => $batterySize . ' mAh Li-Po',
            'ram_size' => $ram,
            'storage_size' => $storage,
            'screen_size' => $screen,
            'os_version' => 'Android ' . $this->chooseOne(['13', '12', '11']),
            'network' => $isPremium ? '5G' : ($isMidRange ? $this->chooseOne(['4G LTE', '4G LTE, 5G']) : '4G LTE'),
            'sim' => 'Dual SIM (Nano-SIM, dual stand-by)',
            'weight' => rand(170, 230) . ' g',
            'dimensions' => $this->generateDimensionsInfo(),
            'colors' => json_encode($this->generateColorsInfo()),
            'features' => json_encode(array_merge($features, $this->generateBasicFeatures())),
            'description' => "The {$handphone->name} is a " . ($isPremium ? 'premium' : ($isMidRange ? 'mid-range' : 'budget-friendly')) . " smartphone by $brandName featuring $processor, $camera main camera, and $batterySize mAh battery."
        ];
    }

    /**
     * Helper untuk memilih satu item dari array
     */
    private function chooseOne(array $items)
    {
        return $items[array_rand($items)];
    }

    /**
     * Generate default image jika tidak ada di JSON
     */
    private function getDefaultImage(string $handphoneName): string
    {
        $brandName = strtolower(explode(' ', $handphoneName)[0]);

        $images = [
            'samsung' => 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-a54.jpg',
            'apple' => 'https://fdn2.gsmarena.com/vv/bigpic/apple-iphone-14.jpg',
            'xiaomi' => 'https://fdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-12-4g.jpg',
            'google' => 'https://fdn2.gsmarena.com/vv/bigpic/google-pixel7a.jpg',
            'oppo' => 'https://fdn2.gsmarena.com/vv/bigpic/oppo-reno8t-5g.jpg',
            'vivo' => 'https://fdn2.gsmarena.com/vv/bigpic/vivo-v27.jpg',
            'oneplus' => 'https://fdn2.gsmarena.com/vv/bigpic/oneplus-nord-ce3-r.jpg',
            'realme' => 'https://fdn2.gsmarena.com/vv/bigpic/realme-11-pro-plus.jpg',
            'nothing' => 'https://fdn2.gsmarena.com/vv/bigpic/nothing-phone-2.jpg',
            'motorola' => 'https://fdn2.gsmarena.com/vv/bigpic/motorola-edge40.jpg',
            'infinix' => 'https://fdn2.gsmarena.com/vv/bigpic/infinix-note30.jpg',
            'nokia' => 'https://fdn2.gsmarena.com/vv/bigpic/nokia-g42.jpg',
        ];

        return $images[$brandName] ?? 'https://techprimaryschool.com/wp-content/uploads/2020/09/smartphone.jpg';
    }

    /**
     * Helper functions untuk generate spesifikasi lainnya
     */
    private function generateProcessorInfo(string $handphoneName): string
    {
        // Implementasi logic jika diperlukan
        return 'Snapdragon 888 / MediaTek Dimensity 1000';
    }

    private function generateCameraInfo(string $handphoneName): string
    {
        return '48 MP (wide) + 8 MP (ultrawide) + 2 MP (macro)';
    }

    private function generateRamInfo(string $handphoneName): string
    {
        return '6 GB / 8 GB';
    }

    private function generateStorageInfo(string $handphoneName): string
    {
        return '128 GB / 256 GB';
    }

    private function generateScreenInfo(string $handphoneName): string
    {
        return '6.5 inches AMOLED, 90Hz';
    }

    private function generateBatteryInfo(string $handphoneName): string
    {
        return '5000 mAh Li-Po';
    }

    private function generateDimensionsInfo(): string
    {
        return rand(150, 165) . ' x ' . rand(70, 78) . ' x ' . (rand(75, 90) / 10) . ' mm';
    }

    private function generateColorsInfo(): array
    {
        $allColors = [
            'Black', 'White', 'Blue', 'Green', 'Red', 'Yellow',
            'Gold', 'Silver', 'Gray', 'Purple', 'Pink', 'Orange',
            'Midnight Blue', 'Forest Green', 'Graphite', 'Charcoal',
            'Glacier White', 'Aqua Blue', 'Neon Yellow', 'Ruby Red'
        ];

        shuffle($allColors);
        return array_slice($allColors, 0, rand(2, 4));
    }

    private function generateFeaturesInfo(): array
    {
        $possibleFeatures = [
            'Fingerprint sensor', 'Face unlock', 'NFC', 'Bluetooth 5.0',
            'Wi-Fi 6', 'USB Type-C', 'IP68 water resistance', 'Stereo speakers',
            'Fast charging', 'Wireless charging', 'Reverse wireless charging',
            '3.5mm headphone jack', 'microSD card slot'
        ];

        shuffle($possibleFeatures);
        return array_slice($possibleFeatures, 0, rand(3, 6));
    }

    private function generateBasicFeatures(): array
    {
        return [
            'Bluetooth',
            'GPS',
            'Wi-Fi',
            'Accelerometer',
            'Proximity sensor'
        ];
    }
}

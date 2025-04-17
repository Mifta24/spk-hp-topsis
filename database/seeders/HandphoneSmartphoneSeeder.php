<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Handphone;
use App\Models\HandphoneSpecification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HandphoneSmartphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create brands if they don't exist yet
        $this->createBrandsIfNeeded();

        // Path to the CSV file - adjust if needed
        $csvFile = storage_path('app\Smartphone_2024.csv');

        if (!file_exists($csvFile)) {
            $this->command->error('CSV file not found at: ' . $csvFile);
            return;
        }

        $csvData = array_map('str_getcsv', file($csvFile));

        // Remove header
        array_shift($csvData);

        $count = 0;
        $total = count($csvData);

        foreach ($csvData as $row) {
            if (count($row) < 10) {
                continue; // Skip incomplete rows
            }

            $index = $row[0];
            $model = $row[1];
            $price = $this->extractPrice($row[2]);
            $rating = $row[3] ? intval($row[3]) : rand(65, 85);
            $specs = $row[4];
            $processor = $row[5] ?? '';
            $ram = $row[6] ?? '';
            $battery = $row[7] ?? '';
            $display = $row[8] ?? '';
            $camera = $row[9] ?? '';
            $memory = $row[10] ?? '';
            $os = $row[11] ?? '';

            // Extract brand from model
            $brandName = $this->extractBrandName($model);
            $brand = Brand::where('name', $brandName)->first();

            if (!$brand) {
                // Create brand if not exists
                $brand = Brand::create([
                    'name' => $brandName,
                    'slug' => Str::slug($brandName),
                    'description' => $brandName.' is a mobile phone manufacturer.',
                    'logo' => $this->getBrandLogo($brandName),
                    'is_active' => true,
                ]);
            }

            // Create Handphone record
            $handphone = Handphone::create([
                'brand_id' => $brand->id,
                'name' => $model,
                'price' => $price,
                'camera' => $this->generateRating($rating),
                'battery' => $this->generateRating($rating),
                'ram' => $this->generateRating($rating),
                'prosessor' => $this->generateRating($rating),
                'design' => $this->generateRating($rating),
                'storage' => $this->generateRating($rating),
            ]);

            // Create specification
            HandphoneSpecification::create([
                'handphone_id' => $handphone->id,
                'image' => $this->getPhoneImage($brandName, $model),
                'processor_name' => $processor,
                'camera_detail' => $camera,
                'battery_capacity' => $battery,
                'ram_size' => $ram,
                'storage_size' => $this->extractStorage($memory),
                'screen_size' => $display,
                'os_version' => $os,
                'network' => $this->extractNetworkInfo($specs),
                'sim' => $this->extractSimInfo($specs),
                'dimensions' => '',
                'weight' => '',
                'colors' => json_encode($this->generateColors()),
                'features' => json_encode($this->extractFeatures($specs)),
                'description' => "The $model is a smartphone from $brandName featuring $processor processor, $ram, $battery battery, and $camera camera system.",
            ]);

            $count++;
            if ($count % 10 == 0) {
                $this->command->info("Processed $count/$total records");
            }
        }

        $this->command->info("Successfully imported $count smartphones");
    }

    /**
     * Extract price value from string
     */
    private function extractPrice(string $priceStr): int
    {
        // Remove non-numeric characters, keep only digits
        $priceStr = preg_replace('/[^0-9]/', '', $priceStr);

        // Convert to integer
        $price = intval($priceStr);

        // Convert Indian Rupees to IDR (approximation)
        // 1 INR ≈ 175 IDR
        return $price * 175;
    }

    /**
     * Extract brand name from model
     */
    private function extractBrandName(string $model): string
    {
        $brandMap = [
            'Samsung' => ['Samsung', 'Galaxy'],
            'Apple' => ['Apple', 'iPhone'],
            'Xiaomi' => ['Xiaomi', 'Redmi', 'Poco'],
            'OPPO' => ['OPPO', 'Reno'],
            'Vivo' => ['Vivo'],
            'Realme' => ['Realme'],
            'OnePlus' => ['OnePlus'],
            'Motorola' => ['Motorola', 'Moto'],
            'Google' => ['Google', 'Pixel'],
            'Nothing' => ['Nothing'],
            'Infinix' => ['Infinix'],
            'Tecno' => ['Tecno'],
            'Honor' => ['Honor'],
            'iQOO' => ['iQOO'],
            'Nokia' => ['Nokia'],
            'Lava' => ['Lava'],
            'itel' => ['itel']
        ];

        foreach ($brandMap as $brandName => $keywords) {
            foreach ($keywords as $keyword) {
                if (stripos($model, $keyword) !== false) {
                    return $brandName;
                }
            }
        }

        // Default to the first word if no match
        $parts = explode(' ', $model);
        return $parts[0];
    }

    /**
     * Generate a random rating weighted by the overall rating
     */
    private function generateRating(?int $baseRating = null): int
    {
        if (!$baseRating) {
            return rand(5, 10);
        }

        // Normalize the base rating to a 1-10 scale
        $normalizedBase = round(($baseRating - 65) / 3.5) + 5;
        $normalizedBase = max(5, min($normalizedBase, 10));

        // Add some randomness but keep it close to the base
        $variance = rand(-1, 1);
        $rating = $normalizedBase + $variance;

        return max(1, min(10, $rating));
    }

    /**
     * Extract storage information
     */
    private function extractStorage(string $memoryStr): string
    {
        if (empty($memoryStr)) {
            return "128 GB";
        }

        if (preg_match('/(\d+)\s*GB/i', $memoryStr, $matches)) {
            return $matches[1] . " GB";
        }

        return "128 GB";
    }

    /**
     * Extract network information
     */
    private function extractNetworkInfo(string $specs): string
    {
        if (strpos($specs, '5G') !== false) {
            return '5G';
        } else if (strpos($specs, '4G') !== false) {
            return '4G LTE';
        } else {
            return '4G';
        }
    }

    /**
     * Extract SIM information
     */
    private function extractSimInfo(string $specs): string
    {
        if (strpos($specs, 'Dual Sim') !== false) {
            return 'Dual SIM (Nano-SIM)';
        } else {
            return 'Single SIM (Nano-SIM)';
        }
    }

    /**
     * Extract features from specs string
     */
    private function extractFeatures(string $specs): array
    {
        $features = [];

        $featureKeywords = [
            'NFC' => 'NFC',
            'IR Blaster' => 'IR Blaster',
            'Wi-Fi' => 'Wi-Fi',
            'Bluetooth' => 'Bluetooth',
            'VoLTE' => 'VoLTE Support',
            'Fast Charging' => 'Fast Charging'
        ];

        foreach ($featureKeywords as $keyword => $feature) {
            if (strpos($specs, $keyword) !== false) {
                $features[] = $feature;
            }
        }

        // Add some generic features
        $genericFeatures = [
            'Fingerprint Sensor',
            'GPS',
            'Accelerometer',
            'Proximity Sensor',
            'Ambient Light Sensor'
        ];

        // Add 2-3 random generic features
        $genericCount = rand(2, 3);
        shuffle($genericFeatures);

        for ($i = 0; $i < $genericCount; $i++) {
            $features[] = $genericFeatures[$i];
        }

        return $features;
    }

    /**
     * Generate random color options
     */
    private function generateColors(): array
    {
        $allColors = [
            'Black', 'White', 'Silver', 'Gray', 'Blue',
            'Green', 'Red', 'Yellow', 'Purple', 'Gold',
            'Rose Gold', 'Midnight Blue', 'Forest Green',
            'Champagne Gold', 'Cosmic Gray', 'Lavender',
            'Aqua', 'Mint', 'Coral', 'Starlight'
        ];

        shuffle($allColors);
        $colorCount = rand(2, 4);

        return array_slice($allColors, 0, $colorCount);
    }

    /**
     * Get a placeholder image URL for the phone
     */
    private function getPhoneImage(string $brand, string $model): string
    {
        $cleanModel = Str::slug($model);

        // Try to get a realistic image using a placeholder service or brand-specific images
        return "https://techprimaryschool.com/wp-content/uploads/2020/09/smartphone.jpg";
        // In production, you might use: "https://fdn2.gsmarena.com/vv/bigpic/$cleanModel.jpg"
    }

    /**
     * Get brand logo URL
     */
    private function getBrandLogo(string $brandName): string
    {
        $logoUrls = [
            'Samsung' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/2560px-Samsung_Logo.svg.png',
            'Apple' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/488px-Apple_logo_black.svg.png',
            'Xiaomi' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Xiaomi_logo_%282021-%29.svg/2048px-Xiaomi_logo_%282021-%29.svg.png',
            'OPPO' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/OPPO_Logo_wiki.png/640px-OPPO_Logo_wiki.png',
            'Vivo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Vivo_Logo.svg/1200px-Vivo_Logo.svg.png',
            'Google' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/2560px-Google_2015_logo.svg.png',
            'Realme' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Realme_logo.svg/1200px-Realme_logo.svg.png',
            'OnePlus' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/OnePlus_logo.svg/2560px-OnePlus_logo.svg.png',
            'Motorola' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Motorola_Logo_2022.png/640px-Motorola_Logo_2022.png',
            'Nothing' => 'https://nothing.tech/cdn/shop/files/Nothing_Logo_White.svg?v=1653912449',
            'Infinix' => 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Infinix-logo-BE14A5FA45-seeklogo.com.png',
            'Honor' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Honor_logo_2022.png/1200px-Honor_logo_2022.png',
            'iQOO' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/IQOO_Logo.svg/1200px-IQOO_Logo.svg.png',
            'Poco' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/Redmi-poco_logo.png/2560px-Redmi-poco_logo.png',
            'Nokia' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Nokia_wordmark.svg/1200px-Nokia_wordmark.svg.png',
        ];

        return $logoUrls[$brandName] ?? 'https://via.placeholder.com/200x100.png?text=' . urlencode($brandName);
    }

    /**
     * Create essential brands if they don't exist yet
     */
    private function createBrandsIfNeeded(): void
    {
        $essentialBrands = [
            'Samsung' => 'Samsung Electronics Co., Ltd. adalah perusahaan elektronik multinasional asal Korea Selatan.',
            'Apple' => 'Apple Inc. adalah perusahaan teknologi multinasional yang berpusat di Cupertino, California.',
            'Xiaomi' => 'Xiaomi Corporation adalah produsen elektronik swasta milik pribadi dari Tiongkok.',
            'OPPO' => 'OPPO Electronics Corp. adalah produsen elektronik konsumen dan komunikasi seluler Tiongkok.',
            'Vivo' => 'Vivo Communication Technology Co. Ltd. adalah perusahaan elektronik China.',
            'Google' => 'Google LLC adalah perusahaan multinasional Amerika Serikat yang berkekhususan pada jasa dan produk Internet.',
            'Realme' => 'Realme adalah produsen smartphone asal China yang didirikan pada 2018.',
            'OnePlus' => 'OnePlus adalah produsen smartphone asal China yang didirikan pada 2013.',
            'Motorola' => 'Motorola Mobility adalah perusahaan telekomunikasi Amerika yang dimiliki oleh Lenovo.',
            'Nothing' => 'Nothing adalah perusahaan teknologi konsumen berbasis di London yang didirikan oleh Carl Pei.',
        ];

        foreach ($essentialBrands as $name => $description) {
            Brand::firstOrCreate(
                ['name' => $name],
                [
                    'name' => $name,
                    'slug' => Str::slug($name),
                    'description' => $description,
                    'logo' => $this->getBrandLogo($name),
                    'is_active' => true,
                ]
            );
        }
    }
}

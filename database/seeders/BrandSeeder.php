<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Path to JSON file - adjust this to where you saved the file
        $jsonPath = Storage::path('brands.json');

        // If the file doesn't exist in storage, try database path
        if (!file_exists($jsonPath)) {
            $jsonPath = database_path('json/brands.json');
        }

        // If the file doesn't exist in either location, try seeders folder
        if (!file_exists($jsonPath)) {
            $jsonPath = database_path('seeders/brands.json');
        }

        // If the file doesn't exist in either location, exit
        if (!file_exists($jsonPath)) {
            $this->command->error('JSON file not found. Make sure to place brands.json in storage/app/ or database/json/ or database/seeders/');
            return;
        }

        // Read and decode JSON file
        $jsonContent = file_get_contents($jsonPath);
        $brandsData = json_decode($jsonContent, true);

        if (!isset($brandsData['RECORDS']) || !is_array($brandsData['RECORDS'])) {
            $this->command->error('Invalid JSON format. Expected "RECORDS" key with an array.');
            return;
        }

        // Mapping of brand names to logo URLs
        $logoMap = $this->getBrandLogoMap();
        $count = 0;

        foreach ($brandsData['RECORDS'] as $brandRecord) {
            // Skip brands that have been deleted (if applicable)
            if (!empty($brandRecord['deleted_at'])) {
                continue;
            }

            $name = $brandRecord['name'];

            // Find the logo URL - use standard format if not found in map
            $logoUrl = $logoMap[strtolower($name)] ?? $this->getDefaultLogoUrl($name);

            // Create the brand
            Brand::firstOrCreate(
                ['name' => $name],
                [
                    'slug' => Str::slug($name),
                    'logo' => $logoUrl,
                    'description' => $this->getBrandDescription($name),
                    'is_active' => true,
                ]
            );

            $count++;

            // Show progress every 10 brands
            if ($count % 10 === 0) {
                $this->command->info("Processed $count brands");
            }
        }

        $this->command->info("Brand seeding completed. Added $count brands.");
    }

    /**
     * Get brand logo mapping
     *
     * @return array
     */
    private function getBrandLogoMap(): array
    {
        return [
            'samsung' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/2560px-Samsung_Logo.svg.png',
            'apple' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/488px-Apple_logo_black.svg.png',
            'xiaomi' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Xiaomi_logo_%282021-%29.svg/2048px-Xiaomi_logo_%282021-%29.svg.png',
            'oppo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/OPPO_Logo_wiki.png/640px-OPPO_Logo_wiki.png',
            'vivo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Vivo_Logo.svg/1200px-Vivo_Logo.svg.png',
            'google' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/2560px-Google_2015_logo.svg.png',
            'nokia' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Nokia_wordmark.svg/1200px-Nokia_wordmark.svg.png',
            'alcatel' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5a/Alcatel_Mobile_Logo.svg/1200px-Alcatel_Mobile_Logo.svg.png',
            'motorola' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/72/Motorola_Logo_2022.png/640px-Motorola_Logo_2022.png',
            'sony' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Sony_logo.svg/2560px-Sony_logo.svg.png',
            'htc' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/HTC_Logo.svg/1200px-HTC_Logo.svg.png',
            'asus' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2e/ASUS_Logo.svg/2560px-ASUS_Logo.svg.png',
            'lg' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/LG_symbol.svg/800px-LG_symbol.svg.png',
            'huawei' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Huawei_Logo.svg/1280px-Huawei_Logo.svg.png',
            'honor' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Honor_logo_2022.png/1200px-Honor_logo_2022.png',
            'blackberry' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7a/BlackBerry_Ltd_logo.svg/2560px-BlackBerry_Ltd_logo.svg.png',
            'zte' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c2/ZTE_logo.svg/1200px-ZTE_logo.svg.png',
            'microsoft' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Microsoft_logo_%282012%29.svg/2560px-Microsoft_logo_%282012%29.svg.png',
            'lenovo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Lenovo_logo_2015.svg/1280px-Lenovo_logo_2015.svg.png',
            'oneplus' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/OnePlus_logo.svg/2560px-OnePlus_logo.svg.png',
            'realme' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/Realme_logo.svg/1200px-Realme_logo.svg.png',
            'infinix' => 'https://upload.wikimedia.org/wikipedia/commons/a/a3/Infinix-logo-BE14A5FA45-seeklogo.com.png',
            'tecno' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Tecno_Mobile_Logo.png/1200px-Tecno_Mobile_Logo.png',
            'meizu' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/35/Meizu_logo.svg/1024px-Meizu_logo.svg.png',
            'panasonic' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Panasonic_logo.svg/2560px-Panasonic_logo.svg.png',
            'sharp' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Sharp_logo.svg/1200px-Sharp_logo.svg.png',
            'hp' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/HP_logo_2012.svg/2048px-HP_logo_2012.svg.png',
            'toshiba' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Toshiba_logo.svg/2560px-Toshiba_logo.svg.png',
            'acer' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Acer_2011.svg/1024px-Acer_2011.svg.png',
            'dell' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/Dell_logo_2016.svg/1024px-Dell_logo_2016.svg.png',
            'coolpad' => 'https://upload.wikimedia.org/wikipedia/en/thumb/1/19/Coolpad_logo.svg/1200px-Coolpad_logo.svg.png',
            'tcl' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/TCL_Corporation_logo.svg/1024px-TCL_Corporation_logo.svg.png',
            'philips' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/4/47/Philips_logo_new.svg/2560px-Philips_logo_new.svg.png',
            'siemens' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5f/Siemens-logo.svg/1200px-Siemens-logo.svg.png',
            'gionee' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d7/Gionee_logo.svg/1280px-Gionee_logo.svg.png',
            'micromax' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/95/Micromax_Informatics_Logo.svg/1280px-Micromax_Informatics_Logo.svg.png',
            'lava' => 'https://upload.wikimedia.org/wikipedia/commons/5/56/Lava_logo.png',
            'razer' => 'https://upload.wikimedia.org/wikipedia/en/thumb/4/40/Razer_snake_logo.svg/1200px-Razer_snake_logo.svg.png',
            'benq' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/BenQ_Logo.svg/1280px-BenQ_Logo.svg.png',
            'gigabyte' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Gigabyte_Technology_logo_blue_%28vector%29.svg/1200px-Gigabyte_Technology_logo_blue_%28vector%29.svg.png',
            'nvidia' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/21/Nvidia_logo.svg/1024px-Nvidia_logo.svg.png',
            'amazon' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Amazon_logo.svg/2560px-Amazon_logo.svg.png',
            'blackview' => 'https://blackview.hk/cdn/shop/files/logo_efb2dfed-4e61-4c3d-bb23-f0246111d417.png',
            'cat' => 'https://upload.wikimedia.org/wikipedia/en/thumb/f/f1/Cat_Inc_logo.svg/1200px-Cat_Inc_logo.svg.png',
            'leeco' => 'https://upload.wikimedia.org/wikipedia/commons/7/7f/Letv_logo.png',
        ];
    }

    /**
     * Get a default logo URL for brands not in the mapping
     *
     * @param string $brandName
     * @return string
     */
    private function getDefaultLogoUrl(string $brandName): string
    {
        // Convert to lowercase and remove special characters
        $cleanName = Str::slug($brandName);

        // Try to find a public domain logo, or use a placeholder
        return "https://via.placeholder.com/200x100.png?text=" . urlencode($brandName);
    }

    /**
     * Get description for common brands, or generate a generic one
     *
     * @param string $brandName
     * @return string
     */
    private function getBrandDescription(string $brandName): string
    {
        $descriptions = [
            'Samsung' => 'Samsung Electronics Co., Ltd. adalah perusahaan elektronik multinasional asal Korea Selatan.',
            'Apple' => 'Apple Inc. adalah perusahaan teknologi multinasional yang berpusat di Cupertino, California, yang merancang, mengembangkan, dan menjual elektronik konsumen, perangkat lunak komputer, dan layanan online.',
            'Xiaomi' => 'Xiaomi Corporation adalah produsen elektronik swasta milik pribadi dari Tiongkok yang berkantor pusat di Beijing.',
            'OPPO' => 'OPPO Electronics Corp. adalah produsen elektronik konsumen dan komunikasi seluler Tiongkok yang berkantor pusat di Dongguan, Guangdong, RRC.',
            'Vivo' => 'Vivo Communication Technology Co. Ltd. adalah perusahaan elektronik China yang berkantor pusat di Dongguan, Guangdong, China.',
            'Google' => 'Google LLC adalah perusahaan multinasional Amerika Serikat yang berkekhususan pada jasa dan produk Internet. Google dikenal luas dengan layanan pencarian webnya.',
            'Nokia' => 'Nokia Corporation adalah perusahaan teknologi komunikasi multinasional Finlandia yang didirikan pada tahun 1865.',
            'Motorola' => 'Motorola Mobility adalah perusahaan telekomunikasi Amerika yang dimiliki oleh Lenovo.',
            'Sony' => 'Sony Corporation adalah konglomerat multinasional Jepang yang berkantor pusat di Kōnan, Minato, Tokyo.',
            'Huawei' => 'Huawei Technologies Co., Ltd. adalah perusahaan teknologi multinasional yang berkantor pusat di Shenzhen, Guangdong, China.',
            'LG' => 'LG Corporation adalah konglomerat elektronik multinasional Korea Selatan yang berkantor pusat di Seoul, Korea Selatan.',
            'OnePlus' => 'OnePlus Technology adalah produsen smartphone asal Tiongkok yang didirikan pada Desember 2013.',
            'Realme' => 'Realme adalah produsen smartphone asal China yang didirikan pada 2018.',
        ];

        return $descriptions[$brandName] ?? "$brandName adalah produsen handphone yang dikenal dengan inovasi dan kualitas produknya.";
    }
}

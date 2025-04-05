<?php

namespace Database\Seeders;

use App\Models\HandphoneSpecification;
use Illuminate\Database\Seeder;

class HandphoneSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specifications = [
            // Samsung Galaxy S23 Ultra
            [
                'handphone_id' => 1,
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
                'handphone_id' => 2,
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
                'handphone_id' => 3,
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
                'handphone_id' => 4,
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
                'handphone_id' => 5,
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
                'handphone_id' => 6,
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
                'handphone_id' => 7,
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

            // Nothing Phone 2
            [
                'handphone_id' => 8,
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/nothing-phone-2.jpg',
                'processor_name' => 'Snapdragon 8+ Gen 1 (4 nm)',
                'camera_detail' => '50 MP (wide) + 50 MP (ultrawide)',
                'battery_capacity' => '4700 mAh Li-Po',
                'ram_size' => '8 GB / 12 GB',
                'storage_size' => '128 GB / 256 GB / 512 GB',
                'screen_size' => '6.7 inches LTPO AMOLED, 120Hz',
                'os_version' => 'Android 13, Nothing OS 2.0',
                'network' => '5G',
                'sim' => 'Dual SIM (Nano-SIM, dual stand-by)',
                'weight' => '201.2 g',
                'dimensions' => '162.1 x 76.4 x 8.6 mm',
                'colors' => json_encode(['White', 'Dark Gray']),
                'features' => json_encode(['Glyph Interface', '45W fast charging', '15W wireless charging', 'IP54 splash resistant']),
                'description' => 'The Nothing Phone 2 features a unique transparent design with Glyph Interface lighting on the back, providing visual notifications and a distinctive aesthetic.'
            ],

            // iPhone 14
            [
                'handphone_id' => 9,
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/apple-iphone-14.jpg',
                'processor_name' => 'Apple A15 Bionic (5 nm)',
                'camera_detail' => '12 MP (wide) + 12 MP (ultrawide)',
                'battery_capacity' => '3279 mAh Li-Ion',
                'ram_size' => '6 GB',
                'storage_size' => '128 GB / 256 GB / 512 GB',
                'screen_size' => '6.1 inches Super Retina XDR OLED',
                'os_version' => 'iOS 16, upgradable to iOS 17',
                'network' => '5G',
                'sim' => 'Nano-SIM and eSIM',
                'weight' => '172 g',
                'dimensions' => '146.7 x 71.5 x 7.8 mm',
                'colors' => json_encode(['Blue', 'Purple', 'Yellow', 'Midnight', 'Starlight', 'Red']),
                'features' => json_encode(['Face ID', 'Wireless charging', 'MagSafe', 'IP68 dust/water resistant', 'Crash Detection']),
                'description' => 'The iPhone 14 offers reliable performance, great camera quality, and the seamless Apple ecosystem in the classic iPhone design.'
            ],

            // Realme GT 5 Pro
            [
                'handphone_id' => 10,
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/realme-gt5-pro.jpg',
                'processor_name' => 'Snapdragon 8 Gen 3 (4 nm)',
                'camera_detail' => '50 MP (wide) + 50 MP (periscope telephoto) + 8 MP (ultrawide)',
                'battery_capacity' => '5600 mAh Li-Po',
                'ram_size' => '12 GB / 16 GB',
                'storage_size' => '256 GB / 512 GB / 1 TB',
                'screen_size' => '6.78 inches AMOLED, 144Hz',
                'os_version' => 'Android 14, Realme UI 5.0',
                'network' => '5G',
                'sim' => 'Dual SIM (Nano-SIM, dual stand-by)',
                'weight' => '199 g',
                'dimensions' => '162.9 x 75.8 x 8.6 mm',
                'colors' => json_encode(['Red', 'Black', 'Silver']),
                'features' => json_encode(['120W fast charging', '50W wireless charging', 'Stereo speakers', 'In-display fingerprint']),
                'description' => 'The Realme GT 5 Pro is a flagship killer with the latest Snapdragon 8 Gen 3 chip, super-fast charging, and impressive camera capabilities.'
            ],

            // Xiaomi Poco F5
            [
                'handphone_id' => 11,
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/poco-f5.jpg',
                'processor_name' => 'Snapdragon 7+ Gen 2 (4 nm)',
                'camera_detail' => '64 MP (wide) + 8 MP (ultrawide) + 2 MP (macro)',
                'battery_capacity' => '5000 mAh Li-Po',
                'ram_size' => '8 GB / 12 GB',
                'storage_size' => '256 GB / 512 GB',
                'screen_size' => '6.67 inches AMOLED, 120Hz',
                'os_version' => 'Android 13, MIUI 14',
                'network' => '5G',
                'sim' => 'Dual SIM (Nano-SIM, dual stand-by)',
                'weight' => '181 g',
                'dimensions' => '161.1 x 74.9 x 7.9 mm',
                'colors' => json_encode(['Black', 'Blue', 'White']),
                'features' => json_encode(['67W fast charging', 'Dolby Vision', 'Dolby Atmos', 'IR blaster', 'IP53 splash protection']),
                'description' => 'The Poco F5 offers flagship-level performance at a mid-range price, featuring a powerful processor, high refresh rate display and fast charging.'
            ],

            // Samsung Galaxy S23 FE
            [
                'handphone_id' => 12,
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-s23-fe-5g.jpg',
                'processor_name' => 'Exynos 2200 (4 nm)',
                'camera_detail' => '50 MP (wide) + 8 MP (telephoto) + 12 MP (ultrawide)',
                'battery_capacity' => '4500 mAh Li-Ion',
                'ram_size' => '8 GB',
                'storage_size' => '128 GB / 256 GB',
                'screen_size' => '6.4 inches Dynamic AMOLED 2X, 120Hz',
                'os_version' => 'Android 13, One UI 5.1',
                'network' => '5G',
                'sim' => 'Nano-SIM and eSIM',
                'weight' => '209 g',
                'dimensions' => '158 x 76.5 x 8.2 mm',
                'colors' => json_encode(['Mint', 'Cream', 'Graphite', 'Purple']),
                'features' => json_encode(['IP68 dust/water resistant', 'Wireless charging', 'Reverse wireless charging', 'Samsung DeX']),
                'description' => 'The Galaxy S23 FE brings flagship features at a more accessible price point, offering the core S-series experience with a few compromises.'
            ],

            // Add additional handphones here...
            // Xiaomi Redmi Note 12
            [
                'handphone_id' => 13,
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/xiaomi-redmi-note-12.jpg',
                'processor_name' => 'Snapdragon 685 (6 nm)',
                'camera_detail' => '50 MP (wide) + 8 MP (ultrawide) + 2 MP (macro)',
                'battery_capacity' => '5000 mAh Li-Po',
                'ram_size' => '4 GB / 6 GB / 8 GB',
                'storage_size' => '64 GB / 128 GB',
                'screen_size' => '6.67 inches AMOLED, 120Hz',
                'os_version' => 'Android 13, MIUI 14',
                'network' => '4G LTE',
                'sim' => 'Dual SIM (Nano-SIM, dual stand-by)',
                'weight' => '188 g',
                'dimensions' => '165.7 x 76.2 x 8 mm',
                'colors' => json_encode(['Onyx Gray', 'Mint Green', 'Ice Blue']),
                'features' => json_encode(['33W fast charging', 'microSD card slot', 'IR blaster', 'Side-mounted fingerprint', '3.5mm headphone jack']),
                'description' => 'The Redmi Note 12 delivers an excellent AMOLED display, decent camera performance, and reliable battery life at an affordable price point.'
            ],

            // Samsung Galaxy A34
            [
                'handphone_id' => 14,
                'image' => 'https://fdn2.gsmarena.com/vv/bigpic/samsung-galaxy-a34-5g.jpg',
                'processor_name' => 'Dimensity 1080 (6 nm)',
                'camera_detail' => '48 MP (wide) + 8 MP (ultrawide) + 5 MP (macro)',
                'battery_capacity' => '5000 mAh Li-Po',
                'ram_size' => '6 GB / 8 GB',
                'storage_size' => '128 GB / 256 GB',
                'screen_size' => '6.6 inches Super AMOLED, 120Hz',
                'os_version' => 'Android 13, One UI 5.1',
                'network' => '5G',
                'sim' => 'Dual SIM (Nano-SIM, dual stand-by)',
                'weight' => '199 g',
                'dimensions' => '161.3 x 78.1 x 8.2 mm',
                'colors' => json_encode(['Awesome Lime', 'Awesome Graphite', 'Awesome Violet', 'Awesome Silver']),
                'features' => json_encode(['IP67 dust/water resistant', 'Stereo speakers', 'microSD card slot (up to 1TB)', '25W charging']),
                'description' => 'The Samsung Galaxy A34 is a solid mid-range option with a smooth 120Hz display, IP67 rating, and reliable performance that will satisfy most users.'
            ],

            // Complete specifications for remaining handphones...
            // Add the rest of your specifications here in the same format
        ];

        foreach ($specifications as $spec) {
            HandphoneSpecification::create($spec);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Samsung',
                'description' => 'Samsung Electronics Co., Ltd. adalah perusahaan elektronik multinasional asal Korea Selatan.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/24/Samsung_Logo.svg/2560px-Samsung_Logo.svg.png'
            ],
            [
                'name' => 'Apple',
                'description' => 'Apple Inc. adalah perusahaan teknologi multinasional yang berpusat di Cupertino, California, yang merancang, mengembangkan, dan menjual elektronik konsumen, perangkat lunak komputer, dan layanan online.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Apple_logo_black.svg/488px-Apple_logo_black.svg.png'
            ],
            [
                'name' => 'Xiaomi',
                'description' => 'Xiaomi Corporation adalah produsen elektronik swasta milik pribadi dari Tiongkok yang berkantor pusat di Beijing.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Xiaomi_logo_%282021-%29.svg/2048px-Xiaomi_logo_%282021-%29.svg.png'
            ],
            [
                'name' => 'OPPO',
                'description' => 'OPPO Electronics Corp. adalah produsen elektronik konsumen dan komunikasi seluler Tiongkok yang berkantor pusat di Dongguan, Guangdong, RRC.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a6/OPPO_Logo_wiki.png/640px-OPPO_Logo_wiki.png'
            ],
            [
                'name' => 'Vivo',
                'description' => 'Vivo Communication Technology Co. Ltd. adalah perusahaan elektronik China yang berkantor pusat di Dongguan, Guangdong, China.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/df/Vivo_Logo.svg/1200px-Vivo_Logo.svg.png'
            ],
            [
                'name' => 'Google',
                'description' => 'Google LLC adalah perusahaan multinasional Amerika Serikat yang berkekhususan pada jasa dan produk Internet. Google dikenal luas dengan layanan pencarian webnya.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Google_2015_logo.svg/2560px-Google_2015_logo.svg.png'
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand['name'],
                'slug' => Str::slug($brand['name']),
                'description' => $brand['description'],
                'logo' => $brand['logo'],
                'is_active' => true,
            ]);
        }
    }
}

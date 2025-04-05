<?php

namespace Database\Seeders;

use App\Models\Handphone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HandphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $handphones = [
            [
                'name' => 'Xiaomi Redmi 10A',
                'price' => 1500000,
                'camera' => 6,
                'battery' => 8,
                'ram' => 4,
            ],
            [
                'name' => 'Realme C21Y',
                'price' => 1700000,
                'camera' => 7,
                'battery' => 7,
                'ram' => 4,
            ],
            [
                'name' => 'Samsung Galaxy A03',
                'price' => 2000000,
                'camera' => 8,
                'battery' => 6,
                'ram' => 3,
            ],
            [
                'name' => 'Infinix Hot 11',
                'price' => 1800000,
                'camera' => 7,
                'battery' => 9,
                'ram' => 6,
            ],
            [
                'name' => 'Vivo Y15s',
                'price' => 1900000,
                'camera' => 6,
                'battery' => 7,
                'ram' => 3,
            ],
        ];

        foreach ($handphones as $hp) {
            Handphone::create($hp);
        }
    }
}

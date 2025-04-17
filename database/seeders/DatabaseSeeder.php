<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Handphone;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BrandSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            UserSeeder::class,
            BrandSeeder::class,
            HandphoneSeeder::class,
            HandphoneSpecificationSeeder::class,
            CriteriaSeeder::class,
            // HandphoneSmartphoneSeeder::class,
        ]);
    }
}

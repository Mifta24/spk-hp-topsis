<?php

namespace Database\Seeders;

use App\Models\Handphone;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            CriteriaSeeder::class,
            HandphoneSpecificationSeeder::class,
        ]);
    }
}

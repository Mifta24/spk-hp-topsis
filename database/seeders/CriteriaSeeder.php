<?php

namespace Database\Seeders;

use App\Models\Criteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $criterias = [
            ['name' => 'camera', 'label' => 'Kamera', 'type' => 'benefit'],
            ['name' => 'battery', 'label' => 'Baterai', 'type' => 'benefit'],
            ['name' => 'ram', 'label' => 'RAM', 'type' => 'benefit'],
        ];

        foreach ($criterias as $c) {
            Criteria::create($c);
        }
    }
}

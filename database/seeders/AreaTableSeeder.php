<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Area::factory()->create([
             'name' => 'Bar'
         ]);
        Area::factory()->create([
            'name' => 'Zimmer'
        ]);
        Area::factory()->create([
            'name' => 'IT'
        ]);
        Area::factory()->create([
            'name' => 'Keller'
        ]);
        Area::factory()->create([
            'name' => 'Reinigung'
        ]);
    }
}

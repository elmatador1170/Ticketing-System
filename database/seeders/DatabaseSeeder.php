<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Area;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(AreaTableSeeder::class);
        DB::table("areas")->insert([
            'name' => 'Bar'
        ]);
        DB::table("areas")->insert([
            'name' => 'Zimmer'
        ]);
        DB::table("areas")->insert([
            'name' => 'IT'
        ]);
        DB::table("areas")->insert([
            'name' => 'Keller'
        ]);
        DB::table("areas")->insert([
            'name' => 'Reinigung'
        ]);
    }
}

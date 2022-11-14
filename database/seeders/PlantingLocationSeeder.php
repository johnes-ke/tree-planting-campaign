<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantingLocation;

class PlantingLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlantingLocation::create([
            'name'           => 'johndoe',
            'email'          => 'johndou@gmail.com',
            'amount'         => '100',
            'message'        => 'hello',
            'latitude'       => '-4.043477',
            'longitude'      => '39.668206',
            'planting_point' => 'Mombasa',
        ]);

    }
}

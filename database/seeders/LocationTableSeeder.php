<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Coordinates for Jakarta
        $jakartaCoordinates = ['x_coordinate' => -6.2088, 'y_coordinate' => 106.8456];

        // Find the location with forest_name 'Test 1' and update it
        DB::table('locations')
            ->where('forest_name', 'Test 1')
            ->update([
                'x_coordinate' => $jakartaCoordinates['x_coordinate'],
                'y_coordinate' => $jakartaCoordinates['y_coordinate']
            ]);
    }
}

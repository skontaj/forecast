<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Weather;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all();

        foreach ($cities as $city) {
            Weather::updateOrCreate(
                ['city_id' => $city->id],
                [
                    'temperature' => fake()->randomFloat(2, -10, 40), // npr. 23.75 °C
                    'updated_at' => now(), // vreme osvežavanja
                ]
            );
        }
    }
}

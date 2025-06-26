<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Forecast;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = City::all();

        foreach ($cities as $city) {
            for ($i = 0; $i < 5; $i++) {
                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => fake()->randomFloat(2, -10, 40), // temperatura između -10 i 40 °C
                    'date' => fake()->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
                ]);
            }
        }
    }
}

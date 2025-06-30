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
                $weatherType = fake()->randomElement(['sunny', 'rainy', 'snowy']);
                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => fake()->randomFloat(2, -10, 40),
                    'date' => fake()->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'),
                    'weather_type' => $weatherType,
                    'probability' => in_array($weatherType, ['rainy', 'snowy']) ? fake()->numberBetween(1, 100) : null,
                ]);
            }
        }
    }
}

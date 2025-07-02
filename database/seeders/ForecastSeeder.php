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
            $previousTemperature = null;
            // Generate a random start date between -1 month and +1 month
            $startDate = \Carbon\Carbon::parse(fake()->dateTimeBetween('-1 month', '+1 month')->format('Y-m-d'));
            for ($i = 0; $i < 5; $i++) {
                if ($i === 0) {
                    $temperature = fake()->randomFloat(2, -10, 40);
                    $date = $startDate->copy();
                } else {
                    $minTemp = max($previousTemperature - 5, -10);
                    $maxTemp = min($previousTemperature + 5, 40);
                    $temperature = fake()->randomFloat(2, $minTemp, $maxTemp);
                    $date = $startDate->copy()->addDays($i);
                }

                // Determine possible weather types based on temperature
                $possibleWeather = [];
                if ($temperature >= -10 && $temperature <= 1) {
                    $possibleWeather[] = 'snowy';
                }
                if ($temperature >= -10 && $temperature <= 15) {
                    $possibleWeather[] = 'cloudy';
                }
                if ($temperature >= -10 && $temperature <= 40) {
                    $possibleWeather[] = 'sunny';
                    $possibleWeather[] = 'rainy';
                }

                $weatherType = fake()->randomElement($possibleWeather);

                $previousTemperature = $temperature;

                Forecast::create([
                    'city_id' => $city->id,
                    'temperature' => $temperature,
                    'date' => $date->format('Y-m-d'),
                    'weather_type' => $weatherType,
                    'probability' => in_array($weatherType, ['rainy', 'snowy']) ? fake()->numberBetween(1, 100) : null,
                ]);
            }
        }
    }
}

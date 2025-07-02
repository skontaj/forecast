<?php

namespace App\Http;

class ForecastHelper
{
    const WEATHER_TYPES = [
        'sunny' => 'fa-sun',
        'rainy' => 'fa-cloud-showers-heavy',
        'snowy' => 'fa-snowflake',
    ];

    const TEMPERATURE_COLORS = [
        'cold' => 'text-blue-300',
        'cool' => 'text-blue-500',
        'warm' => 'text-green-500',
        'hot' => 'text-red-500',
    ];

    public static function getTemperatureColor($temperature)
    {
        return $temperature < 0 ? self::TEMPERATURE_COLORS['cold']
            : ($temperature < 15 ? self::TEMPERATURE_COLORS['cool']
                : ($temperature < 30 ? self::TEMPERATURE_COLORS['warm']
                    : self::TEMPERATURE_COLORS['hot']));
    }

    public static function getWeatherIcon($weatherCondition)
    {
        return self::WEATHER_TYPES[$weatherCondition] ?? 'fa-question';
    }
}
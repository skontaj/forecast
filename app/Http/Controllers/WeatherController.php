<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function index()
    {
        $weatherData = Weather::with('city')->get(); // učitava i povezani grad

        return view('weather.index', compact('weatherData'));
    }
}

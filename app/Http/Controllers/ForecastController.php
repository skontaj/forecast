<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class ForecastController extends Controller
{
    
    public function show(City $city)
    {
        // Uzima zadnjih 5 prognoza (po datumu)
        $forecasts = $city->forecasts()->orderByDesc('date')->take(5)->get();

        return view('forecast.show', compact('city', 'forecasts'));
    }

}

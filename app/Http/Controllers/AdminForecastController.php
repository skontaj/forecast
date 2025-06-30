<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forecast;

class AdminForecastController extends Controller
{
    public function create(Request $request)
    {
        $validated = request()->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|numeric',
            'date' => 'required|date',
            'weather_type' => 'required|string|in:sunny,rainy,snowy',
            'probability' => 'nullable|integer|min:1|max:100',
        ]);
        // Kreiraj novu prognozu
        $probability = $validated['weather_type'] === 'sunny' ? null : ($validated['probability'] ?? null);
        
        Forecast::create([
            'city_id' => $validated['city_id'],
            'temperature' => $validated['temperature'],
            'date' => $validated['date'],
            'weather_type' => $validated['weather_type'],
            'probability' => $probability,
        ]);

        return redirect()->back()->with('success', 'Forecast created successfully.');

    }
    
}

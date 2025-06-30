<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class AdminWeatherController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|numeric', // temperatura između -10 i 40 °C
        ]);

        Weather::updateOrCreate(
            ['city_id' => $validated['city_id']],
            ['temperature' => $validated['temperature'], 'updated_at' => now()]
        );

        return redirect()->back()->with('success', 'Weather updated successfully.');
    }
}

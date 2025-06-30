<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\AdminForecastController;


Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index')->middleware(['auth', 'verified']);
Route::get('/forecast/{city}', [ForecastController::class, 'show'])->name('forecast.show')->middleware(['auth', 'verified']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/weather', function () {
    return view('admin.weather.index');
})->middleware(['auth', 'verified'])->name('admin.weather.index');
Route::put('/admin/weather/update', [AdminWeatherController::class, 'update'])->name('admin.weather.update')->middleware(['auth', 'verified']);

Route::get('/admin/forecast', function () {
    return view('admin.forecast.index');
})->middleware(['auth', 'verified'])->name('admin.forecast.index');

Route::post('/admin/forecast/create', [AdminForecastController::class, 'create'])->name('admin.forecast.create')->middleware(['auth', 'verified']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

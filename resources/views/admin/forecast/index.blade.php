<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Forecasts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.forecast.create') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label for="city_id" class="block mb-1 text-gray-700 dark:text-gray-300">City</label>
                            <select name="city_id" id="city_id" class="w-full border border-gray-300 dark:border-gray-700 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select City</option>
                                @foreach(\App\Models\City::all() as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="temperature" class="block mb-1 text-gray-700 dark:text-gray-300">Temperature</label>
                            <input type="text" name="temperature" id="temperature" placeholder="Temperature" class="w-full border border-gray-300 dark:border-gray-700 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="weather_type" class="block mb-1 text-gray-700 dark:text-gray-300">Weather Type</label>
                            <select name="weather_type" id="weather_type" class="w-full border border-gray-300 dark:border-gray-700 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="">Select Weather Type</option>
                                <option value="sunny">Sunny</option>
                                <option value="rainy">Rainy</option>
                                <option value="snowy">Snowy</option>
                            </select>
                        </div>
                        <div>
                            <label for="probability" class="block mb-1 text-gray-700 dark:text-gray-300">Probability (1-100)</label>
                            <input type="number" name="probability" id="probability" min="1" max="100" placeholder="Probability (1-100)" class="w-full border border-gray-300 dark:border-gray-700 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label for="date" class="block mb-1 text-gray-700 dark:text-gray-300">Date</label>
                            <input type="date" name="date" id="date" class="w-full border border-gray-300 dark:border-gray-700 rounded p-2 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                Add Forecast
                            </button>
                        </div>
                    </form>

                    @foreach(\App\Models\City::all() as $city)
                        <div class="mt-6">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $city->name }}</h3>
                            <ul class="mt-2 space-y-2">
                                @foreach($city->forecasts as $forecast)
                                    <li class="flex items-center justify-between p-2 bg-gray-100 dark:bg-gray-700 rounded shadow text-sm">
                                        <div>
                                            <div><strong>{{ $forecast->date }}</strong></div>
                                            @php
                                                $tempColor = \App\Http\ForecastHelper::getTemperatureColor($forecast->temperature);
                                                $weatherIcon = \App\Http\ForecastHelper::getWeatherIcon($forecast->weather_type);
                                            @endphp
                                            <div>
                                                <span class="{{ $tempColor }}">{{ number_format($forecast->temperature, 2) }} °C</span> - <i class="fas {{ $weatherIcon }}"></i>  {{ ucfirst($forecast->weather_type) }}
                                            </div>
                                        </div>
                                        <div class="w-20 text-right">
                                            @if($forecast->probability)
                                                {{ $forecast->probability }}%
                                            @else
                                                &nbsp;
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

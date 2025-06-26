<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="max-w-xl mx-auto bg-white dark:bg-gray-900 shadow rounded p-6 mt-6">
                        <h2 class="text-2xl font-bold mb-4">🗓 Forecast for {{ $city->name }}</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-100 dark:bg-gray-800">
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Date</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Temperature (°C)</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                                    @forelse ($forecasts as $forecast)
                                        <tr>
                                            <td class="px-4 py-2 whitespace-nowrap">
                                                {{ \Carbon\Carbon::parse($forecast->date)->format('d.m.Y') }}
                                            </td>
                                            <td class="px-4 py-2 whitespace-nowrap">
                                                {{ number_format($forecast->temperature, 2) }} °C
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="px-4 py-2 text-center text-gray-500">
                                                No forecast data available.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('weather.index') }}" class="text-blue-500 text-sm inline-block mt-4 hover:underline">← Back to current temperatures</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
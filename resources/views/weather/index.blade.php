<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Weather') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-900 rounded-lg shadow-md p-4">
                        <h1 class="text-xl font-semibold mb-4 text-gray-800 dark:text-gray-100">🌤 Current temperature by city</h1>
                        <table class="w-full text-sm">
                            <thead>
                                <tr>
                                    <th class="py-2 px-3 text-left text-gray-700 dark:text-gray-300">City</th>
                                    <th class="py-2 px-3 text-right text-gray-700 dark:text-gray-300">Temperature (°C)</th>
                                    <th class="py-2 px-3 text-right text-gray-700 dark:text-gray-300">Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($weatherData as $entry)
                                    <tr class="border-b border-gray-200 dark:border-gray-700">
                                        <td class="py-2 px-3 text-gray-900 dark:text-gray-100">
                                            <a href="{{ route('forecast.show', $entry->city->id) }}" class="text-blue-600 hover:underline">
                                                {{ $entry->city->name }}
                                            </a>
                                        </td>
                                        <td class="py-2 px-3 text-right text-gray-900 dark:text-gray-100">{{ number_format($entry->temperature, 2) }}</td>
                                        <td class="py-2 px-3 text-right text-xs text-gray-500 dark:text-gray-400">{{ $entry->updated_at->format('d.m.Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Weather') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form action="{{ route('admin.weather.update') }}" class="space-y-4" method="POST">
                        @csrf
                        @method('PUT')
                        <input 
                            type="text" 
                            name="temperature" 
                            placeholder="Temperature"
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                        <select 
                            name="city_id" 
                            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 mb-4"
                        >
                            <option value="">Odaberi grad</option>
                            @foreach(\App\Models\City::all() as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        <button 
                            type="submit" 
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition-colors duration-200"
                        >
                            Save
                        </button>
                    </form>

                    <div class="mt-8 space-y-4">
                        @foreach(\App\Models\Weather::all() as $weather)
                            <div class="p-4 rounded bg-gray-100 dark:bg-gray-700 shadow">
                                <div><strong>City:</strong> <span class="text-gray-800 dark:text-gray-200">{{ $weather->city->name }}</span></div>
                                <div><strong>Temperature:</strong> <span class="text-blue-700 dark:text-blue-300">{{ number_format($weather->temperature, 2) }} °C</span></div>
                                <div><strong>Updated at:</strong> <span class="text-gray-600 dark:text-gray-400">{{ $weather->updated_at->format('d.m.Y H:i') }}</span></div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
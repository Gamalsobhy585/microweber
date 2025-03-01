<x-filament::widget>
    <x-filament::card>
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold tracking-tight">{{ static::$heading }}</h2>
                <p class="text-3xl font-bold">{{ $extraInformation['users_online'] }} Online</p>
                <p class="text-sm text-gray-500">{{ $extraInformation['users_online'] }} Users online</p>
            </div>
            
            @if ($filters)
                <select wire:model="filter" class="text-xs border-gray-300 rounded-lg shadow-sm focus:border-primary-500 focus:ring-primary-500">
                    @foreach ($filters as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            @endif
        </div>

        <div
            x-data="{ chart: null }"
            x-init="
                chart = new Chart($refs.canvas, {
                    type: '{{ $type }}',
                    data: {{ json_encode($data) }},
                    options: {{ json_encode($options) }}
                })
                
                $wire.on('filterChart', ({ data }) => {
                    chart.data = data
                    chart.update()
                })
            "
            class="relative mt-4"
        >
            <canvas x-ref="canvas" @if($pollingInterval) wire:poll.{{ $pollingInterval }}="updateChartData" @endif></canvas>
        </div>

        <!-- Add the statistics at the bottom -->
        <div class="flex items-center space-x-6 mt-4 text-gray-500">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                <span class="font-medium">{{ $extraInformation['views'] }}</span>
            </div>
            
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="font-medium">{{ $extraInformation['visitors'] }}</span>
            </div>
        </div>
    </x-filament::card>
</x-filament::widget>
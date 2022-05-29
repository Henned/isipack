<div class="container mx-auto mt-12">
    <div class="flex flex-col items-center">
        <div class="text-xl mb-12">
            <p>Momentan Online: <span class="text-green-500">{{ $onlineUsers }}</span></p>
            
        </div>
        <div class="h-96 w-3/4">
            <livewire:livewire-column-chart
    
            :column-chart-model="$columnChartModel"
        
        />
        </div>
    </div>
</div>

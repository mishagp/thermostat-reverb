<div class="border-solid border-2 border-black rounded p-5 drop-shadow-lg bg-white md:w-1/2 lg:w-1/4 w-full">
    <p class="text-2xl">Live Temperature 🌡️</p>
    <div class="flex items-center justify-center flex-col">
        @if($temperature)
            <p class="text-8xl mb-4 mt-4">{{$temperature}}°</p>
            <p>📡 Received at {{$lastCollectedAt->format('h:i:s')}}</p>
        @else
            <p class="mb-4 mt-4">No data collected yet</p>
        @endif
    </div>
</div>

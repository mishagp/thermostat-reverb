<?php

namespace App\Livewire;

use App\Events\DataPointReceived;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Event;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class TemperatureStatus extends Component
{
    public ?float $temperature = 0;
    public ?Carbon $lastCollectedAt = null;

    public function render(): View
    {
        if (Cache::has('temperature')) {
            $this->temperature = Cache::get('temperature', 0.0);
        } else {
            $this->temperature = Cache::put('temperature', 0.0);
        }

        $this->lastCollectedAt = Cache::get('lastCollectedAt', null);
        return view('livewire.temperature-status', [
            'temperature' => $this->temperature,
            'lastCollectedAt' => $this->lastCollectedAt,
        ]);
    }

    #[On('echo:data-feed,DataPointReceived')]
    public function onNewDataPoint(array $event): void
    {
        $this->temperature = Cache::get('temperature', $event['dataPoint']);
        $this->lastCollectedAt = Carbon::now('America/Chicago');
    }

    public function increment(): void
    {
        Event::dispatch(new DataPointReceived((float) Cache::increment('temperature')));
    }

    public function decrement(): void
    {
        Event::dispatch(new DataPointReceived((float) Cache::decrement('temperature')));
    }
}

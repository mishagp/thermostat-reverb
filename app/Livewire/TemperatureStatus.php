<?php

namespace App\Livewire;

use Carbon\Carbon;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class TemperatureStatus extends Component
{
    public ?float $temperature = null;
    public ?Carbon $lastCollectedAt = null;

    public function render(): View
    {
        return view('livewire.temperature-status', [
            'temperature' => $this->temperature,
            'lastCollectedAt' => $this->lastCollectedAt,
        ]);
    }

    #[On('echo:data-feed,DataPointReceived')]
    public function onNewDataPoint(array $event): void
    {
        $this->temperature = $event['dataPoint'];
        $this->lastCollectedAt = Carbon::now('America/Chicago');
    }
}

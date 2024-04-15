<?php

namespace App\Http\Controllers;

use App\Events\DataPointReceived;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class DataIngestController extends Controller
{
    public function receiveDataPoint(Request $request): JsonResponse {
        $dataPoint = $request->input('dataPoint');
        if ($dataPoint === null) {
            return response()->json([], 400);
        }
        $formatted = number_format($dataPoint, 2);
        Event::dispatch(new DataPointReceived((float) $formatted));
        return response()->json();
    }
}

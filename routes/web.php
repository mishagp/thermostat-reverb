<?php

use App\Http\Controllers\DataIngestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('/data-points', [DataIngestController::class, 'receiveDataPoint']);

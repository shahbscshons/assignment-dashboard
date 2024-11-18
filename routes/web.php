<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnalyticsController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [AnalyticsController::class, 'index']);


<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\TravelController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/hoteles', [TravelController::class, 'getHoteles']);
Route::get('/vuelos', [TravelController::class, 'getVuelos']);

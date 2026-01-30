<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TravelController;
use App\Http\Controllers\Admin\HotelController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/admin/hotels', [HotelController::class, 'store']);
Route::get('/destinations', function () {
    return \App\Models\Destination::all();
});

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Flight;

class TravelController extends Controller
{
    public function getHoteles()
    {
        return response()->json(Hotel::all());
    }

    public function getFlights()
    {
        return response()->json(Flight::all());
    }
}

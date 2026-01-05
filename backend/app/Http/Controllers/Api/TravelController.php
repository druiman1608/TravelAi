<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Vuelo;

class TravelController extends Controller
{
    public function getHoteles()
    {
        return response()->json(Hotel::all());
    }

    public function getVuelos()
    {
        return response()->json(Vuelo::all());
    }
}

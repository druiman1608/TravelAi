<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;
    
    protected $table = 'reservations';

    protected $fillable = [
        'user_id',
        'package_id',
        'hotel_id',
        'flight_id',
        'fecha',
        'estado',
        'importe_pagado',
    ];
}

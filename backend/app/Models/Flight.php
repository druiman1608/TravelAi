<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flights';

    protected $fillable = [
        'numero_vuelo',
        'aerolinea',
        'origen',
        'destino',
        'hora_de_salida',
        'hora_de_llegada',
        'asientos_disponibles',
        'precio'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vuelo extends Model
{
    protected $table = 'vuelos';
    protected $fillable = ['numero_vuelo', 'aerolinea', 'origen', 'destino', 'hora_de_salida', 'hora_de_llegada', 'asientos_disponibles', 'precio'];
}

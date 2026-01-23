<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    protected $table = 'destinations';

    protected $fillable = [
        'nombre_ciudad',
        'pais',
        'clima',
        'categoria_ia',
        'descripcion_ia',
    ];
}

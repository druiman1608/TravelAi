<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hoteles';
    protected $fillable = ['nombre', 'ciudad', 'direccion', 'estrellas', 'precio_por_noche', 'descripcion', 'imagen_url'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    
    protected $table = 'hotels';

    protected $fillable = [
        'nombre',
        'ciudad',
        'direccion',
        'estrellas',
        'precio_por_noche',
        'descripcion',
        'imagen_url'
    ];
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TablasBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Hoteles
        \App\Models\Hotel::create([
            'nombre' => 'Hotel Gran Vía',
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Gran Vía 12',
            'estrellas' => 4,
            'precio_por_noche' => 120.50,
            'descripcion' => 'Un hotel de lujo en el corazón de Madrid.'
        ]);

        \App\Models\Hotel::create([
            'nombre' => 'Beach Resort',
            'ciudad' => 'Barcelona',
            'direccion' => 'Paseo Marítimo 5',
            'estrellas' => 5,
            'precio_por_noche' => 250.00,
            'descripcion' => 'Vistas increíbles al mar Mediterráneo.'
        ]);

        // Vuelos
        \App\Models\Vuelo::create([
            'numero_vuelo' => 'IB3402',
            'aerolinea' => 'Iberia',
            'origen' => 'Madrid',
            'destino' => 'Barcelona',
            'hora_de_salida' => '2026-06-01 08:00:00',
            'hora_de_llegada' => '2026-06-01 09:15:00',
            'asientos_disponibles' => 120,
            'precio' => 45.99
        ]);

        \App\Models\Vuelo::create([
            'numero_vuelo' => 'VY1020',
            'aerolinea' => 'Vueling',
            'origen' => 'Sevilla',
            'destino' => 'París',
            'hora_de_salida' => '2026-06-10 12:00:00',
            'hora_de_llegada' => '2026-06-10 14:30:00',
            'asientos_disponibles' => 80,
            'precio' => 89.00
        ]);
    }
}

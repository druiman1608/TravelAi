<?php

namespace Database\Seeders;

use App\Models\Flight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Flight::factory()->count(10)->create();

        // // Vuelos
        // \App\Models\Flight::create([
        //     'numero_vuelo' => 'IB3402',
        //     'aerolinea' => 'Iberia',
        //     'origen' => 'Madrid',
        //     'destino' => 'Barcelona',
        //     'hora_de_salida' => '2026-06-01 08:00:00',
        //     'hora_de_llegada' => '2026-06-01 09:15:00',
        //     'asientos_disponibles' => 120,
        //     'precio' => 45.99
        // ]);

        // \App\Models\Flight::create([
        //     'numero_vuelo' => 'VY1020',
        //     'aerolinea' => 'Vueling',
        //     'origen' => 'Sevilla',
        //     'destino' => 'París',
        //     'hora_de_salida' => '2026-06-10 12:00:00',
        //     'hora_de_llegada' => '2026-06-10 14:30:00',
        //     'asientos_disponibles' => 80,
        //     'precio' => 89.00
        // ]);
    }
}

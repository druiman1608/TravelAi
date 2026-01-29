<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hotel::factory()->count(10)->create();

        // // Hoteles
        // \App\Models\Hotel::create([
        //     'nombre' => 'Hotel Gran Vía',
        //     'ciudad' => 'Madrid',
        //     'direccion' => 'Calle Gran Vía 12',
        //     'estrellas' => 4,
        //     'precio_noche' => 120.50,
        //     'descripcion' => 'Un hotel de lujo en el corazón de Madrid.'
        // ]);

        // \App\Models\Hotel::create([
        //     'nombre' => 'Beach Resort',
        //     'ciudad' => 'Barcelona',
        //     'direccion' => 'Paseo Marítimo 5',
        //     'estrellas' => 5,
        //     'precio_noche' => 250.00,
        //     'descripcion' => 'Vistas increíbles al mar Mediterráneo.'
        // ]);
    }
}

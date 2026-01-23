<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Destinos

        \App\Models\Destination::create([
            'nombre_ciudad' => 'París',
            'pais' => 'Francia',
            'clima' => 'Templado',
            'categoria_ia' => 'Cultural',
            'descripcion_ia' => 'París, la ciudad del amor, es famosa por su arquitectura impresionante, museos de renombre mundial como el Louvre, y monumentos icónicos como la Torre Eiffel y la Catedral de Notre-Dame.'
        ]);

        \App\Models\Destination::create([
            'nombre_ciudad' => 'Tokio',
            'pais' => 'Japón',
            'clima' => 'Templado',
            'categoria_ia' => 'Tecnológico',
            'descripcion_ia' => 'Tokio, una metrópolis vibrante que combina tradición y modernidad, ofrece desde templos históricos hasta rascacielos futuristas, además de una escena culinaria excepcional y tecnología de vanguardia.'
        ]);
    }
}

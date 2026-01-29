<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DestinationFactory extends Factory
{

    protected $model = \App\Models\Destination::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_ciudad' => fake()->city(),
            'pais'=> fake()->country(),
            'clima' => fake()->randomElement(['Tropical', 'Seco', 'Templado', 'Continental', 'Polar']),
            'categoria_ia' => fake()->randomElement(['Playa','Montaña','Ciudad','Cultural','Aventura']),
            'descripcion_ia' => fake()->paragraph(),
        ];
    }
}

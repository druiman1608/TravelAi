<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VueloFactory extends Factory
{

    protected $model = \App\Models\Vuelo::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'numero_vuelo' => fake()->bothify('??####'),
            'aerolinea' => fake()->company(),
            'origen' => fake()->city(),
            'destino' => fake()->city(),
            'hora_de_salida' => fake()->dateTimeBetween('+1 days', '+1 month'),
            'hora_de_llegada' => fake()->dateTimeBetween('+1 days','+1 month'),
            'asientos_disponibles' => fake()->numberBetween(50, 300),
            'precio' => fake()->randomFloat(2, 50, 500),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FlightFactory extends Factory
{

    protected $model = \App\Models\Flight::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_vuelo' => fake()->bothify('??####'),
            'origen' => fake()->city(),
            'destino' => fake()->city(),
            'aerolinea' => fake()->company(),
            'fecha_salida' => fake()->dateTimeBetween('+1 days', '+1 month'),
            'fecha_llegada' => fake()->dateTimeBetween('+1 days','+1 month'),
            'asientos_disponibles' => fake()->numberBetween(50, 300),
            'precio' => fake()->randomFloat(2, 50, 500),
        ];
    }
}

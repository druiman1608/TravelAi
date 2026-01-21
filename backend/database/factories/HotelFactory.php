<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class HotelFactory extends Factory
{

    protected $model = \App\Models\Hotel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->company(),
            'ciudad' => fake()->city(),
            'direccion' => fake()->address(),
            'estrellas'=> fake()->numberBetween(1, 5),
            'precio_por_noche'=> fake()->numberBetween(50, 500),
            'descripcion'=> fake()->paragraph(),
        ];
    }
}

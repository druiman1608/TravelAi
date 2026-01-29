<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PackageFactory extends Factory
{

    protected $model = \App\Models\Package::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' => \App\Models\Hotel::factory(),
            'flight_id' => \App\Models\Flight::factory(),
            'nombre' => fake()->sentence(3),
            'precio' => fake()->randomFloat(2, 200, 2000),
            'descripcion' => fake()->paragraph(),
            ];
    }
}

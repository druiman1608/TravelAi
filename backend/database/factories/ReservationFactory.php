<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReservationFactory extends Factory
{

    protected $model = \App\Models\Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'package_id' => \App\Models\Package::factory(),
            'hotel_id' => \App\Models\Hotel::factory(),
            'flight_id' => \App\Models\Flight::factory(),
            'fecha' => fake()->dateTimeBetween('-1 month', 'now'),
            'estado' => fake()->randomElement(['Pendiente', 'Confirmada', 'Cancelada']),
            'importe_pagado' => fake()->randomFloat(2, 100, 3000),
        ];
    }
}

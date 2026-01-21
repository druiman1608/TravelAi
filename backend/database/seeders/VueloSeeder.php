<?php

namespace Database\Seeders;

use App\Models\Vuelo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VueloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vuelo::factory()->count(10)->create();
    }
}

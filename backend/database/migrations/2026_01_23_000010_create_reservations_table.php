<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            $table->foreignId('package_id')
                  ->constrained('packages')
                  ->onDelete('cascade');

            $table->foreignId('hotel_id')
                  ->constrained('hotels')
                  ->onDelete('cascade');

            $table->foreignId('flight_id')
                  ->constrained('flights')
                  ->onDelete('cascade');

            $table->date('fecha');
            $table->string('estado');
            $table->decimal('importe_pagado', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

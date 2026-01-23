<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')
                  ->constrained('destinations')
                  ->onDelete('cascade');

            $table->string('codigo_vuelo');
            $table->string('origen');
            $table->string('destino');
            $table->string('aerolinea');
            $table->dateTime('fecha_salida');
            $table->dateTime('fecha_llegada');
            $table->unsignedInteger('asientos_disponibles');
            $table->decimal('precio', 8, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};

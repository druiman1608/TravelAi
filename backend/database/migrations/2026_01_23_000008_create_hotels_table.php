<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('destination_id')
                  ->constrained('destinations')
                  ->onDelete('cascade');

            $table->string('nombre');
            $table->string('ciudad');
            $table->string('direccion');
            $table->unsignedTinyInteger('estrellas');
            $table->decimal('precio_noche', 8, 2);
            $table->text('descripcion');
            $table->string('imagen_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sesion_juegos', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Llave foránea
            $table->dateTime('inicioSesion'); // Fecha y hora de inicio de la sesión
            $table->dateTime('finSesion'); // Fecha y hora de fin de la sesión
            $table->decimal('totalApostado', 10, 2); // Total apostado en la sesión
            $table->decimal('totalGanado', 10, 2); // Total ganado en la sesión
            $table->timestamps(); // created_at y updated_at
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesion_juegos');
    }
};

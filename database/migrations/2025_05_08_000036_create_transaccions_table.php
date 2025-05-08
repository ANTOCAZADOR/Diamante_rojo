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
        Schema::create('transaccions', function (Blueprint $table) {
            $table->id();
            
            // Nuevos atributos
            $table->enum('tipo', ['recarga', 'retiro', 'premio', 'ajuste']);
            $table->decimal('monto', 10, 2); // Puedes ajustar la precisión si lo deseas
            $table->string('descripcion');
            $table->dateTime('fecha')->nullable();
            
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccions');
    }
};

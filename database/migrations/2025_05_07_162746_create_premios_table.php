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
        Schema::create('premios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('descripcion');
            $table->decimal('monto', 10, 2)->default(0);
            $table->timestamp('fecha_reclamado')->nullable();
            $table->timestamp('fechaObtenido')->nullable(); // Nueva columna
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('premios');
    }
};

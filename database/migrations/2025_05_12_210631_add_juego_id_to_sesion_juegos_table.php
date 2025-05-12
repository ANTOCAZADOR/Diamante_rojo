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
        Schema::table('sesion_juegos', function (Blueprint $table) {
            $table->foreignId('juego_id')->constrained('juegos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sesion_juegos', function (Blueprint $table) {
            $table->dropForeign(['juego_id']);
            $table->dropColumn('juego_id');
        });
    }
};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    protected $fillable = [
       'name', 
       'descripcion', 
       'tipo', 
       'activo',
    ];

    public function sesiones()
    {
        return $this->hasMany(SesionJuego::class);
    }

}

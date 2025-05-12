<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SesionJuego extends Model
{
    protected $fillable = [
        'inicioSesion',
        'finSesion',
        'totalApostado',
        'totalGanado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

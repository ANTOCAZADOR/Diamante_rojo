<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    protected $fillable = [
        'tipo',
        'monto',
        'descripcion',
        'fecha', 
    ];

    protected $casts = [
        'fecha' => 'datetime',
    ];
    
}
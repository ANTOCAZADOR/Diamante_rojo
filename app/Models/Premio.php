<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $fillable = [
        'name',
        'descripcion',
        'monto',
        'fechaObtenido',
        'fecha_reclamado', // FALTABA 
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apuesta extends Model
{
    protected $fillable = [
        'user_id',
        'montoApostado',
        'resultado',
        'ganancia',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
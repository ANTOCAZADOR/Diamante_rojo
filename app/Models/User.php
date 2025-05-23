<?php

namespace App\Models;

use App\Notifications\SaldoBajo;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'apellido',
        'email',
        'password',
        'saldo',
        'rol',
        'fechaRegistro',
        'estado',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function apuestas()
    {
        return $this->hasMany(Apuesta::class);
    }

    public function sesiones()
    {
        return $this->hasMany(SesionJuego::class);
    }

    // Modelo User.php
    public function setSaldoAttribute($value)
    {
        $this->attributes['saldo'] = number_format($value, 2, '.', ''); // Asegura el formato correcto
    }

    public function verificarSaldo()
    {
        $user = User::find(1); // Obtén al usuario. Puede ser el que esté logueado o el que elijas

        if ($user->saldo < 50) {
            $user->notify(new SaldoBajo($user->saldo));
        }

        return 'Verificación realizada.';
    }
}

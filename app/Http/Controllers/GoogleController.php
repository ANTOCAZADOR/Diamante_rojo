<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;


class GoogleController extends Controller
{
     public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(16)), // contraseña aleatoria
                ]);
            }

            Auth::login($user);

            return redirect()->route('dashboard'); // cambia según tu ruta de inicio
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Error al iniciar sesión con Google.');
        }
    }

}

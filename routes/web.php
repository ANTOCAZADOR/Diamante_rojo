<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Notifications\EventoCasino;

Route::get('/', function () {
    return view('welcome');
});

Route::resource( 'user', UserController::class); 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/probar-correo', function () {
    $user = User::first(); // Usa el primer usuario de la base de datos

    if ($user) {
        $user->notify(new EventoCasino());
        return '📧 Correo de prueba enviado a ' . $user->email;
    } else {
        return '❌ No hay usuarios en la base de datos.';
    }
});

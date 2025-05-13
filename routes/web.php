<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ApuestaController;
use App\Http\Controllers\DadoController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\SaldoController;
use App\Http\Controllers\SesionJuegoController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Notifications\EventoCasino;
use App\Notifications\SaldoBajo;
use Inertia\Inertia;
use Illuminate\Http\Request;

// Ruta principal — Redirige según esté autenticado o no
Route::get('/', function () {
    return view('users.index-user');
});

// Recursos del usuario
Route::resource('user', UserController::class);

//Rutas para las apuestas 
Route::resource('apuestas', ApuestaController::class);
/*Route::middleware('auth')->group(function () {
    Route::get('/apuestas', [ApuestaController::class, 'index']);
});*/

//Rutas para los premios 
Route::resource('premios', PremioController::class); 
Route::post('/reclamar-premio/{premioId}', [SaldoController::class, 'reclamarPremio'])->name('saldo.reclamar');



//Ruta para las transacciones
Route::resource('transacciones', TransaccionController::class); 

//Ruta para los juegos 
Route::resource('juegos', JuegoController::class); 

//Ruta para la sesión de juegos
Route::resource('sesionjuegos', SesionJuegoController::class);

Route::get('/sesiones/crear', [SesionJuegoController::class, 'crearSesion']);
Route::get('/sesiones/usuario/{id}', [SesionJuegoController::class, 'mostrarSesiones']);
Route::get('/sesiones/{id}/usuario', [SesionJuegoController::class, 'mostrarUsuarioSesion']);


//Rutas para el dado
Route::middleware(['auth'])->group(function () {
    Route::get('/juego/dado', [DadoController::class, 'index'])->name('dado.index');
    Route::post('/juego/dado', [DadoController::class, 'jugar'])->name('dado.jugar');
});

//Para el saldo 
Route::get('/recargar-saldo', function () {
    return view('recargar');
})->middleware('auth')->name('saldo.recargar.vista');
Route::post('/saldo/retirar', [SaldoController::class, 'retirar'])->name('saldo.retirar');
Route::view('/saldo/retirar', 'saldo.retirar')->middleware('auth')->name('vista.retirar');


Route::post('/recargar-saldo', [SaldoController::class, 'recargar'])->name('saldo.recargar');


// Middleware para rutas protegidas por login y verificación de correo
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//Comprobar el saldo
Route::get('/probar-saldo-bajo', function () {
    $user = User::first(); // Cambia si deseas probar con otro usuario específico
    if ($user) {
        if ($user->saldo < 50) {
            $user->notify(new SaldoBajo($user->saldo));
            return '📧 Notificación de saldo bajo enviada a ' . $user->email;
        } else {
            return '✔️ El saldo del usuario es suficiente.';
        }
    } else {
        return '❌ No hay usuarios en la base de datos.';
    }
})->middleware(['auth']);


//Rutas de google 
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);






//Estos estan comentados por si se ocupan en el futuro. 
// Ruta para enviar correo de prueba
/*Route::get('/probar-correo', function () {
    $user = User::first(); // Cambia si deseas probar con otro usuario específico
    if ($user) {
        $user->notify(new EventoCasino());
        return '📧 Correo de prueba enviado a ' . $user->email;
    } else {
        return '❌ No hay usuarios en la base de datos.';
    }
})->middleware(['auth']); // Solo usuarios autenticados pueden probar

// Ruta para reenviar notificación de verificación de correo
/*Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1']);


/*Route::get('/', function () {
    return Inertia::render('Inicio');
});

/*Route::get('/', function () {
    return Inertia::render('Welcome');
});*/
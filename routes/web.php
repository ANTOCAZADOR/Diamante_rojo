<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Notifications\EventoCasino;
use Inertia\Inertia;
use Illuminate\Http\Request;

// Ruta principal — Redirige según esté autenticado o no
Route::get('/', function () {
    return view('users.index-user');
});

// Recursos del usuario
Route::resource('user', UserController::class);

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

// Ruta para enviar correo de prueba
Route::get('/probar-correo', function () {
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
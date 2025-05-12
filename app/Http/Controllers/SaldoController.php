<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaccion;
use App\Models\Premio;

class SaldoController extends Controller
{
    public function recargar(Request $request)
    {
        // Validar monto, puedes agregar más validaciones si es necesario
        $request->validate([
            'monto' => 'required|numeric|min:1',
        ]);

        // Obtener el usuario autenticado
        $user = auth()->user();

        // Crear la transacción
        $transaccion = new Transaccion();
        $transaccion->tipo = 'recarga';
        $transaccion->monto = $request->monto;
        $transaccion->descripcion = 'Recarga de saldo';
        $transaccion->fecha = now();
        $transaccion->user_id = $user->id; // Asignamos el user_id
        $transaccion->save();

        // Actualizar saldo del usuario
        $user->saldo += $request->monto;
        $user->save();

        return redirect('/user'); // Redirigir a donde necesites
    }

    public function retirar(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|min:1',
        ]);

        $user = auth()->user();

        if ($user->saldo < $request->monto) {
            return back()->with('error', 'Saldo insuficiente para el retiro.');
        }

        // Registrar la transacción
        $transaccion = new Transaccion();
        $transaccion->tipo = 'retiro';
        $transaccion->monto = -$request->monto;
        $transaccion->descripcion = 'Retiro de saldo';
        $transaccion->fecha = now();
        $transaccion->user_id = $user->id;
        $transaccion->save();

        // Actualizar saldo
        $user->saldo -= $request->monto;
        $user->save();

        return redirect('/user')->with('success', 'Retiro realizado correctamente.');
    }

    public function reclamarPremio($premioId)
    {
        $user = auth()->user();
        $premio = Premio::find($premioId);

        if (!$premio) {
            return back()->with('error', 'El premio no existe.');
        }

        if ($premio->fechaObtenido) {
            return back()->with('error', 'Este premio ya ha sido reclamado.');
        }

        // Crear la transacción de premio
        $transaccion = new Transaccion();
        $transaccion->tipo = 'premio';
        $transaccion->monto = $premio->monto; // monto positivo
        $transaccion->descripcion = 'Reclamo de premio: ' . $premio->name;
        $transaccion->fecha = now();
        $transaccion->user_id = $user->id;
        $transaccion->save();

        // Actualizar el saldo del usuario (sumar)
        $user->saldo += $premio->monto;
        $user->save();

        // Marcar el premio como reclamado
        $premio->fechaObtenido = now();
        $premio->save();

        return redirect('/user')->with('success', '¡Premio reclamado exitosamente!');
    }
}

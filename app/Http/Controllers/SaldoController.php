<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaccion;

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
}

<?php

namespace App\Http\Controllers;

use App\Models\Apuesta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DadoController extends Controller
{
    public function index()
    {
        return view('juegos.dado');
    }

    public function jugar(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer|min:1|max:6',
            'monto' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();

        if ($user->saldo < $request->monto) {
            return back()->with('error', 'No tienes saldo suficiente.');
        }

        $numeroElegido = $request->numero;
        $numeroLanzado = rand(1, 6);
        $monto = $request->monto;
        $resultado = 'perdio';
        $ganancia = 0;

        if ($numeroElegido == $numeroLanzado) {
            $ganancia = $monto * 1.10;
            $user->saldo += $ganancia;
            $resultado = 'gano';
        } else {
            $user->saldo -= $monto;
        }

        $user->save();

        Apuesta::create([
            'user_id' => auth()->id(),
            'montoApostado' => $monto,
            'resultado' => $resultado,
            'ganancia' => $ganancia,
        ]);

        return view('juegos.resultado-dado', compact('numeroElegido', 'numeroLanzado', 'resultado', 'ganancia'));
    }
}

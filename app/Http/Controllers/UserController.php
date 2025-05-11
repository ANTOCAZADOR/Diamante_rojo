<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index-user', compact('users')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create-user'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create($request->all()); 

        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::findOrFail($id); // o User::where('id', $id)->firstOrFail();
        return view('users.show-user', compact('user'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit-user', compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         // Buscar el usuario por su ID
        $user = User::findOrFail($id);

        // Obtener el saldo anterior
        $saldoAnterior = $user->saldo;

        // Actualizar los datos del usuario con los nuevos valores
        $user->update($request->all());

        // Obtener el nuevo saldo después de la actualización
        $nuevoSaldo = $user->saldo;

        // Calcular la diferencia entre el saldo anterior y el nuevo saldo
        $diferencia = $nuevoSaldo - $saldoAnterior;

        // Si hubo un cambio en el saldo, registrar una transacción de tipo 'ajuste'
        if ($diferencia != 0) {
            $transaccion = new \App\Models\Transaccion();
            $transaccion->tipo = 'ajuste';
            $transaccion->monto = abs($diferencia);
            $transaccion->descripcion = $diferencia > 0 
                ? 'Ajuste positivo de saldo' 
                : 'Ajuste negativo de saldo';
            $transaccion->fecha = now();
            $transaccion->user_id = $user->id; // Asociar al usuario correspondiente
            $transaccion->save();
        }

        // Redirigir al usuario con un mensaje de éxito
        return redirect('/user')->with('success', 'Usuario actualizado correctamente.');
        }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect('/user')->with('success', 'Usuario eliminado correctamente.');
        }
    }

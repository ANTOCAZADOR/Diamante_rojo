<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;
use Illuminate\Http\Request;

class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transacciones = Transaccion::all(); 
        return view('transacciones.index-transaccion', compact('transacciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transacciones.create-transaccion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:recarga, retiro, premio, ajuste',
            'monto' => 'required|numeric|min:0',
            'descripcion' => 'required|string',
            'fecha' => 'nullable|date',
        ]);

        $transaccion = Transaccion::create($request->all()); 

        return redirect('/transacciones'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaccion = Transaccion::findOrFail($id);
        return view('transacciones.show-transaccion', compact ('transaccion')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaccion = Transaccion::findOrFail($id);
        return view('transacciones.edit-transaccion', compact ('transaccion')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transaccion = Transaccion::findOrFail($id);

        $transaccion->update($request->all()); 

        return redirect('/transacciones'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transaccion = Transaccion::findOrFail($id);

        $transaccion->delete(); 

        return redirect('/transacciones'); 
    }
}

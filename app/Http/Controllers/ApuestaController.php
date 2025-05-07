<?php

namespace App\Http\Controllers;

use App\Models\Apuesta;
use Illuminate\Http\Request;

class ApuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apuestas = Apuesta::all();
        return view('apuestas.index-apuesta', compact('apuestas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apuestas.create-apuesta');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'montoApostado' => 'required|numeric|min:0',
            'resultado' => 'required|in:gano,perdio,empate',
            'ganancia' => 'nullable|numeric|min:0',
        ]);

        $apuesta = Apuesta::create($request->all()); 

        return redirect('/apuestas'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $apuesta = Apuesta::findOrFail($id);
        return view('apuestas.show-apuesta', compact('apuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $apuesta = Apuesta::findOrFail($id);
        return view('apuestas.edit-apuesta', compact('apuesta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $apuesta = Apuesta::findOrFail($id); 
        //$request->validate([
            //'montoApostado' => 'required|numeric|min:0',
            //'resultado' => 'required|in:gano,perdio,empate',
            //'ganancia' => 'nullable|numeric|min:0',
          //  'fechaApuesta' => 'required|date',
        //]);*/

        $apuesta->update($request->all());

        return redirect('apuestas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $apuesta = Apuesta::findOrFail($id); 
        $apuesta->delete();

        return redirect('/apuestas')->with('success', '🗑️ Apuesta eliminada con éxito.');
    }
}

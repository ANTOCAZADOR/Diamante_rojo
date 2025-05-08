<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $juegos = Juego::all();
        return view('juegos.index-juego', compact('juegos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('juegos.create-juego');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'tipo' => 'required|string',
            'activo' => 'required|boolean',
        ]);

        Juego::create($request->all());

        return redirect()->route('juegos.index')->with('success', 'Juego creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $juego = Juego::findOrFail($id);
        return view('juegos.show-juego', compact('juego'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $juego = Juego::findOrFail($id);
        return view('juegos.edit-juego', compact('juego'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $juego = Juego::findOrFail($id);
        $juego->update($request->all());
        return redirect('/juegos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $juego = Juego::findOrFail($id);
        $juego->delete();
        return redirect('/juegos');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SesionJuego;
use Illuminate\Http\Request;

class SesionJuegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesiones = SesionJuego::all();
        return view('sesionjuegos.index-sesionjuego', compact('sesiones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sesionjuegos.create-sesionjuego');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inicioSesion' => 'required|date',
            'finSesion' => 'required|date|after:inicioSesion',
            'totalApostado' => 'required|numeric',
            'totalGanado' => 'required|numeric',
        ]);

        SesionJuego::create($request->only([
            'inicioSesion',
            'finSesion',
            'totalApostado',
            'totalGanado',
        ]));
        

        return redirect()->route('sesionjuegos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $sesionJuego = SesionJuego::findOrFail($id); 
        return view('sesionjuegos.show-sesionjuego', compact('sesionJuego'));   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sesionJuego = SesionJuego::findOrFail($id); 
        return view('sesionjuegos.edit-sesionjuego', compact('sesionJuego'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $sesionJuego = SesionJuego::findOrFail($id); 
        $sesionJuego->update($request->all()); 
        return redirect('/sesionjuegos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sesionJuego = SesionJuego::findOrFail($id); 
        $sesionJuego->delete(); 
        return redirect('/sesionjuegos');
    }
}

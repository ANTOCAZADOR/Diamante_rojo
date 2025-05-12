<?php

namespace App\Http\Controllers;

use App\Models\SesionJuego;
use App\Models\User;
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

    //para ver que funcione la llave foranea: 
    public function crearSesion()
    {
        $user = User::find(1); // o auth()->user() si el usuario está autenticado

        $sesion = new SesionJuego();
        $sesion->inicioSesion = now();
        $sesion->finSesion = now()->addHour();
        $sesion->totalApostado = 500;
        $sesion->totalGanado = 1200;

        $user->sesiones()->save($sesion);

        return "Sesión creada para el usuario {$user->name}";
    }

    public function mostrarSesiones($userId)
    {
        $user = User::findOrFail($userId);

        foreach ($user->sesiones as $sesion) {
            echo "ID sesión: {$sesion->id}, Apostado: {$sesion->totalApostado}, Ganado: {$sesion->totalGanado}<br>";
        }
    }

    public function mostrarUsuarioSesion($sesionId)
    {
        $sesion = SesionJuego::findOrFail($sesionId);
        $usuario = $sesion->user;

        return "La sesión pertenece a: {$usuario->name} {$usuario->apellido}";
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Juego;
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
        $juegos = Juego::where('activo', true)->get();
        return view('sesionjuegos.create-sesionjuego');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'juego_id' => 'required|exists:juegos,id',
        'totalApostado' => 'required|numeric',
        'totalGanado' => 'required|numeric',
        ]);

        $sesion = new SesionJuego();
        $sesion->inicioSesion = now();
        $sesion->finSesion = now()->addHour(); // Puedes ajustarlo según tu lógica
        $sesion->totalApostado = $request->totalApostado;
        $sesion->totalGanado = $request->totalGanado;
        $sesion->user_id = auth()->id();
        $sesion->juego_id = $request->juego_id;
        $sesion->save();
        

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
        $sesion = new SesionJuego();
        $sesion->inicioSesion = now();
        $sesion->finSesion = now()->addHour();
        $sesion->totalApostado = 500;
        $sesion->totalGanado = 1200;
        $sesion->user_id = 1; // Asegúrate que este usuario existe
        $sesion->juego_id = 1; // Este es el ID del juego que debe existir en la tabla `juegos`

        $sesion->save();

        return "Sesión creada con éxito";
    }


    public function mostrarSesiones($userId)
    {
        $user = User::findOrFail($userId);

        foreach ($user->sesiones as $sesion) {
            $juegoId = $sesion->juego ? $sesion->juego->id : 'Sin juego';
            echo "ID sesión: {$sesion->id}, Juego ID: {$juegoId}, Apostado: {$sesion->totalApostado}, Ganado: {$sesion->totalGanado}<br>";
        }
    }


    public function mostrarUsuarioSesion($sesionId)
    {
        $sesion = SesionJuego::findOrFail($sesionId);
        $usuario = $sesion->user;

        return "La sesión pertenece a: {$usuario->name} {$usuario->apellido}";
    }
}

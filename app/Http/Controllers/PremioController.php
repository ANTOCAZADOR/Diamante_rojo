<?php

namespace App\Http\Controllers;

use App\Models\Premio;
use Illuminate\Http\Request;

class PremioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $premios = Premio::all();
        return view('premios.index-premio', compact('premios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('premios.create-premio');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', 
            'descripcion' => 'required|string', 
            'fechaObtenido' => 'nullable|date',
        ]); 

        $premio = Premio::create($request->all()); 

        return redirect('/premios'); 
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $premio = Premio::findOrFail($id);
        return view('premios.show-premio', compact('premio')); 

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $premio = Premio::findOrFail($id);
        return view('premios.edit-premio', compact('premio')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $premio = Premio::findOrFail($id);

        $premio->update($request->all()); 

        return redirect('/premios'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $premio = Premio::findOrFail($id);

        $premio->delete(); 

        return redirect('/premios')->with('success', 'premio eliminado con exito');; 
    }
}

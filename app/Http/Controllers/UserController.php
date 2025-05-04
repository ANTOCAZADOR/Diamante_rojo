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
        $user = User::findOrFail($id);

        // Solo permitir cambiar el estado si el usuario está "activo"
        /*($user->estado !== 'activo' && $request->has('estado')) {
            return redirect()->back()->with('error', 'No puedes cambiar el estado si el usuario está inactivo.');
        }*/
        $user->update($request->all());
        return redirect('/user');
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

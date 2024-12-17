<?php

namespace App\Http\Controllers;

use App\Models\Combustible;
use Illuminate\Http\Request;

class CombustibleController extends Controller
{

    public function index()
    {
        $combustibles = Combustible::all()->where('estado',1);
        return view('combustibles.index',compact('combustibles'));
    }

    public function create()
    {
        return view('combustibles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:300',
            'precio' => 'required|numeric',
            'tipo' => 'required|string',
        ]);
   
        $combustible = new Combustible();
        $combustible->nombre = $request->nombre;
        $combustible->precio = $request->precio;
        $combustible->tipo = $request->tipo;

        $combustible->save();
       
        return redirect()->route('combustible.index');//IR A ESA RUTA
    }

    public function show(Combustible $combustible)
    {
        //
    }

    public function edit(Combustible $combustible)
    {
        return view('combustibles.edit',compact('combustible'));
    }

    public function update(Request $request, Combustible $combustible)
    {
        $request->validate([
            'nombre' => 'required|string|max:300',
            'precio' => 'required|numeric',
            'tipo' => 'required|string|max:400',
        ]);
        
        $combustible->nombre = $request->nombre;
        $combustible->precio = $request->precio;
        $combustible->tipo = $request->tipo;

        $combustible->update();

        return redirect()->route('combustible.index');
    }

    public function destroy(Combustible $combustible)
    {
        $combustible->estado = 0;
        $combustible->update();
        return back();
    }
}

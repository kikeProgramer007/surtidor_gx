<?php

namespace App\Http\Controllers;

use App\Models\Tanque;
use Illuminate\Http\Request;

class TanqueController extends Controller
{
    public function index()
    {
        $tanques = Tanque::all()->where('estado',1);
        return view('tanques.index',compact('tanques'));
    }

    public function create()
    {
        return view('tanques.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:300',
            'nivel_actual' => 'required|numeric',
            'capacidad' => 'required|numeric',
            'ubicacion' => 'required|string',
        ]);
   
        $tanque = new Tanque();
        $tanque->descripcion = $request->descripcion;
        $tanque->nivel_actual = $request->nivel_actual;
        $tanque->capacidad = $request->capacidad;
        $tanque->ubicacion = $request->ubicacion;

        $tanque->save();
       
        return redirect()->route('tanque.index');//IR A ESA RUTA

    }

    public function show(Tanque $tanque)
    {
        //
    }

    public function edit(Tanque $tanque)
    {
        return view('tanques.edit',compact('tanque'));
    }

    public function update(Request $request, Tanque $tanque)
    {
        $request->validate([
            'descripcion' => 'required|string|max:300',
            'nivel_actual' => 'required|numeric',
            'capacidad' => 'required|numeric',
            'ubicacion' => 'required|string',
        ]);
   
        $tanque->descripcion = $request->descripcion;
        $tanque->nivel_actual = $request->nivel_actual;
        $tanque->capacidad = $request->capacidad;
        $tanque->ubicacion = $request->ubicacion;

        $tanque->update();
       
        return redirect()->route('tanque.index');
    }

    public function destroy(Tanque $tanque)
    {
        $tanque->estado = 0;
        $tanque->update();
        return back();
    }
}

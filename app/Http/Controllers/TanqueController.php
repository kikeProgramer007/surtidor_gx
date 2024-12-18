<?php

namespace App\Http\Controllers;

use App\Models\Combustible;
use App\Models\Tanque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TanqueController extends Controller
{
    public function index()
    {
        $tanques = DB::table('tanques')
        ->leftJoin('combustibles', 'tanques.id_combustible', '=', 'combustibles.id')
        ->where('tanques.estado',1)
        ->select('tanques.*', 'combustibles.nombre')
        ->get();
        return view('tanques.index',compact('tanques'));
    }

    public function create()
    {
        $combustibles = Combustible::all()->where('estado',1);
        return view('tanques.create',compact('combustibles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:300',
            'nivel_actual' => 'required|numeric',
            'capacidad' => 'required|numeric',
            'ubicacion' => 'required|string',
            'id_combustible' => 'required|min:1|numeric',
        ]);
   
        $tanque = new Tanque();
        $tanque->descripcion = $request->descripcion;
        $tanque->nivel_actual = $request->nivel_actual;
        $tanque->capacidad = $request->capacidad;
        $tanque->ubicacion = $request->ubicacion;
        $tanque->id_combustible = $request->id_combustible;
        
        $tanque->save();
       
        return redirect()->route('tanque.index');//IR A ESA RUTA

    }

    public function show(Tanque $tanque)
    {
        //
    }

    public function edit(Tanque $tanque)
    {
        $combustibles = Combustible::all()->where('estado',1);
        return view('tanques.edit',compact('tanque','combustibles'));
    }

    public function update(Request $request, Tanque $tanque)
    {
        $request->validate([
            'descripcion' => 'required|string|max:300',
            'nivel_actual' => 'required|numeric',
            'capacidad' => 'required|numeric',
            'ubicacion' => 'required|string',
            'id_combustible' => 'required|min:1|numeric',
        ]);
   
        $tanque->descripcion = $request->descripcion;
        $tanque->nivel_actual = $request->nivel_actual;
        $tanque->capacidad = $request->capacidad;
        $tanque->ubicacion = $request->ubicacion;
        $tanque->id_combustible = $request->id_combustible;

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

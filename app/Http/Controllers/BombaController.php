<?php

namespace App\Http\Controllers;

use App\Models\Bomba;
use App\Models\Tanque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BombaController extends Controller
{
    public function index()
    {
        $bombas = DB::table('bombas')
        ->leftJoin('tanques', 'bombas.id_tanque', '=', 'tanques.id')
        ->where('bombas.estado',1)
        ->select('bombas.*', 'tanques.descripcion as descripcionTanque','tanques.nivel_actual')
        ->get();
        return view('bombas.index',compact('bombas'));
    }

    public function create()
    {
        $tanques = Tanque::all()->where('estado',1);
        return view('bombas.create',compact('tanques'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:300',
            'modelo' => 'required|string|max:300',
            'id_tanque' => 'required|min:1|numeric',
        ]);
   
        $bomba = new Bomba();
        $bomba->descripcion = $request->descripcion;
        $bomba->modelo = $request->modelo;
        $bomba->id_tanque = $request->id_tanque;
        
        $bomba->save();
       
        return redirect()->route('bomba.index');//IR A ESA RUTA
    }

    public function edit(Bomba $bomba)
    {
        $tanques = Tanque::all()->where('estado',1);
        return view('bombas.edit',compact('bomba','tanques'));
    }

    public function update(Request $request, Bomba $bomba)
    {
        $request->validate([
            'descripcion' => 'required|string|max:300',
            'modelo' => 'required|string|max:300',
            'id_tanque' => 'required|min:1|numeric',
        ]);
   
        $bomba->descripcion = $request->descripcion;
        $bomba->modelo = $request->modelo;
        $bomba->id_tanque = $request->id_tanque;
        
        $bomba->update();
       
        return redirect()->route('bomba.index');//IR A ESA RUTA
    }

    public function destroy(Bomba $bomba)
    {
        $bomba->estado = 0;
        $bomba->update();
        return back();
    }

    public function search($id)
    {
        $bomba = DB::table('bombas')
        ->leftJoin('tanques', 'bombas.id_tanque', '=', 'tanques.id')
        ->where('bombas.estado', 1)
        ->where('bombas.id', $id) // Busca un solo registro por ID
        ->select('bombas.*', 'tanques.descripcion as descripcionTanque', 'tanques.nivel_actual')
        ->first(); // Obtén un solo registro

        // Verifica si se encontró el registro
        if ($bomba) {
            return response()->json($bomba);
        }

        // Devuelve una respuesta vacía o un error en caso de que no se encuentre
        return response()->json(['message' => 'No se encontró el registro.'], 404);
    }

}

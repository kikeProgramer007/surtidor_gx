<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiculoController extends Controller
{
 
    public function index()
    {
        $vehiculos = DB::table('vehiculos')
        ->join('clientes', 'vehiculos.id_cliente', '=', 'clientes.id')
        ->where('vehiculos.estado',1)
        ->select('vehiculos.*', 'clientes.nombre','clientes.paterno','clientes.materno')
        ->get();

    return view('vehiculos.index',compact('vehiculos'));
    }

    public function create()
    {
        $clientes = Cliente::all()->where('estado',1);
        return view('vehiculos.create',compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo_Bsisa' => 'required|string|max:200',
            'placa' => 'required|string|max:200',
            'marca' => 'required|string|max:400',
            'color' => 'required|string|max:100',
            'id_cliente' => 'required|string|max:500',
            'tipo_vehiculo' => 'required|string',
        ]);
     
        $vehiculo = new Vehiculo();
        $vehiculo->codigo_Bsisa = $request->codigo_Bsisa;
        $vehiculo->placa = $request->placa;
        $vehiculo->marca = $request->marca;
        $vehiculo->color = $request->color;
        $vehiculo->id_cliente = $request->id_cliente;
        $vehiculo->tipo_vehiculo = $request->tipo_vehiculo;

        $vehiculo->save();
       
        return redirect()->route('vehiculo.index');//IR A ESA RUTA
    }

    public function show(Vehiculo $vehiculo)
    {
        //
    }

    public function edit(Vehiculo $vehiculo)
    {
        $clientes = Cliente::all()->where('estado',1);
        return view('vehiculos.edit',compact('vehiculo','clientes'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'codigo_Bsisa' => 'required|string|max:200',
            'placa' => 'required|string|max:200',
            'marca' => 'required|string|max:400',
            'color' => 'required|string|max:100',
            'id_cliente' => 'required|numeric',
            'tipo_vehiculo' => 'required|string',
        ]);
        
        $vehiculo->codigo_Bsisa = $request->codigo_Bsisa;
        $vehiculo->placa = $request->placa;
        $vehiculo->marca = $request->marca;
        $vehiculo->color = $request->color;
        $vehiculo->id_cliente = $request->id_cliente;
        $vehiculo->tipo_vehiculo = $request->tipo_vehiculo;

        $vehiculo->update();

        return redirect()->route('vehiculo.index');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->estado = 0;
        $vehiculo->update();
        return back();
    }
}

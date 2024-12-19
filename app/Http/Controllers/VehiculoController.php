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

    public function autocomplete(Request $request)
    {
        $term = $request->get('term'); // Obtén el término de búsqueda
        $returnData = [];

        // Realiza la búsqueda en la base de datos
        // $vehiculos = Vehiculo::where('codigo_Bsisa', 'LIKE', '%' . $term . '%')
        //     ->where('estado', 1)
        //     ->get();

        $vehiculos = DB::table('vehiculos')
                        ->join('clientes', 'vehiculos.id_cliente', '=', 'clientes.id')
                        ->where('codigo_Bsisa', 'LIKE', '%' . $term . '%')
                        ->where('vehiculos.estado',1)
                        ->select('vehiculos.*', 'clientes.nombre','clientes.paterno','clientes.materno','clientes.ci','clientes.correo')
                        ->get();
        
        // Formatea los datos para el autocomplete
        foreach ($vehiculos as $vehiculo) {
            $returnData[] = [
                'id' => $vehiculo->id,
                'value' => $vehiculo->codigo_Bsisa, // Texto que se mostrará en el autocomplete
                'placa' => $vehiculo->placa,
                'marca' => $vehiculo->marca,
                'color' => $vehiculo->color,
                'tipo_vehiculo' => $vehiculo->tipo_vehiculo,
                'nombre' => $vehiculo->nombre,
                'paterno' => $vehiculo->paterno,
                'materno' => $vehiculo->materno,
                'ci' => $vehiculo->ci,
                'correo' => $vehiculo->correo,
            ];
        }

        return response()->json($returnData);
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

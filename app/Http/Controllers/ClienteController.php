<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all()->where('estado',1);
        return view('clientes.index',compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|numeric|max_digits:10',
            'nombre' => 'required|string|max:200',
            'paterno' => 'required|string|max:400',
            'materno' => 'required|string|max:400',
            'telefono' => 'required|numeric|max_digits:10',
            'correo' => 'required|string|max:255',
        ]);

        $cliente = new Cliente();
        $cliente->ci = $request->ci;
        $cliente->nombre = $request->nombre;
        $cliente->paterno = $request->paterno;
        $cliente->materno = $request->materno;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;

        $cliente->save();
       
        return redirect()->route('cliente.index');//IR A ESA RUTA
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit',compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'ci' => 'required|numeric|max_digits:10',
            'nombre' => 'required|string|max:200',
            'paterno' => 'required|string|max:400',
            'materno' => 'required|string|max:400',
            'telefono' => 'required|numeric|max_digits:10',
            'correo' => 'required|string|max:255',
        ]);
        
        $cliente->ci = $request->ci;
        $cliente->nombre = $request->nombre;
        $cliente->paterno = $request->paterno;
        $cliente->materno = $request->materno;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;

        $cliente->update();

        return redirect()->route('cliente.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->estado = 0;
        $cliente->update();
        return back();
    }
}

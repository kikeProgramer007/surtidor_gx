<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{

    public function index()
    {
        $proveedores = Proveedor::all()->where('estado',1);
        return view('proveedores.index',compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {     
        $request->validate([
            'nombre' => 'required|string|max:300',
            'telefono' => 'required|numeric|max_digits:10',
            'direccion' => 'required|string|max:500',
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;

        $proveedor->save();
    
        return redirect()->route('proveedor.index');//IR A ESA RUTA
    }

    public function show(Proveedor $proveedor)
    {
        //
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit',compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required|string|max:200',
            'telefono' => 'required|numeric|max_digits:10',
            'direccion' => 'required|string|max:255',
        ]);
        
        $proveedor->nombre = $request->nombre;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;

        $proveedor->update();

        return redirect()->route('proveedor.index');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->estado = 0;
        $proveedor->update();
        return back();
    }
}

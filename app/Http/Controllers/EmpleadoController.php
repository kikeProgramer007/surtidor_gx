<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\User;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all()->where('estado',1);
        return view('empleados.index',compact('empleados'));
    }

    public function create()
    {
        $users = User::all()->where('status',1);
        return view('empleados.create',compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required|numeric|max_digits:10',
            'nombre' => 'required|string|max:300',
            'paterno' => 'required|string|max:400',
            'materno' => 'required|string|max:400',
            'telefono' => 'required|numeric|max_digits:10',
            'direccion' => 'required|string|max:500',
            'id_usuario' => 'required|numeric',
        ]);
        
        $empleado = new Empleado();
        $empleado->ci = $request->ci;
        $empleado->nombre = $request->nombre;
        $empleado->paterno = $request->paterno;
        $empleado->materno = $request->materno;
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->id_usuario = $request->id_usuario;

        $empleado->save();
       
        return redirect()->route('empleado.index');//IR A ESA RUTA
    }

    public function edit(Empleado $empleado)
    {
        $users = User::all()->where('status',1);
        return view('empleados.edit',compact('empleado','users'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'ci' => 'required|numeric|max_digits:10',
            'nombre' => 'required|string|max:200',
            'paterno' => 'required|string|max:400',
            'materno' => 'required|string|max:400',
            'telefono' => 'required|numeric|max_digits:10',
            'direccion' => 'required|string|max:255',
            'id_usuario' => 'required|numeric',
        ]);
        
        $empleado->ci = $request->ci;
        $empleado->nombre = $request->nombre;
        $empleado->paterno = $request->paterno;
        $empleado->materno = $request->materno;
        $empleado->telefono = $request->telefono;
        $empleado->direccion = $request->direccion;
        $empleado->id_usuario = $request->id_usuario;

        $empleado->update();

        return redirect()->route('empleado.index');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->estado = 0;
        $empleado->update();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurnoController extends Controller
{
  
    public function index()
    {
        $turnos = DB::table('turnos')
        ->join('empleados', 'turnos.id_empleado', '=', 'empleados.id')
        ->where('turnos.estado',1)
        ->select('turnos.*', 'empleados.nombre','empleados.paterno', 'empleados.materno')
        ->get();
        return view('turnos.index',compact('turnos'));
    }

    public function create()
    {
        $empleados = Empleado::all()->where('estado',1);
        return view('turnos.create',compact('empleados'));
    }

  
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => [
                'required',
                'string',
            ],
            'inicio_turno' => [
                'required',
                'date', // Acepta fechas completas, incluidas horas
                'before_or_equal:fin_turno', // Asegura que 'inicio_turno' sea antes o igual a 'fin_turno'
            ],
            'fin_turno' => [
                'required',
                'date', // Acepta fechas completas, incluidas horas
                'after_or_equal:inicio_turno', // Asegura que 'fin_turno' sea después o igual a 'inicio_turno'
            ],
            'id_empleado' => [
                'required',
                'exists:empleados,id', // Valida que el empleado exista en la base de datos
            ],
        ], [
            'descripcion.required' => 'El campo de descripción es obligatorio.',
            'descripcion.string' => 'La descripción debe ser una cadena de texto válida.',
            'inicio_turno.required' => 'El campo de inicio del turno es obligatorio.',
            'inicio_turno.date' => 'El campo de inicio del turno debe ser una fecha válida en formato "YYYY-MM-DD HH:mm".',
            'inicio_turno.before_or_equal' => 'La fecha de inicio debe ser anterior o igual a la fecha de fin.',
            'fin_turno.required' => 'El campo de fin del turno es obligatorio.',
            'fin_turno.date' => 'El campo de fin del turno debe ser una fecha válida en formato "YYYY-MM-DD HH:mm".',
            'fin_turno.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha de inicio.',
            'id_empleado.required' => 'El campo de empleado es obligatorio.',
            'id_empleado.exists' => 'El empleado seleccionado no existe en el sistema.',
        ]);
        
  
        $turno = new Turno();
        $turno->descripcion = $request->descripcion;
        $turno->inicio_turno = $request->inicio_turno;
        $turno->fin_turno = $request->fin_turno;
        $turno->id_empleado = $request->id_empleado;

        $turno->save();
       
        return redirect()->route('turno.index');//IR A ESA RUTA
    }

    public function show(Turno $turno)
    {
        //
    }

    public function edit(Turno $turno)
    {
        $empleados = Empleado::all()->where('estado',1);

        return view('turnos.edit',compact('turno','empleados'));
    }

    public function update(Request $request, Turno $turno)
    {
        $request->validate([
            'inicio_turno' => [
                'required',
                'date',
                'before_or_equal:fin_turno', // Asegura que 'inicio_turno' sea antes o igual a 'fin_turno'
            ],
            'fin_turno' => [
                'required',
                'date',
                'after_or_equal:inicio_turno', // Asegura que 'fin_turno' sea después o igual a 'inicio_turno'
            ],
            'id_empleado' => [
                'required',
                'exists:empleados,id', // Valida que el empleado exista en la base de datos
            ],
        ], [
            'inicio_turno.required' => 'El campo de inicio del turno es obligatorio.',
            'inicio_turno.date' => 'El campo de inicio del turno debe ser una fecha válida.',
            'inicio_turno.before_or_equal' => 'La fecha de inicio debe ser anterior o igual a la fecha de fin.',
            'fin_turno.required' => 'El campo de fin del turno es obligatorio.',
            'fin_turno.date' => 'El campo de fin del turno debe ser una fecha válida.',
            'fin_turno.after_or_equal' => 'La fecha de fin debe ser posterior o igual a la fecha de inicio.',
            'id_empleado.required' => 'El campo de empleado es obligatorio.',
        ]);
  
        $turno->descripcion = $request->descripcion;
        $turno->inicio_turno = $request->inicio_turno;
        $turno->fin_turno = $request->fin_turno;
        $turno->id_empleado = $request->id_empleado;
        
        $turno->update();

        return redirect()->route('turno.index');
    }

    public function destroy(Turno $turno)
    {
        $turno->estado = 0;
        $turno->update();
        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bomba;
use App\Models\Empleado;
use App\Models\Tanque;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bombas = DB::table('bombas')
        ->leftJoin('tanques', 'bombas.id_tanque', '=', 'tanques.id')
        ->leftJoin('combustibles', 'tanques.id_combustible', '=', 'combustibles.id')
        ->where('bombas.estado',1)
        ->select('bombas.*', 'tanques.descripcion as descripcionTanque','tanques.nivel_actual','combustibles.nombre')
        ->get();
       
        return view('ventas.index',compact('bombas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'cantidad' => 'required|numeric|min:1',
        'monto_total' => 'required|numeric|min:0',
        'tipo_pago' => 'required|string', // Validación para que tipo_pago no sea nulo
        'id_bomba' => 'required|exists:bombas,id', // Verifica que la bomba seleccionada exista
        'id_tanque' => 'required|exists:tanques,id', // Verifica que el tanque exista
        'id_vehiculo' => 'nullable|exists:vehiculos,id', // Si se selecciona un vehículo
    ]);

    // Obtener el empleado actual desde el usuario autenticado
    $empleado = Empleado::where('id_usuario', Auth::id())->first();
    if (!$empleado) {
        return back()->withErrors(['error' => 'Empleado no encontrado para el usuario actual']);
    }

    // Obtener el tanque relacionado
    $tanque = Tanque::find($request->id_tanque);
    if (!$tanque) {
        return back()->withErrors(['error' => 'Tanque no encontrado']);
    }

    // Validar que el tanque tiene suficiente combustible
    if ($tanque->nivel_actual < $request->cantidad) {
        return back()->withErrors(['error' => 'Nivel de combustible insuficiente en el tanque']);
    }

    // Crear la venta
    $venta = new Venta();
    $venta->cantidad = $request->cantidad;
    $venta->fecha = now();
    $venta->monto_total = $request->monto_total;
    $venta->id_vehiculo = $request->id_vehiculo;
    $venta->unidad_medida = 'Lts';
    $venta->tipo_pago = $request->tipo_pago; // Asegúrate de que este valor sea enviado desde el formulario
    $venta->id_bomba = $request->id_bomba;
    $venta->id_empleado = $empleado->id;
    $venta->save();

    // Actualizar el nivel del tanque
    $tanque->nivel_actual = $tanque->nivel_actual - $request->cantidad;
    $tanque->save();

    // Redirigir con éxito

    // return redirect()->route('venta.comprobante', $venta->id);
     // Devolver la URL del comprobante como respuesta JSON
     return response()->json([
        'success' => true,
        'comprobante_url' => route('venta.comprobante', $venta->id),
    ]);
}


    /**
     * Display the specified resource.
     */
    public function ventasRealizadas(Venta $venta)
    {
        $ventas = DB::table('ventas')
        ->join('vehiculos', 'ventas.id_vehiculo', '=', 'vehiculos.id')
        ->where('ventas.estado',1)
        ->select('ventas.*', 'vehiculos.codigo_Bsisa','vehiculos.placa')
        ->get();

        return view('ventas.ventasrealizadas',compact('ventas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venta $venta)
    {
         
        // Identificar el tanque relacionado a la bomba
        $bomba = Bomba::where('id', $venta->id_bomba)->first();
   
        // Restaurar nivel del tanque
        $tanque = Tanque::findOrFail($bomba->id_tanque);
        
        $tanque->nivel_actual += $venta->cantidad;
        $tanque->update();
 
        // Cambiar el estado de la venta a inactivo
        $venta->estado = 0;
        $venta->update();
     
        return back();
 
    }
}

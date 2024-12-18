<?php

namespace App\Http\Controllers;

use App\Models\Bomba;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Venta $venta)
    {
        //
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
        //
    }
}

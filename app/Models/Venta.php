<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = 'ventas';
    protected $primaryKey ='id';
    protected $fillable = [
        'cantidad',
        'fecha',
        'monto_total',
        'unidad_medida',
        'id_vehiculo',
        'id_empleado',//usuario actual que tiene vinculado la tabla empleado
        'tipo_pago',
        'id_bomba',
        'estado',
    ];
    public $timestamps=true;


    public function bomba()
    {
        return $this->belongsTo(Bomba::class, 'id_bomba', 'id');
    }
    
    // Relación con el modelo Empleado
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado', 'id');
    }

    // Relación con el modelo Vehiculo
    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'id_vehiculo', 'id');
    }
}

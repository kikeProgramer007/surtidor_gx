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
        'id_empleado',
        'id_bomba',
        'estado',
    ];
    public $timestamps=true;
}

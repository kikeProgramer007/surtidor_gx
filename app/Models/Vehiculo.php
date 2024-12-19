<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    protected $primaryKey ='id';
    protected $fillable = [
        'codigo_Bsisa',
        'placa',
        'marca',
        'color',
        'id_cliente',
        'tipo_vehiculo',
        'estado',
    ];
    public $timestamps=false;

        
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $primaryKey ='id';
    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'estado',
    ];
    public $timestamps=false;
}

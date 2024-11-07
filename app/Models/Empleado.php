<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey ='id';
    protected $fillable = [
        'ci',
        'nombre',
        'paterno',
        'materno',
        'telefono',
        'direccion',
        'estado',
    ];
    public $timestamps=false;
}

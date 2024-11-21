<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turnos';
    protected $primaryKey ='id';
    protected $fillable = [
        'descripcion',
        'inicio_turno',
        'fin_turno',
        'estado',
        'id_empleado',
    ];
    public $timestamps=false;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $primaryKey ='id';
    protected $fillable = [
        'ci',
        'nombre',
        'paterno',
        'materno',
        'telefono',
        'correo',
        'estado',
    ];
    public $timestamps=false;
}

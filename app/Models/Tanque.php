<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanque extends Model
{
    protected $table = 'tanques';
    protected $primaryKey ='id';
    protected $fillable = [
        'descripcion',
        'nivel_actual',
        'capacidad',
        'ubicacion',
        'estado',
    ];
    public $timestamps=false;
}

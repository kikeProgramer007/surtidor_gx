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
        'id_combustible'
    ];
    public $timestamps=false;

    public function combustible()
    {
        return $this->belongsTo(Combustible::class, 'id_combustible', 'id');
    }
}

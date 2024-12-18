<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bomba extends Model
{
    protected $table = 'bombas';
    protected $primaryKey ='id';
    protected $fillable = [
        'descripcion',
        'modelo',
        'estado',
        'id_tanque'
    ];
    public $timestamps=false;
}

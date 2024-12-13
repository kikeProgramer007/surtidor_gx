<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combustible extends Model
{
    protected $table = 'combustibles';
    protected $primaryKey ='id';
    protected $fillable = [
        'nombre',
        'precio',
        'tipo'
    ];
    public $timestamps=false;
}

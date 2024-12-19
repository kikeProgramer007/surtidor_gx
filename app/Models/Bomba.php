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

    public function tanque()
    {
        return $this->belongsTo(Tanque::class, 'id_tanque', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class altoriesgo extends Model
{
    protected $fillable = [

        'id_barrio',
        'regional',
        'departamento',
        'ciudad',
        'barrio',
        'tiempoentrega_alistamiento',
        'observacion',
        'h_lunes_viernes',
        'nombre_punto',
        'direccion',
       

    ];
}

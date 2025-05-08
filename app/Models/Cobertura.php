<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
    protected $fillable = [

        'LocalidadDaneCD',
        'CableID',
        'EquipoID',
        'PlacaID',
        'TipoEquipo',
        'CTO',
        'PorcentajeLibreCTO',
        'PuertosLibresCTO',
        'Clusters',
        'RegionComercial',
        'Departamento',
        'Localidad',
        'CodBarrio',
        'NombreBarrio',
        'BarrioCartografia',
        'DireccionCliente',
        'Edificio',
        'Telefono',
        'Estado',
        'Flag',
        'FechaComercializacion',
        'FechaActualizacion',
        'LLDDireccionCCA',
        'LLDBarrioCCA',
        'LLDCluster',
        'LLDSubCluster',
        'LLDEdificio',
        'FlagOcupacion',

    ];
}

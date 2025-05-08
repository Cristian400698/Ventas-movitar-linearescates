<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info24s extends Model
{
    //
     protected $fillable = [
        'Mes_Liq' ,
        'Dpto_Vta' ,
        'Fec_Rad' ,
        'Abonado' ,
        'Celular' ,
        'Cod_Plan' ,
        'Nom_Plan' ,
        'Total_Comision' ,
        'Motivo_Liq' ,
        'Observaciones' ,
        'Total_Penalizacion' ,
        'Descripcion_Causa_SILCB',
        'Periodo',
        'Desc_SILCB' ,
        'Base_Comision',
        'Cumplimiento' ,
        'RemuneracionFinal',
        'Obs' 
     ];

}

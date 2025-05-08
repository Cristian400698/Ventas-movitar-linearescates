<?php

namespace App\Imports;

use App\info44s;
use App\Infogeneral;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class Info44Import implements ToModel
{
    use Importable;

    public function model(array $row)
    {
        return new info44s([
            'Mes_Liq' =>$row[1],
            'Dpto_Vta' =>$row[2],
            'Fec_Rad' =>$row[3],
            'Abonado' =>$row[4],
            'Celular' =>$row[5],
            'Cod_Plan' =>$row[6],
            'Nom_Plan' =>$row[7],
            'Total_Comision' =>$row[8],
            'Motivo_Liq' =>$row[9],
            'Observaciones' =>$row[10],
            'Total_Penalizacion' =>$row[11],
            'Descripcion_Causa_SILCB' =>$row[12],
            'Periodo' =>$row[13],
            'Desc_SILCB' =>$row[14],
            'Base_Comision' =>$row[15],
            'Cumplimiento' =>$row[16],
            'RemuneracionFinal' =>$row[17],
            'Obs' =>$row[18],
        ]);

        
    }
}

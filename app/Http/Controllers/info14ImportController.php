<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Imports\Info14Import;
use App\Infogeneral;
use App\Info14s;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class info14ImportController extends Controller
{
    public function index()
    {
        return view('.import');
    }

    public function show()
    {
        return view('informe.index');
    }

    public function store(Request $request)
    {
           
        $file = $request->file('file');
        $dataFromExcel = Excel::toCollection(new Info14Import, $file)[0];

        
        $datosInfogenerals = Infogeneral::all();

        
        $datosAInsertar = $datosInfogenerals->filter(function ($dato) use ($dataFromExcel) {
            return !$dataFromExcel->contains('Abonado', $dato->Abonado);
        });
            
        
        foreach ($datosAInsertar as $dato) {
            Info14s::create([
                'Mes_Liq' => $dato->Mes_Liq,
                'Dpto_Vta' => $dato->Dpto_Vta,
                'Fec_Rad' => $dato->Fec_Rad,
                'Abonado' => $dato->Abonado,
                'Celular' => $dato->Celular,
                'Cod_Plan' => $dato->Cod_Plan,
                'Nom_Plan' => $dato->Nom_Plan,
                'Total_Comision' => $dato->Total_Comision,
                'Motivo_Liq' => $dato->Motivo_Liq,
                'Observaciones' => $dato->Observaciones,
                'Total_Penalizacion' => $dato->Total_Penalizacion,
                'Descripcion_Causa_SILCB' => $dato->Descripcion_Causa_SILCB,
                'Periodo' => $dato->Periodo,
                'Desc_SILCB' => $dato->Desc_SILCB,
                'Base_Comision' => $dato->Base_Comision,
                'Cumplimiento' => $dato->Cumplimiento,
                'RemuneracionFinal' => $dato->RemuneracionFinal,
                'Obs' => $dato->Obs,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('informe.index')->withStatus('Excel importado correctamente');
      
    
    }
    

}

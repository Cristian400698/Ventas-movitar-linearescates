<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\Info24Import;
use Illuminate\Http\Request;
use App\Infogeneral;
use App\Info24s;
use Maatwebsite\Excel\Facades\Excel;

class info24ImportController extends Controller
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
        $dataFromExcel = Excel::toCollection(new Info24Import, $file)[0];

        
        $datosInfogenerals = Infogeneral::all();

        
        $datosAInsertar = $datosInfogenerals->filter(function ($dato) use ($dataFromExcel) {
            return !$dataFromExcel->contains('Abonado', $dato->Abonado);
        });
            
        
        foreach ($datosAInsertar as $dato) {
            Info24s::create([
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
            ]);
        }
    
        return redirect()->route('informe.index')->withStatus('Excel importado correctamente');
    }
}





















/* // Importa los datos desde el archivo Excel
Excel::import(new Info24Import, $request->file('file')->store('temp'));
    
// Filtra y guarda solo los registros que no existen en la tabla infogenerals
$dataFromExcel = Info24::all(); // Suponiendo que Info14 es el modelo de la tabla info14s

foreach ($dataFromExcel as $record) {
    $numero = $record->numero;
    $nombre = $record->nombre;

    // Verifica si el registro ya existe en infogenerals
    $existsInInfogenerals = Infogeneral::where('numero', $numero)
        ->where('nombre', $nombre)
        ->exists();

    if (!$existsInInfogenerals) {
        Infogeneral::create([
            'numero' => $numero,
            'nombre' => $nombre,
        ]);
    }
} */
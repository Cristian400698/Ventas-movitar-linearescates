<?php

namespace App\Imports;

use App\upgradetelev;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Throwable;

class Subirbase implements ToModel, WithHeadingRow, WithChunkReading
{
    use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Validación de datos requeridos
        $validation = \Validator::make($row, [
            'numero' => 'required',
            'nombres' => 'required',
            'documento' => 'required',
            'correo' => 'required|email',
            'fventa' => 'required|date',
            'corte' => 'required|integer',
            'planhistorico' => 'required',
            'planventa' => 'required',
            'activacion' => 'required',
            'ngrabacion' => 'required|integer',
            'observacion' => 'required',
            'agente' => 'required',
            'hora' => 'required|date_format:H:i:s',
            'likewize' => 'required',
            'ley2300' => 'required',
        ]);

        if ($validation->fails()) {
            return null; // Si hay errores de validación, no creamos el modelo
        }

        return new upgradetelev([
            'numero' => $row['numero'], 
            'nombres' => $row['nombres'],
            'documento' => $row['documento'],
            'correo' => $row['correo'],
            'fventa' => $row['fventa'],
            'corte' => $row['corte'],
            'selector' => $row['selector'] ?? null, // Podría ser opcional, entonces usamos ?? null
            'planhistorico' => $row['planhistorico'],
            'planventa' => $row['planventa'],
            'segmento' => $row['segmento'] ?? null, // Opcional
            'activacion' => $row['activacion'],
            'ngrabacion' => $row['ngrabacion'],
            'confronta' => $row['confronta'] ?? null, // Opcional
            'orden' => $row['orden'] ?? null, // Opcional
            'observacion' => $row['observacion'],
            'agente' => $row['agente'],
            'revisados' => $row['revisados'] ?? null, // Opcional
            'estadorevisado' => $row['estadorevisado'] ?? null, // Opcional
            'obs2' => $row['obs2'] ?? null, // Opcional
            'backoffice' => $row['backoffice'] ?? null, // Opcional
            'hora' => $row['hora'],
            'dia' => $row['dia'] ?? null, // Opcional
            'created_at' => now(), // establecemos la fecha y hora actual para created_at
            'updated_at' => now(), // establecemos la fecha y hora actual para updated_at
            'likewize' => $row['likewize'],
            'ley2300' => $row['ley2300'],
        ]);
    }

    /**
    * @return int
    */
    public function chunkSize(): int
    {
        return 1000; // Tamaño del lote, puedes ajustar esto según tus necesidades
    }

    /**
    * @param Throwable $e
    * @param mixed $row
    * @return void
    */
   
}

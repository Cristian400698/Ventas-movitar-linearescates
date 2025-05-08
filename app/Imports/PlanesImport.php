<?php

namespace App\Imports;

use App\Planadquiere;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PlanesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if ($key === 0) continue; // Saltar la primera fila (encabezados)

            Planadquiere::create([
                'numero' => $row[0],
                'documento' => $row[1],
                'nombres' => $row[2],
                'apellidos' => $row[3],
                'correo' => $row[4],
                'departamento' => $row[5],
                'id_ciudad' => $row[6],
                'barrio' => $row[7],
                'direccion' => $row[8],
                'nip' => $row[9],
                'tipocliente' => $row[10],
                'ncontacto' => $row[11],
                'planadquiere' => $row[12],
                'tipoPagos' => $row[13],
                'modelo' => $row[14],
                'ngrabacion' => $row[15],
                'orden' => $row[16],
                'confronta' => $row[17],
                'observaciones' => $row[18],
                'selector' => $row[19],
                'agente' => $row[20],
                'revisados' => $row[21],
                'estadorevisado' => $row[22],
                'obs2' => $row[23],
                'backoffice' => $row[24],
                'hora' => $row[25],
                'dia' => $row[26],
                'EqComprado' => $row[27],
                'ComEquipo' => $row[28],
                'ValEquipo' => $row[29],
                'patinador' => $row[30],
                'likewize'=> $row[31],
                'ley2300' => $row[32],
            ]);
        }
    }
}

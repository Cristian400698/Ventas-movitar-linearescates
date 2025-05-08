<?php

namespace App\Imports;

use App\Models\Cobertura;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class CoberturaImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function transformDate($value, $format = 'Y-m-d')
{
    try {
        return \Carbon\Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));
    } catch (\ErrorException $e) {
        return \Carbon\Carbon::createFromFormat($format, $value);
    }
}
    public function model(array $row)
    {
        return new Cobertura([

            'id' => $row[0],
            'LocalidadDaneCD' =>$row[1],
            'CableID' =>$row[2],
            'EquipoID' =>$row[3],
            'PlacaID' =>$row[4],
            'TipoEquipo' =>$row[5],
            'CTO' =>$row[6],
            'PorcentajeLibreCTO' =>$row[7],
            'PuertosLibresCTO' =>$row[8],
            'Clusters' =>$row[9],
            'RegionComercial' =>$row[10],
            'Departamento' =>$row[11],
            'Localidad' =>$row[12],
            'CodBarrio' =>$row[13],
            'NombreBarrio' =>$row[14],
            'BarrioCartografia' =>$row[15],
            'DireccionCliente' =>$row[16],
            'Edificio' =>$row[17],
            'Telefono' =>$row[18],
            'Estado' =>$row[19],
            'Flag' =>$row[20],
            'FechaComercializacion' => $this->transformDate($row[21]),
            'FechaActualizacion' => $this->transformDate($row[22]),
            'LLDDireccionCCA' =>$row[23],
            'LLDBarrioCCA' =>$row[24],
            'LLDCluster' =>$row[25],
            'LLDSubCluster' =>$row[26],
            'LLDEdificio' =>$row[27],
            'FlagOcupacion' =>$row[28],
        ]);

    }

    /* public function rules(): array
    {
        return [
            'FechaComercializacion' => 'date',
            'FechaActualizacion' => 'date'
        ];
    } */
}

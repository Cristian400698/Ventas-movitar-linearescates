<?php

namespace App\Imports;

use App\Models\altoriesgo;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class AltoriesgoImport implements ToModel
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
        return new altoriesgo([
            'regional' => $row[0],
            'departamento' => $row[1], 
            'ciudad' => $row[2],
            'barrio' => $row[3],
            'tiempoentrega_alistamiento' => $row[4],
            'observacion' => $row[5],
            'h_lunes_viernes' => $row[6],
            'nombre_punto' => $row[7],
            'direccion' => $row[8], 
        ]);
    }
}

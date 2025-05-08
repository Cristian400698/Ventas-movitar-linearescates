<?php

namespace App\Exports;

use App\Models\rechazo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RechazoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return rechazo::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'Numero',
            'Nombres',
            'Documento',
            'Causal',
            'Linea',
            'Departamento',
            'Id ciudad',
            'Claro',
            'Tigo',
            'Directv',
            'Wow',
            'Barrio',
            'Otros',
            'Modalidad',
            'Fecha rechazo',
            'Imagen rechazo',
            'Observacion',
            'Hora',
            'Dia',
            'Agente',
            'Fecha creacion',
            'Fecha actualizacion',
        ];
    }
}

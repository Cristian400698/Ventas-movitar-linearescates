<?php

namespace App\Exports;

use App\Models\linea_nueva;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LineanuevaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return linea_nueva::all();
    }
    public function headings(): array
    {
        return [
            'id',
            'Numero',
            'Documento',
            'Nombres',
            'Apellido',
            'Correo',
            'Departamento',
            'Id de la ciudad',
            'Barrio',
            'Direccion',
            'Tipo cliente',
            'Numero contacto',
            'Selector',
            'Numero Grabacion',
            'Orden',
            'Confronta',
            'Observacion',
            'Agente',
            'Revisados',
            'Estado revisado',
            'Observacion 2',
            'Back office',
            'Fecha creacion',
            'Fecha actualizacion',
            'Hora',
            'Dia',
        ];
    }
}

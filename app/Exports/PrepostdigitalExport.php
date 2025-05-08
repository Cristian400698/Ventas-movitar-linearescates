<?php

namespace App\Exports;

use App\Models\prepostdigital;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class PrepostdigitalExport implements FromCollection, WithHeadings
{ use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct(string $fechaInicio, string $fechaFin)
    {
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;

    }
    public function collection()
    {
        return prepostdigital::firstOrNew()
        ->where('dia', '>=', $this->fechaInicio)
        ->where('dia', '<=', $this->fechaFin)
        ->get();
    }
    public function headings(): array
    {
        return [
            'id',
            'Numero',
            'Nombre',
            'Documento',
            'Fecha expedicion',
            'Tipo cliente',
            'Correo',
            'Departamento',
            'id de ciudad',
            'Barrio',
            'Direccion',
            'Corte',
            'Plan venta',
            'Segmento',
            'Activacion',
            'Confronta',
            'Token',
            'Selector',
            'Orden',
            'Observaciones',
            'Agente',
            'Revisados',
            'Estado revisado',
            'Observacion 2',
            'Back office',
            'Hora',
            'Dia',
            'Fecha Creacion',
            'Fecha actualizacion',
            'Numero de grabacion',
        ];
    }
}

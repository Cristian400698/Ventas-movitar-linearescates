<?php

namespace App\Exports;

use App\Models\upgradeinbo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class UpgradeinboundExport implements FromCollection, WithHeadings
{
    
    use Exportable;
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
        return upgradeinbo::firstOrNew()
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
            'Correo',
            'Fecha venta',
            'Corte',
            'Selector',
            'Plan Historico',
            'Plan venta',
            'Segmento',
            'Activacion',
            'Numero Grabacion',
            'Confronta',
            'Orden',
            'Observacion',
            'Agente',
            'Revisados',
            'Estado revisado',
            'Observacion 2',
            'Back office',
            'Hora',
            'Dia',
            'Fecha creacion',
            'Fecha actualizacion',
        ];
    }
}

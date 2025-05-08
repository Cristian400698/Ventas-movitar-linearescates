<?php

namespace App\Exports;

use App\Models\portatelev;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class PortateleventaExport implements FromCollection, WithHeadings
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
        return portatelev::firstOrNew()
        ->where('dia', '>=', $this->fechaInicio)
        ->where('dia', '<=', $this->fechaFin)
        ->get();
    }
    public function headings(): array
    {
        return [
            'id',
            'Numero',
            'Documento',
            'Nombres',
            'Apellidos',
            'Correo',
            'Departamento',
            'id Ciudad',
            'Barrio',
            'Direccion',
            'Nip',
            'Tipo Cliente',
            'Plan adquiere',
            'Segmento',
            'Numero Contacto',
            'Imei',
            'FVC',
            'Fecha entrega',
            'Fecha expedicion',
            'Fecha nacimiento',
            'Origen',
            'NumeroGrabacion',
            'Selector',
            'orden',
            'Confronta',
            'Observacion',
            'Agente',
            'Revisados',
            'Estado Revisado',
            'Observacion 2',
            'Backoffice',
            'Hora',
            'Dia',
            'Fecha creacion',
            'Fecha actualizacion',
        ];
    }
}

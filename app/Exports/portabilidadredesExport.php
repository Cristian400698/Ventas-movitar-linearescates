<?php

namespace App\Exports;

use App\Models\portabilidadrede;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class portabilidadredesExport implements FromCollection, WithHeadings
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
        return portabilidadrede::firstOrNew()
        ->where('dia', '>=', $this->fechaInicio)
        ->where('dia', '<=', $this->fechaFin)
        ->get();
    }
    public function headings(): array
    {
        return [
            'id',
            'Dia',
            'Hora',            
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
            'patinador',
            'likewize',
            'Fecha creacion',
            'Fecha actualizacion',
            'ley2300',
        ];
    }
}

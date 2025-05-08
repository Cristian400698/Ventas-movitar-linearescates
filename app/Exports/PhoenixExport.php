<?php

namespace App\Exports;

use App\Models\phoenixe;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class PhoenixExport implements FromCollection, WithHeadings
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
        return phoenixe::firstOrNew()
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
            'Apellido',
            'Correo',
            'Departamento',
            'Id de la ciudad',
            'Barrio',
            'Direccion',
            'Nip',
            'Tipo cliente',
            'Numero contacto',
            'Plan adquiere',
            'Tipo pago',
            'Modelo',
            'Numero Grabacion',
            'Orden',
            'Confronta',
            'Observacion',
            'Selector',
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

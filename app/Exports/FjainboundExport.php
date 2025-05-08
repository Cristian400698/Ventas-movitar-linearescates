<?php

namespace App\Exports;

use App\Models\fijainbound;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class FjainboundExport implements FromCollection, WithHeadings
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
        return fijainbound::firstOrNew()
        ->where('dia', '>=', $this->fechaInicio)
        ->where('dia', '<=', $this->fechaFin)
        ->get();
    }
    public function headings(): array
    {
        return [
            'id',
            'Nombre',
            'Documento',
            'Fecha expedicion',
            'Correo',
            'Departamento',
            'Id de laciudad',
            'Barrio',
            'Direccion',
            'Estrato',
            'Numero Grabacion',
            'Numero contacto',
            'Producto',
            'Segmento',
            'FOX',
            'HBO',
            'CDS Movil',
            'CDS Fija',
            'Paquete ADULTO',
            'Decodificador',
            'Svas lineas',
            'Velocidad',
            'Tecnologia',
            'Orden',
            'Selector',
            'Confronta',
            'Observacion',
            'Agente',
            'Revisados',
            'Estado revisado',
            'Observacion 2',
            'Back office',
            'Hora',
            'Dia',
            'Fecha creacion',
            'Fechas actualizacion',
        ];
    }
}

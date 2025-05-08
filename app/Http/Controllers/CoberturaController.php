<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CoberturaImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\Gate;

class CoberturaController extends Controller
{

    public function index(Request $request)
    {

        abort_if(Gate::denies('cobertura'), 403);

        $departamento = trim($request->get('departamento'));
        $nomenclatura = trim($request->get('nomenclatura'));
        $numero_nomenclatura_uno = trim($request->get('numero_nomenclatura_uno'));
        $letra_nomenclatura_uno = trim($request->get('letra_nomenclatura_uno'));
        $nomenclatura_dos = trim($request->get('nomenclatura_dos'));
        $numero_nomenclatura_dos = trim($request->get('numero_nomenclatura_dos'));
        $letra_nomenclatura_dos = trim($request->get('letra_nomenclatura_dos'));
        $numero_nomenclatura_tres = trim($request->get('numero_nomenclatura_tres'));
        $complemento_uno = trim($request->get('complemento_uno'));
        $numero_complemento_uno = trim($request->get('numero_complemento_uno'));
        $complemento_dos = trim($request->get('complemento_dos'));
        $numero_complemento_dos = trim($request->get('numero_complemento_dos'));
        $direccion = trim($request->get('direccion'));
        $ciudad = trim($request->get('ciudad'));


        $aprox = $nomenclatura.' '.$numero_nomenclatura_uno.' '.$letra_nomenclatura_uno.' '.$nomenclatura_dos.''.$numero_nomenclatura_dos.''.$letra_nomenclatura_dos.''.$numero_nomenclatura_tres.''.$complemento_uno.''.$numero_complemento_uno.''.$complemento_dos.''.$numero_complemento_dos;

         if(empty($letra_nomenclatura_uno)){

            $aprox = $nomenclatura.' '.$numero_nomenclatura_uno.''.$nomenclatura_dos.''.$numero_nomenclatura_dos.''.$letra_nomenclatura_dos.''.$numero_nomenclatura_tres.''.$complemento_uno.''.$numero_complemento_uno.''.$complemento_dos.''.$numero_complemento_dos;
        }/*else

        if(empty($letra_nomenclatura_dos)){
            $aprox = $nomenclatura.' '.$numero_nomenclatura_uno.' '.$letra_nomenclatura_uno.' '.$nomenclatura_dos.' '.$numero_nomenclatura_dos.'-'.$numero_nomenclatura_tres.' '.$complemento_uno.' '.$numero_complemento_uno.' '.$complemento_dos.' '.$numero_complemento_dos;

        }else
        if(empty($complemento_uno)){

            $aprox = $nomenclatura.' '.$numero_nomenclatura_uno.' '.$nomenclatura_dos.' '.$numero_nomenclatura_dos.' '.$letra_nomenclatura_dos.'-'.$numero_nomenclatura_tres.' '.$complemento_uno.' '.$numero_complemento_uno.' '.$complemento_dos.' '.$numero_complemento_dos;
        } */

        $coberturas = DB::table('coberturas')->select(
            'id',
            'LocalidadDaneCD',
            'CableID',
            'EquipoID',
            'PlacaID',
            'TipoEquipo',
            'CTO',
            'PorcentajeLibreCTO',
            'PuertosLibresCTO',
            'Clusters',
            'RegionComercial',
            'Departamento',
            'Localidad',
            'CodBarrio',
            'NombreBarrio',
            'BarrioCartografia',
            'DireccionCliente',
            'Edificio',
            'Telefono',
            'Estado',
            'Flag',
            'FechaComercializacion',
            'FechaActualizacion',
            'LLDDireccionCCA',
            'LLDBarrioCCA',
            'LLDCluster',
            'LLDSubCluster',
            'LLDEdificio',
            'FlagOcupacion'
        )
        ->where('Departamento', '=', $departamento )
        ->where('DireccionCliente','LIKE', '%'.$direccion.'%')
        ->where('DireccionCliente', 'LIKE', '%'.$aprox.'%')
        ->where('Localidad', '=', $ciudad )
        /* ->where('DireccionCliente','=', $aprox) */
        /* ->orwhere('DireccionCliente', 'LIKE', '%'.$direccion.'%') */
        ->paginate(20);

        return view('cobertura.index', compact('coberturas'));
    }

    public function show()
    {
        abort_if(Gate::denies('permission_index'), 403);
        return view('Cobertura.import');
    }

    public function store(Request $request)
    {
        Excel::import(new CoberturaImport, $request->file('file')->store('temp'));
        return redirect()->route('cobertura.index')->withStatus('Excel importado correctamente');
    }

}

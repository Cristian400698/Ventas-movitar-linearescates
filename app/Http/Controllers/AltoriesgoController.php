<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CoberturaImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Psy\Command\WhereamiCommand;
use Illuminate\Support\Facades\Gate;
use App\Models\altoriesgo;
use App\Models\Cobertura;
use App\Models\Colombia;

class AltoriesgoController extends Controller
{

    public function index()
    {
         $colombia = Colombia::all();
 
         $data = [
             'colombia' => $colombia,
 
         ];

        abort_if(Gate::denies('altoriesgo'), 403);
        return view('altoriesgo.index', $data);
    }
    public function buscador(Request $request)
    {
        
        $colombia = Colombia::all();
 
        $data = [
            'colombia' => $colombia,

        ];
        $coberturanulo = 'internal';
        $departamento = trim($request->get('departamento'));
        $direccion = trim($request->get('direccion'));
        $ciudadselec = trim($request->get('ciudad'));
 
        /* Busqueda de los puntos en la ciudad */
        if ($direccion == null) {
            $coberturas = Altoriesgo::select('regional','departamento','ciudad','observacion','barrio','tiempoentrega_alistamiento','h_lunes_viernes','nombre_punto','direccion')
            ->where('OBSERVACION', '=', 'SIN RIESGO' )
            ->where('ciudad','LIKE','%'.$ciudadselec.'%')
            ->paginate(10);

            foreach ($coberturas as $cobertura) {   
               
                return view('altoriesgo.index',$data, compact('coberturas','ciudadselec', 'coberturanulo'));
             }
                    $coberturanulo = 'nulo';
        
                    
                   return view('altoriesgo.index',$data, compact('coberturas','ciudadselec', 'coberturanulo')); 
        } 
        else {
        
        /* Busqueda por el barrio */
        
    $coberturas = Altoriesgo::select('regional','departamento','ciudad','observacion','barrio','tiempoentrega_alistamiento','h_lunes_viernes','nombre_punto','direccion')
         ->where('barrio','LIKE','%'.$direccion.'%' )
         ->where('ciudad','LIKE','%'.$ciudadselec.'%')
         ->paginate(1);

         foreach ($coberturas as $cobertura) {               
                $coberturas = Altoriesgo::select('regional','departamento','ciudad','observacion','barrio','tiempoentrega_alistamiento','h_lunes_viernes','nombre_punto','direccion')
                ->where('ciudad','LIKE','%'.$ciudadselec.'%' )
                ->where('OBSERVACION', '=', 'SIN RIESGO' )
                ->paginate(10);        
            return view('altoriesgo.index',$data, compact('coberturas','ciudadselec', 'coberturanulo'));
         }
         /* Busqueda por el punto o encargo */
    $coberturas = Altoriesgo::select('regional','departamento','ciudad','observacion','barrio','tiempoentrega_alistamiento','h_lunes_viernes','nombre_punto','direccion')
         ->where('nombre_punto','LIKE','%'.$direccion.'%')
         ->where('ciudad','LIKE','%'.$ciudadselec.'%' )
         ->paginate(1);

         foreach ($coberturas as $cobertura) {   
               
        return view('altoriesgo.index',$data, compact('coberturas','ciudadselec', 'coberturanulo'));
     }
            $coberturanulo = 'nulo';

            
           return view('altoriesgo.index',$data, compact('coberturas','ciudadselec', 'coberturanulo')); 
         
    }}

}
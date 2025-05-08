<?php

namespace App\Http\Controllers;

use App\Exports\SupervisorExport;
use App\Exports\SupervisorhoraExport;
use App\Models\Ciclo;
use App\Models\fijadigital;
use App\Models\fijainbound;
use App\Models\fijateleventa;
use App\Models\portadigital;
use App\Models\portainbound;
use App\Models\portatelev;
use App\Models\prepostdigital;
use App\Models\preposteleventa;
use App\Models\prepostinbound;
use App\Models\upgradedigi;
use App\Models\upgradeinbo;
use App\Models\upgradetelev;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PersonalSuperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         /* por meses */
         $mes = $request->get('mes');

         if ($mes == 'enero' ) {
             $y = '01';
          }elseif ($mes == 'febrero') {
             $y = '02';
          }elseif ($mes == 'marzo') {
             $y = '03';
          }elseif ($mes == 'abril'or $mes == '') {
             $y = '04';
          }elseif ($mes == 'mayo') {
             $y = '05';
          }elseif ($mes == 'junio') {
             $y = '06';
          }elseif ($mes == 'julio') {
             $y = '07';
          }elseif ($mes == 'agosto') {
             $y = '08';          
          }elseif ($mes == 'septiembre') {
             $y = '09';
          }elseif ($mes == 'octubre') {
             $y = '10';
          }elseif ($mes == 'noviembre' ) {
             $y = '11';
          }elseif ($mes == 'diciembre') {
             $y = '12';
        }

        
        $date = Carbon::now();
        $date = $date->format('Y-m-d');

         $users =DB::table('users')
       /*  ->join('portainbounds', 'portainbounds.agente', '=', 'users.cedula')  */
        ->select( '*')
          ->where('supervisor_name', '=', Auth::user()->name)  
        /*   ->where('fecha','=', $date)  */
       /*    ->orderBy('ciclos.id', 'asc') */
          ->get(); 
      /*     return $ciclosos; */

      
      $dataportainbound = [];
      foreach ($users as $envio) {
        $dataportainbound['label'][] = $envio->name;
        $dataportainbound['dashsuper'][] = portainbound::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        $dataportainbound['dashsuperdigital'][] = portadigital::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        $dataportainbound['dashsuperportatelev'][] = portatelev::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        /*upgrade sections */
        $dataportainbound['dashsuperupgradeinbo'][] = upgradeinbo::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        $dataportainbound['dashsuperupgradedigi'][] = upgradedigi::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        $dataportainbound['dashsuperupgradetelev'][] = upgradetelev::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        /* Prepost sections */
        $dataportainbound['dashsuperprepostinbound'][] = prepostinbound::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        $dataportainbound['dashsuperprepostdigital'][] = prepostdigital::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        $dataportainbound['dashsuperpreposteleventa'][] = preposteleventa::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        /* Fija sections */
        $dataportainbound['dashsuperfijainbound'][] = fijainbound::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        $dataportainbound['dashsuperfijadigital'][] = fijadigital::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
        $dataportainbound['dashsuperfijateleventa'][] = fijateleventa::where('agente', $envio->cedula )->where('dia', 'LIKE','%'.'2023-'.$y.'%')->count();
    }
    $dataportainbound['dataportainbound'] = json_encode($dataportainbound);

    

     /* return $dataportainbound['dashsuper'];  */
        return view('horacorte.edit', $dataportainbound ,compact('users', 'mes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::paginate(10);
        return view('horacorte.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_nombre = Auth::user()->name;
        $users = User::where('supervisor_name', '=', $user_nombre)
        ->paginate(10) ;
        return view('horacorte.index', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $user = User::find($id);
        if ( $user->supervisor_name != null) {
            return redirect()->route('superpersonal.edit','1')->with('warning', 'el usuario esta asignado a ' . $user->supervisor_name);
        }else{
            
        $user->supervisor_name = Auth::user()->name;
        $user->save();
        return redirect()->route('superpersonal.edit','1')->with('success', 'usuario agregado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->supervisor_name = '';
        $user->save();
       return redirect()->route('superpersonal.edit','1')->with('danger', 'usuario removido correctamente');
       /* return back()->with('success'. 'usuario eliminado correctamente'); */
    }
    public function exportExcel(Request $request)
    {
      $mes = $request->get('mes');
      $campaña = $request->get('campaña');

         if ($mes == 'enero' ) {
             $y = '01';
          }elseif ($mes == 'febrero') {
             $y = '02';
          }elseif ($mes == 'marzo') {
             $y = '03';
          }elseif ($mes == 'abril') {
             $y = '04';
          }elseif ($mes == 'mayo') {
             $y = '05';
          }elseif ($mes == 'junio') {
             $y = '06';
          }elseif ($mes == 'julio') {
             $y = '07';
          }elseif ($mes == 'agosto') {
             $y = '08';          
          }elseif ($mes == 'septiembre') {
             $y = '09';
          }elseif ($mes == 'octubre') {
             $y = '10';
          }elseif ($mes == 'noviembre' or $mes == '') {
            $mes = 'Noviemnre';
             $y = '11';
          }elseif ($mes == 'diciembre') {
             $y = '12';
        }

         if ($campaña == 'portainbound') {
         $x = 'portainbounds';
         }elseif($campaña == 'portadigi'){
         $x = 'portadigitals';
         }elseif($campaña == 'portatelev'){
         $x = 'portatelevs';
         }elseif($campaña == 'upgradeinbo'){
         $x = 'upgradeinbos';
         }elseif($campaña == 'upgradedigi'){
         $x = 'upgradedigis';
         }elseif($campaña == 'upgradetelev'){
         $x = 'upgradetelevs';
         }elseif($campaña == 'preposinbo'){
         $x = 'prepostinbounds';
         }elseif($campaña == 'preposdigi'){
         $x = 'prepostdigitals';
         }elseif($campaña == 'prepostelev'){
         $x = 'portatelevs';
         }elseif($campaña == 'fijainbo'){
         $x = 'fijainbounds';
         }elseif($campaña == 'fijadigi'){
         $x = 'fijadigitals';
         }elseif($campaña == 'fijatelev'){
         $x = 'ijateleventas';
         }elseif($campaña == 'lineanueva'){
         $x = 'linea_nuevas';
         }elseif($campaña == 'phoenix'){
         $x = 'phoenixes';
         }elseif($campaña == 'rechazos'){
         $x = 'rechazos';
         }
        
         return Excel::download(new SupervisorhoraExport($y, $x), 'ventas: '.$campaña.'-'.$mes.'.xlsx');
   
    }

    public function searchsuperpersonal(Request $request)
    {
        $users = User::where('cedula', '=', $request->get('text'))
        ->paginate(10);
        return view('horacorte.create', compact('users'));

    }
    public function searchsuperpersonalindex(Request $request)
    {
        $user_nombre = Auth::user()->name;
        $users = User::where('cedula', '=', $request->get('text'))
        ->where('supervisor_name', '=', $user_nombre)
        ->paginate(10);
        return view('horacorte.index', compact('users'));

    }
   
}


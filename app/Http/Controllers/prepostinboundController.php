<?php

namespace App\Http\Controllers;

use App\Exports\PrepostinboundExport;
use App\Http\Controllers\Controller;
use App\Models\activacion;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\prepostinbound;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\corte;
use App\Models\planesprepost;
use Maatwebsite\Excel\Facades\Excel;

class prepostinboundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-inbound'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $prepostinbound = prepostinbound::orderBy('dia', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('prepostinbound.index',  compact('prepostinbound'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Carbon::setLocale('co');
	    $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $usuarios = User::all();
        $Planadquieres = Planadquiere::all();
        $tipoclientes = tipoclientes::all();
        $corte       = corte::all();
        $plan = planesprepost::all();
        $activacion = activacion::all();
        
        return view('prepostinbound.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','corte','plan','activacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prepostinbound = new prepostinbound();

        $prepostinbound->numero = $request->get('numero');
        $prepostinbound->nombres = $request->get('nombres');
        $prepostinbound->documento = $request->get('documento');
        $prepostinbound->fexpedicion = $request->get('fexpedicion');
        $prepostinbound->tipocliente = $request->get('tipocliente');
        $prepostinbound->correo = $request->get('correo');
        $prepostinbound->departamento = $request->get('departamento');
        $prepostinbound->id_ciudad = $request->get('id_ciudad');
        $prepostinbound->barrio = $request->get('barrio');
        $prepostinbound->direccion = $request->get('direccion');
        $prepostinbound->corte = $request->get('corte');
        $prepostinbound->planventa = $request->get('planventa');
        $prepostinbound->segmento = $request->get('segmento');
        $prepostinbound->activacion = $request->get('activacion');
        $prepostinbound->confronta = $request->get('confronta');
        $prepostinbound->token = $request->get('token');
        $prepostinbound->selector = $request->get('selector');
        $prepostinbound->orden = $request->get('orden');
        $prepostinbound->observaciones = $request->get('observaciones');
        $prepostinbound->agente = $request->get('agente');
        $prepostinbound->revisados = $request->get('revisados');
        $prepostinbound->estadorevisado = $request->get('estadorevisado');
        $prepostinbound->obs2 = $request->get('obs2');
        $prepostinbound->backoffice = $request->get('backoffice');
        $prepostinbound->hora = Carbon::now()->format('H:i:s');
        $prepostinbound->dia = $request->get('dia');
        $prepostinbound->NumGrabacion = $request->get('numero_grabacion');

        if ($request->hasFile('confronta')) {
            $prepostinbound['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $prepostinbound['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $prepostinbound['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        $prepostinbound->save();

        return redirect('prepostinbound/create')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('back-inbound'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $prepostinbound = prepostinbound::orderBy('dia', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('prepostinbound.index',  compact('prepostinbound'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('back-inbound'), 403);
        $prepost=prepostinbound::findOrFail($id);
        return view('prepostinbound.edit',compact('prepost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prepostinbound = prepostinbound::find($id);

        $prepostinbound->numero = $request->get('numero');
        $prepostinbound->nombres = $request->get('nombres');
        $prepostinbound->documento = $request->get('documento');
        $prepostinbound->fexpedicion = $request->get('fexpedicion');
        $prepostinbound->tipocliente = $request->get('tipocliente');
        $prepostinbound->correo = $request->get('correo');
        $prepostinbound->departamento = $request->get('departamento');
        $prepostinbound->id_ciudad = $request->get('id_ciudad');
        $prepostinbound->barrio = $request->get('barrio'); 
        $prepostinbound->direccion = $request->get('direccion'); 
        $prepostinbound->corte = $request->get('corte');
        $prepostinbound->planventa = $request->get('planventa');
        $prepostinbound->segmento = $request->get('segmento');
        $prepostinbound->activacion = $request->get('activacion');
        $prepostinbound->token = $request->get('token');
        $prepostinbound->selector = $request->get('selector'); 
        $prepostinbound->orden = $request->get('orden');
        $prepostinbound->observaciones = $request->get('observaciones');
        $prepostinbound->revisados = $request->get('revisados');
        $prepostinbound->estadorevisado = $request->get('estadorevisado');
        $prepostinbound->obs2 = $request->get('obs2');
        $prepostinbound->backoffice = $request->get('backoffice');
        $prepostinbound->NumGrabacion = $request->get('numero_grabacion');

        $prepostinbound->save();
        
        return redirect('prepostinbound')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prepostinbound = prepostinbound::find($id);        
        $prepostinbound->delete();

        return redirect('prepostinbound')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchinnboundprepost(Request $request)
    {
        $searchinnboundprepost = $request->get('searchinnboundprepost');
        $prepostinbound = prepostinbound::firstOrNew()
	->where('Numero', 'like', '%'.$searchinnboundprepost.'%')
	->paginate(20);

        return view('prepostinbound.index',compact('prepostinbound'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new PrepostinboundExport($fecha_ini, $fecha_fin), 'Prepost_Inbound.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new PrepostinboundExport  ($fecha_ini, $fecha_fin), 'Prepost_Inbound.xlsx');
   }
    }
}

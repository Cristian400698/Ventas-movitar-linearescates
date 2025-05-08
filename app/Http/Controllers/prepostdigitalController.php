<?php

namespace App\Http\Controllers;

use App\Exports\PrepostdigitalExport;
use App\Http\Controllers\Controller;
use App\Models\activacion;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\prepostdigital;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\corte;
use App\Models\planesprepost;
use Maatwebsite\Excel\Facades\Excel;

class prepostdigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-digital'), 403);
        $prepostdigital = prepostdigital::all();
        $prepostdigital = prepostdigital::orderBy('dia', 'asc')->paginate(20);
        return view('prepostdigital.index',  compact('prepostdigital'));
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

        return view('prepostdigital.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','corte','plan','activacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prepostdigital = new prepostdigital();

        $prepostdigital->numero = $request->get('numero');
        $prepostdigital->nombres = $request->get('nombres');
        $prepostdigital->documento = $request->get('documento');
        $prepostdigital->fexpedicion = $request->get('fexpedicion');
        $prepostdigital->tipocliente = $request->get('tipocliente');
        $prepostdigital->correo = $request->get('correo');
        $prepostdigital->departamento = $request->get('departamento');
        $prepostdigital->id_ciudad = $request->get('id_ciudad');
        $prepostdigital->barrio = $request->get('barrio');
        $prepostdigital->direccion = $request->get('direccion');
        $prepostdigital->corte = $request->get('corte');
        $prepostdigital->planventa = $request->get('planventa');
        $prepostdigital->segmento = $request->get('segmento');
        $prepostdigital->activacion = $request->get('activacion');
        $prepostdigital->confronta = $request->get('confronta');
        $prepostdigital->token = $request->get('token');
        $prepostdigital->selector = $request->get('selector');
        $prepostdigital->orden = $request->get('orden');
        $prepostdigital->observaciones = $request->get('observaciones');
        $prepostdigital->agente = $request->get('agente');
        $prepostdigital->revisados = $request->get('revisados');
        $prepostdigital->estadorevisado = $request->get('estadorevisado');
        $prepostdigital->obs2 = $request->get('obs2');
        $prepostdigital->backoffice = $request->get('backoffice');
        $prepostdigital->hora = Carbon::now()->format('H:i:s');
        $prepostdigital->dia = $request->get('dia');
        $prepostdigital->NumGrabacion = $request->get('numero_grabacion');

        if ($request->hasFile('confronta')) {
            $prepostdigital['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $prepostdigital['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $prepostdigital['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

        $prepostdigital->save();

        return redirect('prepostdigital/create')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('back-digital'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $prepostdigital = prepostdigital::orderBy('dia', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('prepostdigital.index',  compact('prepostdigital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('back-digital'), 403);
        $prepost=prepostdigital::findOrFail($id);
        return view('prepostdigital.edit',compact('prepost'));
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
        $prepostdigital = prepostdigital::find($id);

        $prepostdigital->numero = $request->get('numero');
        $prepostdigital->nombres = $request->get('nombres');
        $prepostdigital->documento = $request->get('documento');
        $prepostdigital->fexpedicion = $request->get('fexpedicion');
        $prepostdigital->tipocliente = $request->get('tipocliente');
        $prepostdigital->correo = $request->get('correo');
        $prepostdigital->departamento = $request->get('departamento');
        $prepostdigital->id_ciudad = $request->get('id_ciudad');
        $prepostdigital->barrio = $request->get('barrio');
        $prepostdigital->direccion = $request->get('direccion');
        $prepostdigital->corte = $request->get('corte');
        $prepostdigital->planventa = $request->get('planventa');
        $prepostdigital->segmento = $request->get('segmento');
        $prepostdigital->activacion = $request->get('activacion');
        $prepostdigital->token = $request->get('token');
        $prepostdigital->selector = $request->get('selector');
        $prepostdigital->orden = $request->get('orden');
        $prepostdigital->observaciones = $request->get('observaciones');
        $prepostdigital->revisados = $request->get('revisados');
        $prepostdigital->estadorevisado = $request->get('estadorevisado');
        $prepostdigital->obs2 = $request->get('obs2');
        $prepostdigital->backoffice = $request->get('backoffice');
        $prepostdigital->NumGrabacion = $request->get('numero_grabacion');

        $prepostdigital->save();

        return redirect('prepostdigital/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prepostdigital = prepostdigital::find($id);        
        $prepostdigital->delete();

        return redirect('prepostdigital')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchdigiprepost(Request $request)
    {
	$prepostdigital = prepostdigital::all();
        $searchdigiprepost = $request->get('searchdigiprepost');
        $prepostdigital = prepostdigital::firstOrNew()->where('Numero', 'like', '%'.$searchdigiprepost.'%')->paginate(20);

 
        return view('prepostdigital.index',compact('prepostdigital'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new PrepostdigitalExport($fecha_ini, $fecha_fin), 'Prepost_Digital.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new PrepostdigitalExport  ($fecha_ini, $fecha_fin), 'Prepost_Digital.xlsx');
   }
    }
}

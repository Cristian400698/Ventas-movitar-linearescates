<?php

namespace App\Http\Controllers;

use App\Exports\PrepostteleventaExport;
use App\Http\Controllers\Controller;
use App\Models\activacion;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\preposteleventa;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\corte;
use App\Models\planesprepost;
use Maatwebsite\Excel\Facades\Excel;

class preposteleventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-televanta'), 403);
        $preposteleventa = preposteleventa::all();
        $preposteleventa = preposteleventa::orderBy('dia', 'asc')->paginate(20);
        return view('preposteleventa.index',  compact('preposteleventa'));
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

        return view('preposteleventa.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','corte','plan','activacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $preposteleventa = new preposteleventa();

        $preposteleventa->numero = $request->get('numero');
        $preposteleventa->nombres = $request->get('nombres');
        $preposteleventa->documento = $request->get('documento');
        $preposteleventa->fexpedicion = $request->get('fexpedicion');
        $preposteleventa->tipocliente = $request->get('tipocliente');
        $preposteleventa->correo = $request->get('correo');
        $preposteleventa->departamento = $request->get('departamento');
        $preposteleventa->id_ciudad = $request->get('id_ciudad');
        $preposteleventa->barrio = $request->get('barrio');
        $preposteleventa->direccion = $request->get('direccion');
        $preposteleventa->corte = $request->get('corte');
        $preposteleventa->planventa = $request->get('planventa');
        $preposteleventa->segmento = $request->get('segmento');
        $preposteleventa->activacion = $request->get('activacion');
        $preposteleventa->confronta = $request->get('confronta');
        $preposteleventa->token = $request->get('token');
        $preposteleventa->selector = $request->get('selector');
        $preposteleventa->orden = $request->get('orden');
        $preposteleventa->observaciones = $request->get('observaciones');
        $preposteleventa->agente = $request->get('agente');
        $preposteleventa->revisados = $request->get('revisados');
        $preposteleventa->estadorevisado = $request->get('estadorevisado');
        $preposteleventa->obs2 = $request->get('obs2');
        $preposteleventa->backoffice = $request->get('backoffice');
        $preposteleventa->hora = Carbon::now()->format('H:i:s');
        $preposteleventa->dia = $request->get('dia');
        $preposteleventa->NumGrabacion = $request->get('numero_grabacion');

        if ($request->hasFile('confronta')) {
            $preposteleventa['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $preposteleventa['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $preposteleventa['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        $preposteleventa->save();

        return redirect('preposteleventa/create')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
        abort_if(Gate::denies('back-televanta'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $preposteleventa = preposteleventa::orderBy('dia', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('preposteleventa.index',  compact('preposteleventa'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('back-televanta'), 403);
        $prepost=preposteleventa::findOrFail($id);
        return view('preposteleventa.edit',compact('prepost'));
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
        $preposteleventa = preposteleventa::find($id);

        $preposteleventa->numero = $request->get('numero');
        $preposteleventa->nombres = $request->get('nombres');
        $preposteleventa->documento = $request->get('documento');
        $preposteleventa->fexpedicion = $request->get('fexpedicion');
        $preposteleventa->tipocliente = $request->get('tipocliente');
        $preposteleventa->correo = $request->get('correo');
        $preposteleventa->departamento = $request->get('departamento');
        $preposteleventa->id_ciudad = $request->get('id_ciudad');
        $preposteleventa->barrio = $request->get('barrio');
        $preposteleventa->direccion = $request->get('direccion');
        $preposteleventa->corte = $request->get('corte');
        $preposteleventa->planventa = $request->get('planventa');
        $preposteleventa->segmento = $request->get('segmento');
        $preposteleventa->activacion = $request->get('activacion');
        $preposteleventa->token = $request->get('token');
        $preposteleventa->selector = $request->get('selector');
        $preposteleventa->orden = $request->get('orden');
        $preposteleventa->observaciones = $request->get('observaciones');
        $preposteleventa->revisados = $request->get('revisados');
        $preposteleventa->estadorevisado = $request->get('estadorevisado');
        $preposteleventa->obs2 = $request->get('obs2');
        $preposteleventa->backoffice = $request->get('backoffice');
        $preposteleventa->NumGrabacion = $request->get('numero_grabacion');

        $preposteleventa->save();

        return redirect('preposteleventa/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preposteleventa = preposteleventa::find($id);        
        $preposteleventa->delete();

        return redirect('preposteleventa')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchteleprepost(Request $request)
    {
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $texto = $request->get('searchteleprepost'); 
        $preposteleventa = preposteleventa::firstOrNew()
	->where('Numero', 'like', '%'.$texto .'%')
        ->paginate(20);
 
        return view('preposteleventa.index',compact('preposteleventa'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new PrepostteleventaExport($fecha_ini, $fecha_fin), 'Prepost_Televenta.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new PrepostteleventaExport  ($fecha_ini, $fecha_fin), 'Prepost_Televenta.xlsx');
   }
    }
}

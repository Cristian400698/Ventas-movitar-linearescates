<?php

namespace App\Http\Controllers;

use App\Exports\FjainboundExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\fijainbound;
use App\Models\estrato;
use App\Models\producto;
use App\Models\velocidad;
use App\Models\tecnologia;
use Maatwebsite\Excel\Facades\Excel;

class fijainboundController extends Controller
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
        $fijainbound = fijainbound::all();
        $fijainbound = fijainbound::orderBy('dia', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('fijainbound.index',  compact('fijainbound'));
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
        $estrato  = estrato::all();
        $producto = producto::all();
        $velocidad = velocidad::all();
        $tecnologia = tecnologia::all();

        return view('fijainbound.create', compact('hora','date','user_nombre','user_id','usuarios','estrato','producto','velocidad','tecnologia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fijainbound = new fijainbound();

        $fijainbound->nombres = $request->get('nombres');
        $fijainbound->documento = $request->get('documento');
        $fijainbound->fexpedicion = $request->get('fexpedicion');
        $fijainbound->correo = $request->get('correo');
        $fijainbound->departamento = $request->get('departamento');
        $fijainbound->id_ciudad = $request->get('id_ciudad');
        $fijainbound->barrio = $request->get('barrio');
        $fijainbound->direccion = $request->get('direccion');
        $fijainbound->estrato = $request->get('estrato');
        $fijainbound->ngrabacion = $request->get('ngrabacion');
        $fijainbound->ncontacto = $request->get('ncontacto');
        $fijainbound->producto = $request->get('producto');
        $fijainbound->segmento = $request->get('segmento');
        $fijainbound->FOX = $request->get('FOX');
        $fijainbound->HBO = $request->get('HBO');
        $fijainbound->cds_movil = $request->get('cds_movil');
        $fijainbound->cds_fija = $request->get('cds_fija');
        $fijainbound->Paquete_Adultos = $request->get('Paquete_Adultos');
        $fijainbound->Decodificador = $request->get('Decodificador');
        $fijainbound->Svas_lineas = $request->get('Svas_lineas');
        $fijainbound->velocidad = $request->get('velocidad');
        $fijainbound->tecnologia = $request->get('tecnologia');
        $fijainbound->orden = $request->get('orden');
        $fijainbound->selector = $request->get('selector');
        $fijainbound->confronta = $request->get('confronta');
        $fijainbound->observacion = $request->get('observacion');
        $fijainbound->agente = $request->get('agente');
        $fijainbound->revisados = $request->get('revisados');
        $fijainbound->estadorevisado = $request->get('estadorevisado');
        $fijainbound->obs2 = $request->get('obs2');
        $fijainbound->backoffice = $request->get('backoffice');
        $fijainbound->hora = Carbon::now()->format('H:i:s');
        $fijainbound->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $fijainbound['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $fijainbound['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $fijainbound['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        $fijainbound->save();

        return redirect('fijainbound/create')->with('success', 'Datos guardados correctamente..');
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
    public function edit($id)
    {
        abort_if(Gate::denies('back-inbound'), 403);
        $fijas=fijainbound::findOrFail($id);
        return view('fijainbound.edit',compact('fijas'));
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
        $fijainbound = fijainbound::find($id);

        $fijainbound->nombres = $request->get('nombres');
        $fijainbound->documento = $request->get('documento');
        $fijainbound->fexpedicion = $request->get('fexpedicion');
        $fijainbound->correo = $request->get('correo');
        $fijainbound->departamento = $request->get('departamento');
        $fijainbound->id_ciudad = $request->get('id_ciudad');
        $fijainbound->barrio = $request->get('barrio');
        $fijainbound->direccion = $request->get('direccion');
        $fijainbound->estrato = $request->get('estrato');
        $fijainbound->ngrabacion = $request->get('ngrabacion');
        $fijainbound->ncontacto = $request->get('ncontacto');
        $fijainbound->producto = $request->get('producto');
        $fijainbound->segmento = $request->get('segmento');
        $fijainbound->FOX = $request->get('FOX');
        $fijainbound->HBO = $request->get('HBO');
        $fijainbound->cds_movil = $request->get('cds_movil');
        $fijainbound->cds_fija = $request->get('cds_fija');
        $fijainbound->Paquete_Adultos = $request->get('Paquete_Adultos');
        $fijainbound->Decodificador = $request->get('Decodificador');
        $fijainbound->Svas_lineas = $request->get('Svas_lineas');
        $fijainbound->velocidad = $request->get('velocidad');
        $fijainbound->tecnologia = $request->get('tecnologia');
        $fijainbound->orden = $request->get('orden');
        $fijainbound->selector = $request->get('selector');
        $fijainbound->observacion = $request->get('observacion');
        $fijainbound->revisados = $request->get('revisados');
        $fijainbound->estadorevisado = $request->get('estadorevisado');
        $fijainbound->obs2 = $request->get('obs2');
        $fijainbound->backoffice = $request->get('backoffice');

        $fijainbound->save();

        return redirect('fijainbound')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fijainbound = fijainbound::find($id);        
        $fijainbound->delete();

        return redirect('fijainbound')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchinboundfija(Request $request)
    {
	$fijainbound = fijainbound::all();
        $searchinboundfija = $request->get('searchinboundfija');
        $fijainbound = fijainbound::firstOrNew()->where('documento', 'like', '%'.$searchinboundfija.'%')->paginate(20);

 
        return view('fijainbound.index',compact('fijainbound'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new FjainboundExport($fecha_ini, $fecha_fin), 'Fija_Inbound.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new FjainboundExport  ($fecha_ini, $fecha_fin), 'Fija_Inbound.xlsx');
   }
    }
}

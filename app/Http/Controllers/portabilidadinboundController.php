<?php

namespace App\Http\Controllers;

use App\Exports\PortainboundExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\portainbound;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;


class portabilidadinboundController extends Controller
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
        $portainbound =DB::table('portainbounds')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('porta.index',compact('portainbound'));
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
        $origen = origen::all();

        return view('porta.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $portainbound = new portainbound();

        $portainbound->numero = $request->get('numero');
        $portainbound->documento = $request->get('documento');
        $portainbound->nombres = $request->get('nombres');
        $portainbound->apellidos = $request->get('apellidos');
        $portainbound->correo = $request->get('correo');
        $portainbound->departamento = $request->get('departamento');
        $portainbound->id_ciudad = $request->get('id_ciudad');
        $portainbound->barrio = $request->get('barrio');
        $portainbound->direccion = $request->get('direccion');
        $portainbound->nip = $request->get('nip');
        $portainbound->tipocliente = $request->get('tipocliente');
        $portainbound->planadquiere = $request->get('planadquiere');
        $portainbound->segmento = $request->get('segmento');
        $portainbound->ncontacto = $request->get('ncontacto');
        $portainbound->imei = $request->get('imei');
        $portainbound->fvc = $request->get('fvc');
        $portainbound->fentrega = $request->get('fentrega');
        $portainbound->fexpedicion = $request->get('fexpedicion');
        $portainbound->fnacimiento = $request->get('fnacimiento');
        $portainbound->origen = $request->get('origen');
        $portainbound->ngrabacion = $request->get('ngrabacion');
        $portainbound->selector = $request->get('selector');
        $portainbound->orden = $request->get('orden');
        $portainbound->confronta = $request->get('confronta');
        $portainbound->observaciones = $request->get('observaciones');
        $portainbound->agente = $request->get('agente');
        $portainbound->revisados = $request->get('revisados');
        $portainbound->estadorevisado = $request->get('estadorevisado');
        $portainbound->obs2 = $request->get('obs2');
        $portainbound->backoffice = $request->get('backoffice');
        $portainbound->hora = Carbon::now()->format('H:i:s');
        $portainbound->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $portainbound['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }
        
          if ($request->hasFile('ley2300')) {
            $portainbound['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $portainbound['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

        $portainbound->save();

        return redirect('porta/create')->with('success', 'Datos guardados correctamente..');
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
        $z ='Nuevo'; 
        $y ='RECUPERADA';
        $portainbound =DB::table('portainbounds')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc') 
          ->paginate(20);

        return view('porta.index',compact('portainbound'));
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
        $portainbound = portainbound::findOrFail($id);
        return view('porta.edit')->with('portainbound', $portainbound);
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
        $portainbound = portainbound::find($id); 

        $portainbound->numero = $request->get('numero');
        $portainbound->documento = $request->get('documento');
        $portainbound->nombres = $request->get('nombres');
        $portainbound->apellidos = $request->get('apellidos');
        $portainbound->correo = $request->get('correo');
        $portainbound->departamento = $request->get('departamento');
        $portainbound->id_ciudad = $request->get('id_ciudad');
        $portainbound->barrio = $request->get('barrio');
        $portainbound->direccion = $request->get('direccion');
        $portainbound->nip = $request->get('nip');
        $portainbound->tipocliente = $request->get('tipocliente');
        $portainbound->planadquiere = $request->get('planadquiere');
        $portainbound->segmento = $request->get('segmento');
        $portainbound->ncontacto = $request->get('ncontacto');
        $portainbound->imei = $request->get('imei');
        $portainbound->fvc = $request->get('fvc');
        $portainbound->fentrega = $request->get('fentrega');
        $portainbound->fexpedicion = $request->get('fexpedicion');
        $portainbound->fnacimiento = $request->get('fnacimiento');
        $portainbound->origen = $request->get('origen');
        $portainbound->ngrabacion = $request->get('ngrabacion');
        $portainbound->selector = $request->get('selector');
        $portainbound->orden = $request->get('orden');
        $portainbound->observaciones = $request->get('observaciones');
        $portainbound->agente = $request->get('agente');
        $portainbound->revisados = $request->get('revisados');
        $portainbound->estadorevisado = $request->get('estadorevisado');
        $portainbound->obs2 = $request->get('obs2');
        $portainbound->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $portainbound['confronta']=$request->file('confronta')->store('uploads','public');
          }

        if ($request->hasFile('ley2300')) {
            $portainbound['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        if ($request->hasFile('likewize')) {
            $portainbound['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

        $portainbound->save();

        return redirect('porta/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portainbound = portainbound::find($id);        
        $portainbound->delete();

        return redirect('porta/index')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchinboundback(Request $request)
    {
	$portainbound = portainbound::all();
        $searchinboundback = $request->get('searchinboundback');
        $portainbound= portainbound::firstOrNew()
	->where('Numero', 'like', '%'.$searchinboundback.'%')
	->paginate(20);

        
 
        return view('porta.index',compact('portainbound'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new PortainboundExport($fecha_ini, $fecha_fin), 'Portablidiad_inbound.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new PortainboundExport  ($fecha_ini, $fecha_fin), 'Portablidiad_inbound.xlsx');
   }
    }
}

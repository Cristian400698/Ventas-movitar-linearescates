<?php

namespace App\Http\Controllers;

use App\Exports\UpgradeinboundExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\upgradeinbo;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use App\Models\corte;
use App\Models\planhistorico;
use App\Models\activacion;
use Maatwebsite\Excel\Facades\Excel;

class upgradeController extends Controller
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
        $upgradeinbo =DB::table('upgradeinbos')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('upgradeinbo.index',compact('upgradeinbo'));
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
        $corte = corte::all();
        $planhistorico = planhistorico::all();
        $activacion = activacion::all();

        return view('upgradeinbo.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','origen','corte','planhistorico','activacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upgradeinbo = new upgradeinbo();

        $upgradeinbo->numero = $request->get('numero');        
        $upgradeinbo->nombres = $request->get('nombres');
        $upgradeinbo->documento = $request->get('documento');
        $upgradeinbo->correo = $request->get('correo');        
        $upgradeinbo->fventa = $request->get('fventa');
        $upgradeinbo->corte = $request->get('corte');
        $upgradeinbo->selector = $request->get('selector');
        $upgradeinbo->planhistorico = $request->get('planhistorico');
        $upgradeinbo->planventa = $request->get('planventa');
        $upgradeinbo->segmento = $request->get('segmento');
        $upgradeinbo->activacion = $request->get('activacion');
        $upgradeinbo->ngrabacion = $request->get('ngrabacion');
        $upgradeinbo->confronta = $request->get('confronta');
        $upgradeinbo->orden = $request->get('orden');
        $upgradeinbo->observacion = $request->get('observacion');
        $upgradeinbo->agente = $request->get('agente');
        $upgradeinbo->revisados = $request->get('revisados');
        $upgradeinbo->estadorevisado = $request->get('estadorevisado');
        $upgradeinbo->obs2 = $request->get('obs2');
        $upgradeinbo->backoffice = $request->get('backoffice');
        $upgradeinbo->hora = Carbon::now()->format('H:i:s');
        $upgradeinbo->dia = $request->get('dia');
        if ($request->hasFile('confronta')) {
            $upgradeinbo['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $upgradeinbo['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $upgradeinbo['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        $upgradeinbo->save();

        return redirect('upgradeinbo/create')->with('success', 'Datos guardados correctamente..');
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
        $upgradeinbo =DB::table('upgradeinbos')
          ->select('id','numero', 'documento','nombres','segmento','revisados', 'estadorevisado', 'agente', 'hora', 'correo','planventa','fventa','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('upgradeinbo.index',compact('upgradeinbo'));
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
        $upgradeinbo = upgradeinbo::findOrFail($id);
        return view('upgradeinbo.edit')->with('upgradeinbo', $upgradeinbo);
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
        $upgradeinbo = upgradeinbo::find($id); 

        $upgradeinbo->numero = $request->get('numero');        
        $upgradeinbo->nombres = $request->get('nombres');
        $upgradeinbo->documento = $request->get('documento');
        $upgradeinbo->correo = $request->get('correo');        
        $upgradeinbo->fventa = $request->get('fventa');
        $upgradeinbo->corte = $request->get('corte');
        $upgradeinbo->selector = $request->get('selector');
        $upgradeinbo->planhistorico = $request->get('planhistorico');
        $upgradeinbo->planventa = $request->get('planventa');
        $upgradeinbo->segmento = $request->get('segmento');
        $upgradeinbo->activacion = $request->get('activacion');
        $upgradeinbo->ngrabacion = $request->get('ngrabacion');
        $upgradeinbo->orden = $request->get('orden');
        $upgradeinbo->observacion = $request->get('observacion');
        $upgradeinbo->revisados = $request->get('revisados');
        $upgradeinbo->estadorevisado = $request->get('estadorevisado');
        $upgradeinbo->obs2 = $request->get('obs2');
        $upgradeinbo->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $upgradeinbo['confronta']=$request->file('confronta')->store('uploads','public');
          }

          if ($request->hasFile('likewize')) {
            $upgradeinbo['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $upgradeinbo['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        $upgradeinbo->save();

        return redirect('upgradeinbo/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upgradeinbo = upgradeinbo::find($id);        
        $upgradeinbo->delete();

        return redirect('upgradeinbo/index')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchinboundupgrade(Request $request)
    {
	$upgradeinbo = upgradeinbo::all();
        $searchinboundupgrade = $request->get('searchinboundupgrade');
        $upgradeinbo = upgradeinbo::firstOrNew()->where('Numero', 'like', '%'.$searchinboundupgrade.'%')->paginate(20);

 
        return view('upgradeinbo.index',compact('upgradeinbo'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new UpgradeinboundExport($fecha_ini, $fecha_fin), 'Upgrade_Inbound.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new UpgradeinboundExport  ($fecha_ini, $fecha_fin), 'Upgrade_Inbound.xlsx');
   }
    }
}

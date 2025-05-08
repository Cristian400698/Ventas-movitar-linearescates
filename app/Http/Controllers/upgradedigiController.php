<?php

namespace App\Http\Controllers;

use App\Exports\UpgradedigitalExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\upgradedigi;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use App\Models\corte;
use App\Models\planhistorico;
use App\Models\activacion;
use Maatwebsite\Excel\Facades\Excel;

class upgradedigiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-digital'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $upgradedigi =DB::table('upgradedigis')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('upgradedigi.index',compact('upgradedigi'));
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

        return view('upgradedigi.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','origen','corte','planhistorico','activacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $upgradedigi = new upgradedigi();

        $upgradedigi->numero = $request->get('numero');        
        $upgradedigi->nombres = $request->get('nombres');
        $upgradedigi->documento = $request->get('documento');
        $upgradedigi->correo = $request->get('correo');        
        $upgradedigi->fventa = $request->get('fventa');
        $upgradedigi->corte = $request->get('corte');
        $upgradedigi->selector = $request->get('selector');
        $upgradedigi->planhistorico = $request->get('planhistorico');
        $upgradedigi->planventa = $request->get('planventa');
        $upgradedigi->segmento = $request->get('segmento');
        $upgradedigi->activacion = $request->get('activacion');
        $upgradedigi->ngrabacion = $request->get('ngrabacion');
        $upgradedigi->confronta = $request->get('confronta');
        $upgradedigi->orden = $request->get('orden');
        $upgradedigi->observacion = $request->get('observacion');
        $upgradedigi->agente = $request->get('agente');
        $upgradedigi->revisados = $request->get('revisados');
        $upgradedigi->estadorevisado = $request->get('estadorevisado');
        $upgradedigi->obs2 = $request->get('obs2');
        $upgradedigi->backoffice = $request->get('backoffice');
        $upgradedigi->hora = Carbon::now()->format('H:i:s');
        $upgradedigi->dia = $request->get('dia');
        if ($request->hasFile('confronta')) {
            $upgradedigi['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $upgradedigi['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $upgradedigi['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        $upgradedigi->save();

        return redirect('upgradedigi/create')->with('success', 'Datos guardados correctamente..');
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
        $upgradedigi =DB::table('upgradedigis')
          ->select('id','numero', 'documento','nombres','segmento','revisados', 'estadorevisado', 'agente', 'hora', 'correo','planventa','fventa','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('upgradedigi.index',compact('upgradedigi'));
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
        $upgradedigi = upgradedigi::findOrFail($id);
        return view('upgradedigi.edit')->with('upgradedigi', $upgradedigi);
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
        $upgradedigi = upgradedigi::find($id); 

        $upgradedigi->numero = $request->get('numero');        
        $upgradedigi->nombres = $request->get('nombres');
        $upgradedigi->documento = $request->get('documento');
        $upgradedigi->correo = $request->get('correo');        
        $upgradedigi->fventa = $request->get('fventa');
        $upgradedigi->corte = $request->get('corte');
        $upgradedigi->selector = $request->get('selector');
        $upgradedigi->planhistorico = $request->get('planhistorico');
        $upgradedigi->planventa = $request->get('planventa');
        $upgradedigi->segmento = $request->get('segmento');
        $upgradedigi->activacion = $request->get('activacion');
        $upgradedigi->ngrabacion = $request->get('ngrabacion');
        $upgradedigi->orden = $request->get('orden');
        $upgradedigi->observacion = $request->get('observacion');
        $upgradedigi->revisados = $request->get('revisados');
        $upgradedigi->estadorevisado = $request->get('estadorevisado');
        $upgradedigi->obs2 = $request->get('obs2');
        $upgradedigi->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $upgradedigi['confronta']=$request->file('confronta')->store('uploads','public');
          }

          if ($request->hasFile('likewize')) {
            $upgradedigi['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $upgradedigi['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        $upgradedigi->save();

        return redirect('upgradedigi/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upgradedigi = upgradedigi::find($id);        
        $upgradedigi->delete();

        return redirect('upgradedigi/index')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchdigiupgrade(Request $request)
    {
	$upgradedigi = upgradedigi::all();
        $searchdigiupgrade = $request->get('searchdigiupgrade');
        $upgradedigi = upgradedigi::firstOrNew()->where('Numero', 'like', '%'.$searchdigiupgrade.'%')->paginate(20);

 
        return view('upgradedigi.index',compact('upgradedigi'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new UpgradedigitalExport($fecha_ini, $fecha_fin), 'Upgrade_Digital.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new UpgradedigitalExport  ($fecha_ini, $fecha_fin), 'Upgrade_Digital.xlsx');
   }
    }
}

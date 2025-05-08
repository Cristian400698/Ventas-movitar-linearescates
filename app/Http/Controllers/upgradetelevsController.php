<?php

namespace App\Http\Controllers;

use App\Exports\UpgradeteleventaExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\upgradetelev;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use App\Models\corte;
use App\Models\planhistorico;
use App\Models\activacion;
use Maatwebsite\Excel\Facades\Excel;

class upgradetelevsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-televanta'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $upgradetelev =DB::table('upgradetelevs')
          ->select('id','numero', 'documento','nombres','segmento','revisados', 'estadorevisado', 'agente', 'hora', 'correo','planventa','fventa','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('upgradetelev.index',compact('upgradetelev'));
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

        return view('upgradetelev.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','origen','corte','planhistorico','activacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $upgradetelev = new upgradetelev();

        $upgradetelev->numero = $request->get('numero');        
        $upgradetelev->nombres = $request->get('nombres');
        $upgradetelev->documento = $request->get('documento');
        $upgradetelev->correo = $request->get('correo');        
        $upgradetelev->fventa = $request->get('fventa');
        $upgradetelev->corte = $request->get('corte');
        $upgradetelev->selector = $request->get('selector');
        $upgradetelev->planhistorico = $request->get('planhistorico');
        $upgradetelev->planventa = $request->get('planventa');
        $upgradetelev->segmento = $request->get('segmento');
        $upgradetelev->activacion = $request->get('activacion');
        $upgradetelev->ngrabacion = $request->get('ngrabacion');
        $upgradetelev->confronta = $request->get('confronta');
        $upgradetelev->orden = $request->get('orden');
        $upgradetelev->observacion = $request->get('observacion');
        $upgradetelev->agente = $request->get('agente');
        $upgradetelev->revisados = $request->get('revisados');
        $upgradetelev->estadorevisado = $request->get('estadorevisado');
        $upgradetelev->obs2 = $request->get('obs2');
        $upgradetelev->backoffice = $request->get('backoffice');
        $upgradetelev->hora = Carbon::now()->format('H:i:s');
        $upgradetelev->dia = $request->get('dia');
        if ($request->hasFile('confronta')) {
            $upgradetelev['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $upgradetelev['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $upgradetelev['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        $upgradetelev->save();

        return redirect('upgradetelev/create')->with('success', 'Datos guardados correctamente..');
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
        $upgradetelev =DB::table('upgradetelevs')
          ->select('id','numero', 'documento','nombres','segmento','revisados', 'estadorevisado', 'agente', 'hora', 'correo','planventa','fventa','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('upgradetelev.index',compact('upgradetelev'));
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
        $upgradetelev = upgradetelev::findOrFail($id);
        return view('upgradetelev.edit')->with('upgradetelev', $upgradetelev);
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
        $upgradetelev = upgradetelev::find($id); 

        $upgradetelev->numero = $request->get('numero');        
        $upgradetelev->nombres = $request->get('nombres');
        $upgradetelev->documento = $request->get('documento');
        $upgradetelev->correo = $request->get('correo');        
        $upgradetelev->fventa = $request->get('fventa');
        $upgradetelev->corte = $request->get('corte');
        $upgradetelev->selector = $request->get('selector');
        $upgradetelev->planhistorico = $request->get('planhistorico');
        $upgradetelev->planventa = $request->get('planventa');
        $upgradetelev->segmento = $request->get('segmento');
        $upgradetelev->activacion = $request->get('activacion');
        $upgradetelev->ngrabacion = $request->get('ngrabacion');
        $upgradetelev->orden = $request->get('orden');
        $upgradetelev->observacion = $request->get('observacion');
        $upgradetelev->agente = $request->get('agente');
        $upgradetelev->revisados = $request->get('revisados');
        $upgradetelev->estadorevisado = $request->get('estadorevisado');
        $upgradetelev->obs2 = $request->get('obs2');
        $upgradetelev->backoffice = $request->get('backoffice');
        $upgradetelev->hora = $request->get('hora');
        $upgradetelev->dia = $request->get('dia');

        if($request->hasFile('confronta')){
            $upgradetelev['confronta']=$request->file('confronta')->store('uploads','public');
          }
          if ($request->hasFile('likewize')) {
            $upgradetelev['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $upgradetelev['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

          
        $upgradetelev->save();

        return redirect('upgradetelev/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upgradetelev = upgradetelev::find($id);        
        $upgradetelev->delete();

        return redirect('upgradetelev/index')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchteleupgrade(Request $request)
    {

	$upgradetelev = upgradetelev::all();
        $searchteleupgrade = $request->get('searchteleupgrade');
        $upgradetelev = upgradetelev::firstOrNew()->where('Numero', 'like', '%'.$searchteleupgrade.'%')->paginate(20);

        
 
        return view('upgradetelev.index',compact('upgradetelev'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new UpgradeteleventaExport($fecha_ini, $fecha_fin), 'Upgrade_Televenta.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new UpgradeteleventaExport  ($fecha_ini, $fecha_fin), 'Upgrade_Televenta.xlsx');
   }
    }
}

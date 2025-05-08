<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\upgradetelev;

class UpgradeTeleventaPerdida extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $z ='PERDIDA'; 
        $y ='RECUPERAR';
        $upgradetelev =DB::table('upgradetelevs')
        ->select('id','numero', 'documento','nombres','segmento','revisados', 'estadorevisado', 'agente', 'hora', 'correo','planventa','fventa')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', $y)
          ->orderBy('dia', 'desc')
          ->paginate(20);

        return view('perdidaupgradeteleventas.index',compact('upgradetelev'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
    public function edit($id)
    {
        $upgradetelev = upgradetelev::findOrFail($id);
        return view('perdidaupgradeteleventas.edit')->with('upgradetelev', $upgradetelev);
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

        $upgradetelev->save();

        return redirect('perdidaupgradeteleventa')->with('success', 'Datos guardados correctamente..');
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

        return redirect('perdidaupgradeteleventa')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchteleperdidaupgrade(Request $request)
    {
	$z ='PERDIDA'; 
        $y ='RECUPERAR';
	$upgradetelev = upgradetelev::all();        
        $searchteleperdidaupgrade = $request->get('searchteleperdidaupgrade'); 

        $upgradetelev = upgradetelev::where((function ($query) use ($searchteleperdidaupgrade) {
            return $query->where('Numero', $searchteleperdidaupgrade);
        }))->where(function ($query) use ($z, $y) {
            return $query->where('revisados', $z)
                        ->orWhere('revisados', $y);
        })
        ->paginate(20);
 
        return view('perdidaupgradeteleventas.index',compact('upgradetelev'));
    }
}

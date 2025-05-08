<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\upgradeinbo;

class UpgradeInboundPerdida extends Controller
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
        $upgradeinbo =DB::table('upgradeinbos')
        ->select('id','numero', 'documento','nombres','segmento','correo','planventa','fventa', 'revisados', 'estadorevisado', 'agente', 'hora')
        ->Where('revisados', 'LIKE', '%'.$z. '%' )
        ->orWhere('revisados', $y)
        ->orderBy('dia', 'desc')
        ->paginate(20);

        return view('perdidaupgradeinbound.index',compact('upgradeinbo'));
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
        $upgradeinbo = upgradeinbo::findOrFail($id);
        return view('perdidaupgradeinbound.edit')->with('upgradeinbo', $upgradeinbo);
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

        $upgradeinbo->save();

        return redirect('perdidaupgradeinbound')->with('success', 'Datos guardados correctamente..');
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

        return redirect('perdidaupgradeinbound')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchinboundperdidaupgrade(Request $request)
    {
	$z ='PERDIDA'; 
        $y ='RECUPERAR';
	$upgradeinbo = upgradeinbo::all();
        $searchinboundperdidaupgrade = $request->get('searchinboundperdidaupgrade');

    $upgradeinbo = upgradeinbo::where((function ($query) use ($searchinboundperdidaupgrade) {
        return $query->where('Numero', $searchinboundperdidaupgrade);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);

        return view('perdidaupgradeinbound.index',compact('upgradeinbo'));
    }
}

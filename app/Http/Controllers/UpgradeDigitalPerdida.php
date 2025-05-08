<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\upgradedigi;

class UpgradeDigitalPerdida extends Controller
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
        $upgradedigi =DB::table('upgradedigis')
        ->select('id','numero', 'documento','nombres','segmento','revisados', 'estadorevisado', 'agente', 'hora', 'correo','planventa','fventa')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', $y)
          ->orderBy('dia', 'desc')
          ->paginate(20);

        return view('perdidaupgradedigital.index',compact('upgradedigi'));
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
        $upgradedigi = upgradedigi::findOrFail($id);
        return view('perdidaupgradedigital.edit')->with('upgradedigi', $upgradedigi);
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

        $upgradedigi->save();

        return redirect('perdidaupgradedigital')->with('success', 'Datos guardados correctamente..');
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

        return redirect('perdidaupgradedigital')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchdigitalperdidaupgrade(Request $request)
    {
	$z ='PERDIDA'; 
        $y ='RECUPERAR';
	$upgradedigi = upgradedigi::all();
        $searchdigitalperdidaupgrade = $request->get('searchdigitalperdidaupgrade');

    $upgradedigi = upgradedigi::where((function ($query) use ($searchdigitalperdidaupgrade) {
        return $query->where('Numero', $searchdigitalperdidaupgrade);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);
        return view('perdidaupgradedigital.index',compact('upgradedigi'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\portainbound;

class PortaInboundPerdida extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $z ='PERDIDA'; 
        $y ='RECHAZADA';
        $portainbound =DB::table('portainbounds')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora')
          ->Where('revisados', $z )
          ->orWhere('revisados', $y)
          ->orderBy('dia', 'desc')
          ->paginate(20);

        return view('perdidaportainbound.index',compact('portainbound'));
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
        $portainbound = portainbound::findOrFail($id);
        return view('perdidaportainbound.edit')->with('portainbound', $portainbound);
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

        $portainbound->save();

        return redirect('perdidaportainbound')->with('success', 'Datos guardados correctamente..');
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

        return redirect('perdidaportainbound/index')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchinboundperdida(Request $request)
    {
 	$z ='PERDIDA'; 
        $y ='RECUPERAR';
	$portainbound = portainbound::all();
        $searchinboundperdida = $request->get('searchinboundperdida');
        $portainbound= portainbound::where((function ($query) use ($searchinboundperdida) {
            return $query->where('Numero', $searchinboundperdida);
        }))->where(function ($query) use ($z, $y) {
            return $query->where('revisados', $z)
                        ->orWhere('revisados', $y);
        })
        ->paginate(20);

 
        return view('perdidaportainbound.index',compact('portainbound'));
    }
}

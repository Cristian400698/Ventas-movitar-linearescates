<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\portatelev;
use Illuminate\Support\Facades\DB;

class PortaTeleventasPerdida extends Controller
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
        $portatelev =DB::table('portatelevs')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', $y)
          ->orderBy('dia', 'desc')
          ->paginate(20);

        return view('perdidaportateleventas.index',compact('portatelev'));
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
        $portatelev = portatelev::findOrFail($id);
        return view('perdidaportateleventas.edit')->with('portatelev', $portatelev);
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
        $portatelev = portatelev::find($id); 

        $portatelev->numero = $request->get('numero');
        $portatelev->documento = $request->get('documento');
        $portatelev->nombres = $request->get('nombres');
        $portatelev->apellidos = $request->get('apellidos');
        $portatelev->correo = $request->get('correo');
        $portatelev->departamento = $request->get('departamento');
        $portatelev->id_ciudad = $request->get('id_ciudad');
        $portatelev->barrio = $request->get('barrio');
        $portatelev->direccion = $request->get('direccion');
        $portatelev->nip = $request->get('nip');
        $portatelev->tipocliente = $request->get('tipocliente');
        $portatelev->planadquiere = $request->get('planadquiere');
        $portatelev->segmento = $request->get('segmento');
        $portatelev->ncontacto = $request->get('ncontacto');
        $portatelev->imei = $request->get('imei');
        $portatelev->fvc = $request->get('fvc');
        $portatelev->fentrega = $request->get('fentrega');
        $portatelev->fexpedicion = $request->get('fexpedicion');
        $portatelev->fnacimiento = $request->get('fnacimiento');
        $portatelev->origen = $request->get('origen');
        $portatelev->ngrabacion = $request->get('ngrabacion');
        $portatelev->selector = $request->get('selector');
        $portatelev->orden = $request->get('orden');
        $portatelev->observaciones = $request->get('observaciones');
        $portatelev->agente = $request->get('agente');
        $portatelev->revisados = $request->get('revisados');
        $portatelev->estadorevisado = $request->get('estadorevisado');
        $portatelev->obs2 = $request->get('obs2');
        $portatelev->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $portatelev['confronta']=$request->file('confronta')->store('uploads','public');
          }

	if($request->hasFile('likewize')){
            $portatelev['likewize']=$request->file('likewize')->store('uploads','public');
          }
        $portatelev->save();

        return redirect('perdidaportateleventas')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $portatelev = portatelev::find($id);        
        $portatelev->delete();

        return redirect('perdidaportateleventas')->with('success', 'Datos Eliminado correctamente..');
    }

    public function searchteleventaperdida(Request $request)
    {
    	$z ='PERDIDA'; 
        $y ='RECHAZADA';
        $searchteleventaperdida = $request->get('searchteleventaperdida');

    $portatelev = portatelev::where((function ($query) use ($searchteleventaperdida) {
        return $query->where('Numero', $searchteleventaperdida);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);

        return view('perdidaportateleventas.index',compact('portatelev'));
    }
}

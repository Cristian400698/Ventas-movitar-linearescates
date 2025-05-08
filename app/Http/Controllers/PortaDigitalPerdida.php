<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\portadigital;

class PortaDigitalPerdida extends Controller
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
        $portadigital =DB::table('portadigitals')
        ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora')
        ->Where('revisados', 'LIKE', '%'.$z. '%' )
        ->orWhere('revisados', $y)
        ->orderBy('dia', 'desc')
        ->paginate(20);

        return view('perdidaportadigital.index',compact('portadigital'));
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
        $portadigital = portadigital::findOrFail($id);
        return view('perdidaportadigital.edit')->with('portadigital', $portadigital);
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
        $portadigital = portadigital::find($id); 

        $portadigital->numero = $request->get('numero');
        $portadigital->documento = $request->get('documento');
        $portadigital->nombres = $request->get('nombres');
        $portadigital->apellidos = $request->get('apellidos');
        $portadigital->correo = $request->get('correo');
        $portadigital->departamento = $request->get('departamento');
        $portadigital->id_ciudad = $request->get('id_ciudad');
        $portadigital->barrio = $request->get('barrio');
        $portadigital->direccion = $request->get('direccion');
        $portadigital->nip = $request->get('nip');
        $portadigital->tipocliente = $request->get('tipocliente');
        $portadigital->planadquiere = $request->get('planadquiere');
        $portadigital->segmento = $request->get('segmento');
        $portadigital->ncontacto = $request->get('ncontacto');
        $portadigital->imei = $request->get('imei');
        $portadigital->fvc = $request->get('fvc');
        $portadigital->fentrega = $request->get('fentrega');
        $portadigital->fexpedicion = $request->get('fexpedicion');
        $portadigital->fnacimiento = $request->get('fnacimiento');
        $portadigital->origen = $request->get('origen');
        $portadigital->ngrabacion = $request->get('ngrabacion');
        $portadigital->selector = $request->get('selector');
        $portadigital->orden = $request->get('orden');
        $portadigital->observaciones = $request->get('observaciones');
        $portadigital->agente = $request->get('agente');
        $portadigital->revisados = $request->get('revisados');
        $portadigital->estadorevisado = $request->get('estadorevisado');
        $portadigital->obs2 = $request->get('obs2');
        $portadigital->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $portadigital['confronta']=$request->file('confronta')->store('uploads','public');
          }

        $portadigital->save();

        return redirect('perdidaportadigital')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portadigital = portadigital::find($id);        
        $portadigital->delete();
        return redirect('perdidaportadigital/index')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchdigitalperdida(Request $request)
    {
	    $z ='PERDIDA'; 
        $y ='RECUPERAR';
         $searchdigitalperdida = $request->get('searchdigitalperdida');

        $portadigital = portadigital::where((function ($query) use ($searchdigitalperdida) {
            return $query->where('Numero', $searchdigitalperdida);
        }))->where(function ($query) use ($z, $y) {
            return $query->where('revisados', $z)
                        ->orWhere('revisados', $y);
        })
        ->paginate(20);
       
        return view('perdidaportadigital.index',compact('portadigital'));
    }
}

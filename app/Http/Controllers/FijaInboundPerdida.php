<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\fijainbound;

class FijaInboundPerdida extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $z ='RECUPERAR'; 
        $fijainbound = fijainbound::all();
        $fijainbound = fijainbound::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->paginate(20);
        return view('perdidafijainbound.index',  compact('fijainbound'));
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
        $fijas=fijainbound::findOrFail($id);
        return view('perdidafijainbound.edit',compact('fijas'));
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
        $fijainbound = fijainbound::find($id);

        $fijainbound->nombres = $request->get('nombres');
        $fijainbound->documento = $request->get('documento');
        $fijainbound->fexpedicion = $request->get('fexpedicion');
        $fijainbound->correo = $request->get('correo');
        $fijainbound->departamento = $request->get('departamento');
        $fijainbound->id_ciudad = $request->get('id_ciudad');
        $fijainbound->barrio = $request->get('barrio');
        $fijainbound->direccion = $request->get('direccion');
        $fijainbound->estrato = $request->get('estrato');
        $fijainbound->ngrabacion = $request->get('ngrabacion');
        $fijainbound->ncontacto = $request->get('ncontacto');
        $fijainbound->producto = $request->get('producto');
        $fijainbound->segmento = $request->get('segmento');
        $fijainbound->FOX = $request->get('FOX');
        $fijainbound->HBO = $request->get('HBO');
        $fijainbound->cds_movil = $request->get('cds_movil');
        $fijainbound->cds_fija = $request->get('cds_fija');
        $fijainbound->Paquete_Adultos = $request->get('Paquete_Adultos');
        $fijainbound->Decodificador = $request->get('Decodificador');
        $fijainbound->Svas_lineas = $request->get('Svas_lineas');
        $fijainbound->velocidad = $request->get('velocidad');
        $fijainbound->tecnologia = $request->get('tecnologia');
        $fijainbound->orden = $request->get('orden');
        $fijainbound->selector = $request->get('selector');
        $fijainbound->observacion = $request->get('observacion');
        $fijainbound->revisados = $request->get('revisados');
        $fijainbound->estadorevisado = $request->get('estadorevisado');
        $fijainbound->obs2 = $request->get('obs2');
        $fijainbound->backoffice = $request->get('backoffice');

        $fijainbound->save();

        return redirect('perdidafijainbound')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fijainbound = fijainbound::find($id);        
        $fijainbound->delete();

        return redirect('perdidafijainbound')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchinboundperdidafija(Request $request)
    {
        $z ='PERDIDA'; 
        $y ='RECUPERAR';
        $searchinboundperdidafija = $request->get('searchinboundperdidafija');

    $fijainbound = fijainbound::where((function ($query) use ($searchinboundperdidafija) {
        return $query->where('ncontacto', $searchinboundperdidafija);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);

    

        return view('perdidafijainbound.index',compact('fijainbound'));
    }
}

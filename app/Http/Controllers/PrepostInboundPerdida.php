<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\prepostinbound;

class PrepostInboundPerdida extends Controller
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
        $prepostinbound = prepostinbound::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('perdidaprepostinbound.index',  compact('prepostinbound'));
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
        $prepost=prepostinbound::findOrFail($id);
        return view('perdidaprepostinbound.edit',compact('prepost'));
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
        $prepostinbound = prepostinbound::find($id);

        $prepostinbound->numero = $request->get('numero');
        $prepostinbound->nombres = $request->get('nombres');
        $prepostinbound->documento = $request->get('documento');
        $prepostinbound->fexpedicion = $request->get('fexpedicion');
        $prepostinbound->tipocliente = $request->get('tipocliente');
        $prepostinbound->correo = $request->get('correo');
        $prepostinbound->departamento = $request->get('departamento');
        $prepostinbound->id_ciudad = $request->get('id_ciudad');
        $prepostinbound->barrio = $request->get('barrio'); 
        $prepostinbound->direccion = $request->get('direccion'); 
        $prepostinbound->corte = $request->get('corte');
        $prepostinbound->planventa = $request->get('planventa');
        $prepostinbound->segmento = $request->get('segmento');
        $prepostinbound->activacion = $request->get('activacion');
        $prepostinbound->token = $request->get('token');
        $prepostinbound->selector = $request->get('selector'); 
        $prepostinbound->orden = $request->get('orden');
        $prepostinbound->observaciones = $request->get('observaciones');
        $prepostinbound->revisados = $request->get('revisados');
        $prepostinbound->estadorevisado = $request->get('estadorevisado');
        $prepostinbound->obs2 = $request->get('obs2');
        $prepostinbound->backoffice = $request->get('backoffice');
        $prepostinbound->NumGrabacion = $request->get('numero_grabacion');

        $prepostinbound->save();
        
        return redirect('perdidaprepostinbound')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prepostinbound = prepostinbound::find($id);        
        $prepostinbound->delete();

        return redirect('perdidaprepostinbound')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchinboundperdidaprepost(Request $request)
    {
   	$z ='PERDIDA'; 
        $y ='RECUPERAR';
	$prepostinbound = prepostinbound::all();
        $searchinboundperdidaprepost = $request->get('searchinboundperdidaprepost');

    $prepostinbound = prepostinbound::where((function ($query) use ($searchinboundperdidaprepost) {
        return $query->where('Numero', $searchinboundperdidaprepost);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);

 
        return view('perdidaprepostinbound.index',compact('prepostinbound'));
    }
}

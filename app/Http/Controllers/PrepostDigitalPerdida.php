<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\prepostdigital;

class PrepostDigitalPerdida extends Controller
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
        $prepostdigital = prepostdigital::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('perdidaprepostdigital.index',  compact('prepostdigital'));

        return view('.index');
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
        $prepost=prepostdigital::findOrFail($id);
        return view('perdidaprepostdigital.edit',compact('prepost'));
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
        $prepostdigital = prepostdigital::find($id);

        $prepostdigital->numero = $request->get('numero');
        $prepostdigital->nombres = $request->get('nombres');
        $prepostdigital->documento = $request->get('documento');
        $prepostdigital->fexpedicion = $request->get('fexpedicion');
        $prepostdigital->tipocliente = $request->get('tipocliente');
        $prepostdigital->correo = $request->get('correo');
        $prepostdigital->departamento = $request->get('departamento');
        $prepostdigital->id_ciudad = $request->get('id_ciudad');
        $prepostdigital->barrio = $request->get('barrio');
        $prepostdigital->direccion = $request->get('direccion');
        $prepostdigital->corte = $request->get('corte');
        $prepostdigital->planventa = $request->get('planventa');
        $prepostdigital->segmento = $request->get('segmento');
        $prepostdigital->activacion = $request->get('activacion');
        $prepostdigital->token = $request->get('token');
        $prepostdigital->selector = $request->get('selector');
        $prepostdigital->orden = $request->get('orden');
        $prepostdigital->observaciones = $request->get('observaciones');
        $prepostdigital->revisados = $request->get('revisados');
        $prepostdigital->estadorevisado = $request->get('estadorevisado');
        $prepostdigital->obs2 = $request->get('obs2');
        $prepostdigital->backoffice = $request->get('backoffice');
        $prepostdigital->NumGrabacion = $request->get('numero_grabacion');

        $prepostdigital->save();

        return redirect('perdidaprepostdigital')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prepostdigital = prepostdigital::find($id);        
        $prepostdigital->delete();

        return redirect('perdidaprepostdigital')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchdigiperdidaprepost(Request $request)
    {
   	$z ='PERDIDA'; 
        $y ='RECUPERAR';
	$prepostdigital = prepostdigital::all();
        $searchdigiperdidaprepost = $request->get('searchdigiperdidaprepost');

    $prepostdigital = prepostdigital::where((function ($query) use ($searchdigiperdidaprepost) {
        return $query->where('Numero', $searchdigiperdidaprepost);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);
 
        return view('perdidaprepostdigital.index',compact('prepostdigital'));
    }
}

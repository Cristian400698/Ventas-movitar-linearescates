<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\preposteleventa;

class PrepostTeleventaPerdida extends Controller
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
        $preposteleventa = preposteleventa::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('perdidaprepostteleventas.index',  compact('preposteleventa'));
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
        $prepost=preposteleventa::findOrFail($id);
        return view('perdidaprepostteleventas.edit',compact('prepost'));
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
        $preposteleventa = preposteleventa::find($id);

        $preposteleventa->numero = $request->get('numero');
        $preposteleventa->nombres = $request->get('nombres');
        $preposteleventa->documento = $request->get('documento');
        $preposteleventa->fexpedicion = $request->get('fexpedicion');
        $preposteleventa->tipocliente = $request->get('tipocliente');
        $preposteleventa->correo = $request->get('correo');
        $preposteleventa->departamento = $request->get('departamento');
        $preposteleventa->id_ciudad = $request->get('id_ciudad');
        $preposteleventa->barrio = $request->get('barrio');
        $preposteleventa->direccion = $request->get('direccion');
        $preposteleventa->corte = $request->get('corte');
        $preposteleventa->planventa = $request->get('planventa');
        $preposteleventa->segmento = $request->get('segmento');
        $preposteleventa->activacion = $request->get('activacion');
        $preposteleventa->token = $request->get('token');
        $preposteleventa->selector = $request->get('selector');
        $preposteleventa->orden = $request->get('orden');
        $preposteleventa->observaciones = $request->get('observaciones');
        $preposteleventa->revisados = $request->get('revisados');
        $preposteleventa->estadorevisado = $request->get('estadorevisado');
        $preposteleventa->obs2 = $request->get('obs2');
        $preposteleventa->backoffice = $request->get('backoffice');
        $preposteleventa->NumGrabacion = $request->get('numero_grabacion');

        $preposteleventa->save();

        return redirect('perdidaprepostteleventa')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $preposteleventa = preposteleventa::find($id);        
        $preposteleventa->delete();

        return redirect('perdidaprepostteleventa')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchteleperdidaprepost(Request $request)
    {
        $z ='PERDIDA'; 
        $y ='RECUPERAR';
        $texto = $request->get('searchteleperdidaprepost'); 

        $preposteleventa = preposteleventa::where((function ($query) use ($texto) {
            return $query->where('Numero', $texto);
        }))->where(function ($query) use ($z, $y) {
            return $query->where('revisados', $z)
                        ->orWhere('revisados', $y);
        })
        ->paginate(20);
 
        return view('perdidaprepostteleventas.index',compact('preposteleventa'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\fijateleventa;

class FijaTeleventaPerdida extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $z ='RECUPERAR'; 
        $fijateleventa = fijateleventa::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->paginate(20);
        return view('perdidafijateleventas.index',  compact('fijateleventa'));
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
        $fijas=fijateleventa::findOrFail($id);
        return view('perdidafijateleventas.edit',compact('fijas'));
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
        $fijateleventa = fijateleventa::find($id);

        $fijateleventa->nombres = $request->get('nombres');
        $fijateleventa->documento = $request->get('documento');
        $fijateleventa->fexpedicion = $request->get('fexpedicion');
        $fijateleventa->correo = $request->get('correo');
        $fijateleventa->departamento = $request->get('departamento');
        $fijateleventa->id_ciudad = $request->get('id_ciudad');
        $fijateleventa->barrio = $request->get('barrio');
        $fijateleventa->direccion = $request->get('direccion');
        $fijateleventa->estrato = $request->get('estrato');
        $fijateleventa->ngrabacion = $request->get('ngrabacion');
        $fijateleventa->ncontacto = $request->get('ncontacto');
        $fijateleventa->producto = $request->get('producto');
        $fijateleventa->segmento = $request->get('segmento');
        $fijateleventa->FOX = $request->get('FOX');
        $fijateleventa->HBO = $request->get('HBO');
        $fijateleventa->cds_movil = $request->get('cds_movil');
        $fijateleventa->cds_fija = $request->get('cds_fija');
        $fijateleventa->Paquete_Adultos = $request->get('Paquete_Adultos');
        $fijateleventa->Decodificador = $request->get('Decodificador');
        $fijateleventa->Svas_lineas = $request->get('Svas_lineas');
        $fijateleventa->velocidad = $request->get('velocidad');
        $fijateleventa->tecnologia = $request->get('tecnologia');
        $fijateleventa->orden = $request->get('orden');
        $fijateleventa->selector = $request->get('selector');
        $fijateleventa->observacion = $request->get('observacion');
        $fijateleventa->revisados = $request->get('revisados');
        $fijateleventa->estadorevisado = $request->get('estadorevisado');
        $fijateleventa->obs2 = $request->get('obs2');
        $fijateleventa->backoffice = $request->get('backoffice');

        $fijateleventa->save();

        return redirect('perdidafijateleventa')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fijateleventa = fijateleventa::find($id);        
        $fijateleventa->delete();

        return redirect('perdidafijateleventa')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchteleperdidafija(Request $request)
    {
        $z ='PERDIDA'; 
        $y ='RECUPERAR';
        $searchteleperdidafija = $request->get('searchteleperdidafija');

     $fijateleventa = fijateleventa::where((function ($query) use ($searchteleperdidafija) {
            return $query->where('ncontacto', $searchteleperdidafija);
        }))->where(function ($query) use ($z, $y) {
            return $query->where('revisados', $z)
                        ->orWhere('revisados', $y);
        })
        ->paginate(20);

        return view('perdidafijateleventas.index',compact('fijateleventa'));
    }
}

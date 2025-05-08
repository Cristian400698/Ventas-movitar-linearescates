<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\fijadigital;

class FijaDigitalPerdida extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $z ='RECUPERAR'; 
        $fijadigital = fijadigital::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->paginate(20);
        return view('perdidafijadigital.index',  compact('fijadigital'));
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
        $fijas=fijadigital::findOrFail($id);
        return view('perdidafijadigital.edit',compact('fijas'));
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
        $fijadigital = fijadigital::find($id);

        $fijadigital->nombres = $request->get('nombres');
        $fijadigital->documento = $request->get('documento');
        $fijadigital->fexpedicion = $request->get('fexpedicion');
        $fijadigital->correo = $request->get('correo');
        $fijadigital->departamento = $request->get('departamento');
        $fijadigital->id_ciudad = $request->get('id_ciudad');
        $fijadigital->barrio = $request->get('barrio');
        $fijadigital->direccion = $request->get('direccion');
        $fijadigital->estrato = $request->get('estrato');
        $fijadigital->ngrabacion = $request->get('ngrabacion');
        $fijadigital->ncontacto = $request->get('ncontacto');
        $fijadigital->producto = $request->get('producto');
        $fijadigital->segmento = $request->get('segmento');
        $fijadigital->FOX = $request->get('FOX');
        $fijadigital->HBO = $request->get('HBO');
        $fijadigital->cds_movil = $request->get('cds_movil');
        $fijadigital->cds_fija = $request->get('cds_fija');
        $fijadigital->Paquete_Adultos = $request->get('Paquete_Adultos');
        $fijadigital->Decodificador = $request->get('Decodificador');
        $fijadigital->Svas_lineas = $request->get('Svas_lineas');
        $fijadigital->velocidad = $request->get('velocidad');
        $fijadigital->tecnologia = $request->get('tecnologia');
        $fijadigital->orden = $request->get('orden');
        $fijadigital->selector = $request->get('selector');
        $fijadigital->observacion = $request->get('observacion');
        $fijadigital->revisados = $request->get('revisados');
        $fijadigital->estadorevisado = $request->get('estadorevisado');
        $fijadigital->obs2 = $request->get('obs2');
        $fijadigital->backoffice = $request->get('backoffice');


        $fijadigital->save();

        return redirect('perdidafijadigital')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fijadigital = fijadigital::find($id);        
        $fijadigital->delete();

        return redirect('perdidafijadigital')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchdigiperdidafija(Request $request)
    {
        $z ='PERDIDA'; 
        $y ='RECUPERAR';
        $searchdigiperdidafija = $request->get('searchdigiperdidafija');

    $fijadigital = fijadigital::where((function ($query) use ($searchdigiperdidafija) {
        return $query->where('ncontacto', $searchdigiperdidafija);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);
        return view('perdidafijadigital.index',compact('fijadigital'));
    }
}

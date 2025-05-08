<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\phoenixe;

class PhoenixPerdida extends Controller
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
        $phoenixes = phoenixe::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE',$z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('phoenixperdida.index',  compact('phoenixes'));
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
        $phoenixes=phoenixe::findOrFail($id);
        return view('phoenixperdida.edit',compact('phoenixes'));
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
        $phoenixe = phoenixe::find($id);

        $phoenixe->numero = $request->get('numero');
        $phoenixe->documento = $request->get('documento');
        $phoenixe->nombres = $request->get('nombres');
        $phoenixe->apellidos = $request->get('apellidos');
        $phoenixe->correo = $request->get('correo');
        $phoenixe->departamento = $request->get('departamento');
        $phoenixe->id_ciudad = $request->get('id_ciudad');
        $phoenixe->barrio = $request->get('barrio');
        $phoenixe->direccion = $request->get('direccion');
        $phoenixe->nip = $request->get('nip');
        $phoenixe->tipocliente = $request->get('tipocliente');
        $phoenixe->ncontacto = $request->get('ncontacto');
        $phoenixe->planadquiere = $request->get('planadquiere');
        $phoenixe->tipoPagos = $request->get('tipoPagos');
        $phoenixe->modelo = $request->get('modelo');
        $phoenixe->ngrabacion = $request->get('ngrabacion');
        $phoenixe->orden = $request->get('orden');
        $phoenixe->observaciones = $request->get('observaciones');
        $phoenixe->selector = $request->get('selector');
        $phoenixe->revisados = $request->get('revisados');
        $phoenixe->estadorevisado = $request->get('estadorevisado');
        $phoenixe->obs2 = $request->get('obs2');
        $phoenixe->backoffice = $request->get('backoffice');


        $phoenixe->save();

        return redirect('phoenixperdida')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phoenixes = phoenixe::find($id);        
        $phoenixes->delete();
        return redirect('phoenixperdida')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchphoenixperdida(Request $request)
    {
	$z ='PERDIDA'; 
        $y ='RECUPERAR';
        $searchphoenixperdida = $request->get('searchphoenixperdida');

    $phoenixes = phoenixe::where((function ($query) use ($searchphoenixperdida) {
        return $query->where('Numero', $searchphoenixperdida);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);

      
        return view('phoenixperdida.index',compact('phoenixes'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\linea_nueva;

class LineaNuevaPerdida extends Controller
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
        $lineanueva = linea_nueva::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);

        return view('perdidalineanueva.index',  compact('lineanueva'));

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
        $lineanuevas = linea_nueva::findOrFail($id);
        return view('perdidalineanueva.edit')->with('lineanuevas', $lineanuevas);
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
        $lineanueva = linea_nueva::find($id);

        $lineanueva->numero = $request->get('numero');
        $lineanueva->documento = $request->get('documento');
        $lineanueva->nombres = $request->get('nombres');
        $lineanueva->apellidos = $request->get('apellidos');
        $lineanueva->correo = $request->get('correo');
        $lineanueva->departamento = $request->get('departamento');
        $lineanueva->id_ciudad = $request->get('id_ciudad');
        $lineanueva->barrio = $request->get('barrio');
        $lineanueva->direccion = $request->get('direccion');
        $lineanueva->tipocliente = $request->get('tipocliente');
        $lineanueva->ncontacto = $request->get('ncontacto');
        $lineanueva->selector = $request->get('selector');
        $lineanueva->ngrabacion = $request->get('ngrabacion');
        $lineanueva->orden = $request->get('orden');
        $lineanueva->observaciones = $request->get('observaciones');
        $lineanueva->revisados = $request->get('revisados');
        $lineanueva->estadorevisado = $request->get('estadorevisado');
        $lineanueva->obs2 = $request->get('obs2');
        $lineanueva->backoffice = $request->get('backoffice');

        $lineanueva->save();

        return redirect('lineanuevaperdida')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lineanuevas = linea_nueva::find($id);        
        $lineanuevas->delete();
        return redirect('lineanuevaperdida')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchlineanuevaperdida(Request $request)
    {
	$z ='PERDIDA'; 
        $y ='RECUPERAR';
        $texto = $request->get('searchlineanuevaperdida'); 

        $lineanueva = linea_nueva::where((function ($query) use ($texto) {
            return $query->where('Numero', $texto);
        }))->where(function ($query) use ($z, $y) {
            return $query->where('revisados', $z)
                        ->orWhere('revisados', $y);
        })
        ->paginate(20);

        return view('perdidalineanueva.index',compact('lineanueva'));
    }
}

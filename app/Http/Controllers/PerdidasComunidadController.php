<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comunidad;
use Illuminate\Support\Facades\DB;

class PerdidasComunidadController extends Controller
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
        $comunidad =DB::table('Comunidads')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', $y)
          ->orderBy('dia', 'desc')
          ->paginate(20);

        return view('perdidacomunidad.index',compact('comunidad'));
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
        $comunidad = Comunidad::findOrFail($id);
        return view('perdidacomunidad.edit')->with('comunidad', $comunidad);
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
        $comunidad = Comunidad::find($id); 

        $comunidad->numero = $request->get('numero');
        $comunidad->documento = $request->get('documento');
        $comunidad->nombres = $request->get('nombres');
        $comunidad->apellidos = $request->get('apellidos');
        $comunidad->correo = $request->get('correo');
        $comunidad->departamento = $request->get('departamento');
        $comunidad->id_ciudad = $request->get('id_ciudad');
        $comunidad->barrio = $request->get('barrio');
        $comunidad->direccion = $request->get('direccion');
        $comunidad->nip = $request->get('nip');
        $comunidad->tipocliente = $request->get('tipocliente');
        $comunidad->planadquiere = $request->get('planadquiere');
        $comunidad->segmento = $request->get('segmento');
        $comunidad->ncontacto = $request->get('ncontacto');
        $comunidad->imei = $request->get('imei');
        $comunidad->fvc = $request->get('fvc');
        $comunidad->fentrega = $request->get('fentrega');
        $comunidad->fexpedicion = $request->get('fexpedicion');
        $comunidad->fnacimiento = $request->get('fnacimiento');
        $comunidad->origen = $request->get('origen');
        $comunidad->ngrabacion = $request->get('ngrabacion');
        $comunidad->selector = $request->get('selector');
        $comunidad->orden = $request->get('orden');
        $comunidad->observaciones = $request->get('observaciones');
        $comunidad->agente = $request->get('agente');
        $comunidad->revisados = $request->get('revisados');
        $comunidad->estadorevisado = $request->get('estadorevisado');
        $comunidad->obs2 = $request->get('obs2');
        $comunidad->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $comunidad['confronta']=$request->file('confronta')->store('uploads','public');
          }

        $comunidad->save();

        return redirect('perdidacomunidad')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

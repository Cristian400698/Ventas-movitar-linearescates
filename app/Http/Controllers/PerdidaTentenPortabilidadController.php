<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tentenportabilidad;
use Illuminate\Support\Facades\DB;

class PerdidaTentenPortabilidadController extends Controller
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
        $PerdidaTentenPortabilidad =DB::table('tentenportabilidads')
        ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora')
        ->Where('revisados', 'LIKE', '%'.$z. '%' )
        ->orWhere('revisados', $y)
        ->orderBy('dia', 'desc')
        ->paginate(20);

        return view('PerdidaTentenPortabilidad.index',compact('PerdidaTentenPortabilidad'));
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
        $tentenportabilidad = tentenportabilidad::findOrFail($id);
        return view('PerdidaTentenPortabilidad.edit')->with('tentenportabilidad', $tentenportabilidad);
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
        $tentenportabilidad = tentenportabilidad::find($id); 

        $tentenportabilidad->numero = $request->get('numero');
        $tentenportabilidad->documento = $request->get('documento');
        $tentenportabilidad->nombres = $request->get('nombres');
        $tentenportabilidad->apellidos = $request->get('apellidos');
        $tentenportabilidad->correo = $request->get('correo');
        $tentenportabilidad->departamento = $request->get('departamento');
        $tentenportabilidad->id_ciudad = $request->get('id_ciudad');
        $tentenportabilidad->barrio = $request->get('barrio');
        $tentenportabilidad->direccion = $request->get('direccion');
        $tentenportabilidad->nip = $request->get('nip');
        $tentenportabilidad->tipocliente = $request->get('tipocliente');
        $tentenportabilidad->planadquiere = $request->get('planadquiere');
        $tentenportabilidad->ncontacto = $request->get('ncontacto');
        $tentenportabilidad->imei = $request->get('imei');
        $tentenportabilidad->fvc = $request->get('fvc');
        $tentenportabilidad->fentrega = $request->get('fentrega');
        $tentenportabilidad->fexpedicion = $request->get('fexpedicion');
        $tentenportabilidad->fnacimiento = $request->get('fnacimiento');
        $tentenportabilidad->origen = $request->get('origen');
        $tentenportabilidad->ngrabacion = $request->get('ngrabacion');
        $tentenportabilidad->selector = $request->get('selector');
        $tentenportabilidad->orden = $request->get('orden');
        $tentenportabilidad->observaciones = $request->get('observaciones');
        $tentenportabilidad->agente = $request->get('agente');
        $tentenportabilidad->revisados = $request->get('revisados');
        $tentenportabilidad->estadorevisado = $request->get('estadorevisado');
        $tentenportabilidad->obs2 = $request->get('obs2');
        $tentenportabilidad->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $tentenportabilidad['confronta']=$request->file('confronta')->store('uploads','public');
          }

        $tentenportabilidad->save();

        return redirect('PerdidaTentenPortabilidad')->with('success', 'Datos guardados correctamente..');
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

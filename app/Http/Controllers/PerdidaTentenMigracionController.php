<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tentenmigracion;
use Illuminate\Support\Facades\DB;

class PerdidaTentenMigracionController extends Controller
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
        $PerdidaTentenMigracion =DB::table('tentenmigracions')
        ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora')
        ->Where('revisados', 'LIKE', '%'.$z. '%' )
        ->orWhere('revisados', $y)
        ->orderBy('dia', 'desc')
        ->paginate(20);

        return view('PerdidaTentenMigracion.index',compact('PerdidaTentenMigracion'));
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
        $tentenmigracion = tentenmigracion::findOrFail($id);
        return view('PerdidaTentenMigracion.edit')->with('tentenmigracion', $tentenmigracion);
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
        $tentenmigracion = tentenmigracion::find($id); 

        $tentenmigracion->numero = $request->get('numero');
        $tentenmigracion->documento = $request->get('documento');
        $tentenmigracion->nombres = $request->get('nombres');
        $tentenmigracion->apellidos = $request->get('apellidos');
        $tentenmigracion->correo = $request->get('correo');
        $tentenmigracion->departamento = $request->get('departamento');
        $tentenmigracion->id_ciudad = $request->get('id_ciudad');
        $tentenmigracion->barrio = $request->get('barrio');
        $tentenmigracion->direccion = $request->get('direccion');
        $tentenmigracion->nip = $request->get('nip');
        $tentenmigracion->tipocliente = $request->get('tipocliente');
        $tentenmigracion->planadquiere = $request->get('planadquiere');
        $tentenmigracion->ncontacto = $request->get('ncontacto');
        $tentenmigracion->imei = $request->get('imei');
        $tentenmigracion->fvc = $request->get('fvc');
        $tentenmigracion->fentrega = $request->get('fentrega');
        $tentenmigracion->fexpedicion = $request->get('fexpedicion');
        $tentenmigracion->fnacimiento = $request->get('fnacimiento');
        $tentenmigracion->origen = $request->get('origen');
        $tentenmigracion->ngrabacion = $request->get('ngrabacion');
        $tentenmigracion->selector = $request->get('selector');
        $tentenmigracion->orden = $request->get('orden');
        $tentenmigracion->observaciones = $request->get('observaciones');
        $tentenmigracion->agente = $request->get('agente');
        $tentenmigracion->revisados = $request->get('revisados');
        $tentenmigracion->estadorevisado = $request->get('estadorevisado');
        $tentenmigracion->obs2 = $request->get('obs2');
        $tentenmigracion->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $tentenmigracion['confronta']=$request->file('confronta')->store('uploads','public');
          }

        $tentenmigracion->save();

        return redirect('PerdidaTentenMigracion')->with('success', 'Datos guardados correctamente..');
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

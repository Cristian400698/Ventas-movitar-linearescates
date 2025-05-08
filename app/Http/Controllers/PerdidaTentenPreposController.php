<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tentenprepo;
use Illuminate\Support\Facades\DB;


class PerdidaTentenPreposController extends Controller
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
        $tentenprepo =DB::table('tentenprepos')
        ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora')
        ->Where('revisados', 'LIKE', '%'.$z. '%' )
        ->orWhere('revisados', $y)
        ->orderBy('dia', 'desc')
        ->paginate(20);

        return view('PerdidaTentenPrepos.index',compact('tentenprepo'));
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
        $tentenprepo = tentenprepo::findOrFail($id);
        return view('PerdidaTentenPrepos.edit')->with('tentenprepo', $tentenprepo);
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
        $tentenprepo = tentenprepo::find($id); 

        $tentenprepo->numero = $request->get('numero');
        $tentenprepo->documento = $request->get('documento');
        $tentenprepo->nombres = $request->get('nombres');
        $tentenprepo->apellidos = $request->get('apellidos');
        $tentenprepo->correo = $request->get('correo');
        $tentenprepo->departamento = $request->get('departamento');
        $tentenprepo->id_ciudad = $request->get('id_ciudad');
        $tentenprepo->barrio = $request->get('barrio');
        $tentenprepo->direccion = $request->get('direccion');
        $tentenprepo->nip = $request->get('nip');
        $tentenprepo->tipocliente = $request->get('tipocliente');
        $tentenprepo->planadquiere = $request->get('planadquiere');
        $tentenprepo->ncontacto = $request->get('ncontacto');
        $tentenprepo->imei = $request->get('imei');
        $tentenprepo->fvc = $request->get('fvc');
        $tentenprepo->fentrega = $request->get('fentrega');
        $tentenprepo->fexpedicion = $request->get('fexpedicion');
        $tentenprepo->fnacimiento = $request->get('fnacimiento');
        $tentenprepo->origen = $request->get('origen');
        $tentenprepo->ngrabacion = $request->get('ngrabacion');
        $tentenprepo->selector = $request->get('selector');
        $tentenprepo->orden = $request->get('orden');
        $tentenprepo->observaciones = $request->get('observaciones');
        $tentenprepo->agente = $request->get('agente');
        $tentenprepo->revisados = $request->get('revisados');
        $tentenprepo->estadorevisado = $request->get('estadorevisado');
        $tentenprepo->obs2 = $request->get('obs2');
        $tentenprepo->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $tentenprepo['confronta']=$request->file('confronta')->store('uploads','public');
          }

        $tentenprepo->save();

        return redirect('PerdidaTentenPrepos')->with('success', 'Datos guardados correctamente..');
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

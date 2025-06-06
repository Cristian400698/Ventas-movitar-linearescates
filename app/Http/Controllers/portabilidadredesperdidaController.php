<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\portabilidadrede;
use Illuminate\Support\Facades\DB;

class portabilidadredesperdidaController extends Controller
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
        $portabilidadredesperdidas =DB::table('portabilidadredes')
        ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora')
        ->Where('revisados', 'LIKE', '%'.$z. '%' )
        ->orWhere('revisados', $y)
        ->orderBy('dia', 'desc')
        ->paginate(20);

        return view('portabilidadredesperdidas.index',compact('portabilidadredesperdidas'));
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
        //
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
        //
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

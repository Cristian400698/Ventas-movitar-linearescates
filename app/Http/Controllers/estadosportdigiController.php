<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\portadigital;

class estadosportdigiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agente = Auth::user()->cedula;

        $portadigitals =DB::table('portadigitals')
          ->select('id','documento', 'nombres','apellidos','tipocliente','revisados','agente','estadorevisado','dia')
          ->where('agente', '=', Auth::user()->cedula)
          ->Where('agente', 'LIKE', '%'.$agente. '%' )
          ->orderBy('dia', 'desc')->paginate(20) ;
        return view('estadosportdigi.index', compact('portadigitals','agente'));
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
    public function searchmisventasportadigital(Request $request)
    {
	$portadigitals = portadigital::all();
        $searchtext = $request->get('text');
        $portadigitals= portadigital::firstOrNew()
	    ->where('documento', 'like', '%'.$searchtext.'%')
        ->where('agente','=', Auth::user()->cedula)
	    ->paginate(20);

        
 
        return view('estadosportdigi.index',compact('portadigitals'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\prepostdigital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EstadoPrepostDigital extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agente = Auth::user()->cedula;

        $prepostdigitals =DB::table('prepostdigitals')
        ->select('id','documento', 'nombres','revisados','agente','estadorevisado','dia')
        ->where('agente', '=', $agente)
        ->orderBy('dia', 'desc')
        ->paginate(20) ;
      return view('estadosprepostdigital.index', compact('prepostdigitals','agente'));
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
    public function searchmisventasprepostdigi(Request $request)
    {
	    $prepostdigitals = prepostdigital::all();
        $searchtext = $request->get('text');
        $prepostdigitals= prepostdigital::firstOrNew()
	    ->where('documento', 'like', '%'.$searchtext.'%')
        ->where('agente','=', Auth::user()->cedula)
	    ->paginate(20);

        
        return view('estadosprepostdigital.index',compact('prepostdigitals'));
    }
}

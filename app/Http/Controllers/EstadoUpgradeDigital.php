<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\upgradedigi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EstadoUpgradeDigital extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agente = Auth::user()->cedula;

        $upgradedigitals =DB::table('upgradedigis')
        ->select('id','documento', 'nombres','revisados','agente','estadorevisado','dia')
        ->where('agente', '=', $agente)
        ->orderBy('dia', 'desc')
        ->paginate(20) ;
      return view('estadosupgradedigital.index', compact('upgradedigitals','agente'));
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
    public function searchmisventasupgradedigi(Request $request)
    {
	    $upgradedigitals = upgradedigi::all();
        $searchtext = $request->get('text');
        $upgradedigitals= upgradedigi::firstOrNew()
	    ->where('Numero', 'like', '%'.$searchtext.'%')
        ->where('agente','=', Auth::user()->cedula)
	    ->paginate(20);

        
 
        return view('estadosupgradedigital.index',compact('upgradedigitals'));
    }
}

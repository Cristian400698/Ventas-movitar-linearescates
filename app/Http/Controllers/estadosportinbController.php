<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\portainbound;

class estadosportinbController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agente = Auth::user()->cedula;

        $portainbounds =DB::table('portainbounds')
          ->select('id','documento', 'nombres','apellidos','tipocliente','revisados','agente','estadorevisado','dia')
          ->where('agente', '=', $agente)
          ->orderBy('dia', 'desc')
          ->paginate(20) ;
        return view('estados.index', compact('portainbounds','agente'));
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
    public function searchmisventasportainbound(Request $request)
    {
	$portainbounds = portainbound::all();
        $searchinboundback = $request->get('text');
        $portainbounds= portainbound::firstOrNew()
	    ->where('documento', 'like', '%'.$searchinboundback.'%')
        ->where('agente','=', Auth::user()->cedula)
	    ->paginate(20);

        
 
        return view('estados.index',compact('portainbounds'));
    }
}

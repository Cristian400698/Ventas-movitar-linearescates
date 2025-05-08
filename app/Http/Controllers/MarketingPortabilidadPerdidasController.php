<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\marketportabilidad;

class MarketingPortabilidadPerdidasController extends Controller
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
        $portabilidadrede = marketportabilidad::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE',$z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('markeportabilidadperdida.index',  compact('portabilidadrede'));
    }

    public function searchmarkeportaperdida(Request $request)
    {
	$z ='PERDIDA'; 
        $y ='RECUPERAR';
        $searchmarkeportaperdida = $request->get('searchmarkeportaperdida');

    $portabilidadrede = marketportabilidad::where((function ($query) use ($searchmarkeportaperdida) {
        return $query->where('Numero', $searchmarkeportaperdida);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);

      
        return view('markeportabilidadperdida.index',compact('portabilidadrede'));
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

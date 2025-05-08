<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\markphoenixe;

class MarketingPhoenixPerdidasController extends Controller
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
        $phoenixes = markphoenixe::orderBy('revisados', 'asc')
        ->Where('revisados', 'LIKE',$z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('markephoenixperdidas.index',  compact('phoenixes'));
    }

    public function searchmarkephoenixperdida(Request $request)
    {
	$z ='PERDIDA'; 
        $y ='RECUPERAR';
        $searchmarkephoenixperdida = $request->get('searchmarkephoenixperdida');

    $phoenixes = markphoenixe::where((function ($query) use ($searchmarkephoenixperdida) {
        return $query->where('Numero', $searchmarkephoenixperdida);
    }))->where(function ($query) use ($z, $y) {
        return $query->where('revisados', $z)
                    ->orWhere('revisados', $y);
    })
    ->paginate(20);

      
        return view('markephoenixperdidas.index',compact('phoenixes'));
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

<?php

namespace App\Http\Controllers;

use App\Exports\RechazoExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\causale;
use App\Models\linea;
use App\Models\rechazo;
use Maatwebsite\Excel\Facades\Excel;

class rechazosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-rechazos'), 403);
     $rechazos['rechazos']= rechazo::paginate(20);
        return view('rechazos.index',$rechazos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Carbon::setLocale('co');
	    $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $usuarios = User::all();
        $causales = causale::all();
        $linea = linea::all();

        return view('rechazos.create', compact('hora','date','user_nombre','user_id','usuarios','linea','causales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rechazo = new rechazo();

        $rechazo->numero_de_celular = $request->get('numero_de_celular');
        $rechazo->nombres = $request->get('nombres');
        $rechazo->documento = $request->get('documento');
        $rechazo->causal = $request->get('causal');
        $rechazo->linea = $request->get('linea');
        $rechazo->departamento = $request->get('departamento');
        $rechazo->id_ciudad = $request->get('id_ciudad');
        $rechazo->claro = $request->get('claro');
        $rechazo->tigo = $request->get('tigo');
        $rechazo->directv = $request->get('directv');
        $rechazo->wow = $request->get('wow');
        $rechazo->barrio = $request->get('barrio');
        $rechazo->otros = $request->get('otros');
        $rechazo->modalidad = $request->get('modalidad');
        $rechazo->frechazo = $request->get('frechazo');
        $rechazo->imgrechazo = $request->get('imgrechazo');
        $rechazo->observacion = $request->get('observacion');
        $rechazo->hora = Carbon::now()->format('H:i:s');
        $rechazo->dia = $request->get('dia');
        $rechazo->agente = $request->get('agente');

        if ($request->hasFile('imgrechazo')) {
            $rechazo['imgrechazo'] = $request->file('imgrechazo')->store('uploads', 'public');
          }

        $rechazo->save();

        return redirect('rechazos/create')->with('success', 'Datos guardados correctamente..');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort_if(Gate::denies('back-rechazos'), 403);
        $rechazos['rechazos']= rechazo::paginate(20);
        return view('rechazos.index',$rechazos); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('back-rechazos'), 403);
        $rechazos=rechazo::findOrFail($id);
        return view('rechazos.edit',compact('rechazos'));
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
        $rechazo = rechazo::find($id);

        $rechazo->numero_de_celular = $request->get('numero_de_celular');
        $rechazo->nombres = $request->get('nombres');
        $rechazo->documento = $request->get('documento');
        $rechazo->causal = $request->get('causal');
        $rechazo->linea = $request->get('linea');
        $rechazo->departamento = $request->get('departamento');
        $rechazo->id_ciudad = $request->get('id_ciudad');
        $rechazo->claro = $request->get('claro');
        $rechazo->tigo = $request->get('tigo');
        $rechazo->directv = $request->get('directv');
        $rechazo->wow = $request->get('wow');
        $rechazo->barrio = $request->get('barrio');
        $rechazo->otros = $request->get('otros');
        $rechazo->modalidad = $request->get('modalidad');
        $rechazo->frechazo = $request->get('frechazo');
        $rechazo->imgrechazo = $request->get('imgrechazo');
        $rechazo->observacion = $request->get('observacion');


        $rechazo->save();

        return redirect('rechazos')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rechazos = rechazo::find($id);        
        $rechazos->delete();
        return redirect('rechazos')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchrechazos(Request $request)
    {
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $texto = $request->get('searchphoenix'); 
        $rechazos = rechazo::firstOrNew()
        ->where('documento','LIKE','%'.$texto.'%')
        ->where('revisados', 'LIKE' ,$z)
        ->orwhere('revisados', 'LIKE' ,$y)
        ->paginate(1);
        return view('rechazos.index',compact('rechazos'));
    }
    public function exportExcel()
    {
        return Excel::download(new RechazoExport, 'Rechazos.xlsx');
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\LineanuevaExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\linea_nueva;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Maatwebsite\Excel\Facades\Excel;

class lineanuevaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-lineanueva'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $lineanueva = linea_nueva::orderBy('dia', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);

        return view('lineanueva.index',  compact('lineanueva'));
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
        $Planadquieres = Planadquiere::all();
        $tipoclientes = tipoclientes::all();
        $origen = origen::all();
        $tipoclientes = tipoclientes::all();

        return view('lineanueva.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','origen','tipoclientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lineanueva = new linea_nueva();

        $lineanueva->numero = $request->get('numero');
        $lineanueva->documento = $request->get('documento');
        $lineanueva->nombres = $request->get('nombres');
        $lineanueva->apellidos = $request->get('apellidos');
        $lineanueva->correo = $request->get('correo');
        $lineanueva->departamento = $request->get('departamento');
        $lineanueva->id_ciudad = $request->get('id_ciudad');
        $lineanueva->barrio = $request->get('barrio');
        $lineanueva->direccion = $request->get('direccion');
        $lineanueva->tipocliente = $request->get('tipocliente');
        $lineanueva->ncontacto = $request->get('ncontacto');
        $lineanueva->selector = $request->get('selector');
        $lineanueva->ngrabacion = $request->get('ngrabacion');
        $lineanueva->orden = $request->get('orden');
        $lineanueva->confronta = $request->get('confronta');
        $lineanueva->observaciones = $request->get('observaciones');
        $lineanueva->agente = $request->get('agente');
        $lineanueva->revisados = $request->get('revisados');
        $lineanueva->estadorevisado = $request->get('estadorevisado');
        $lineanueva->obs2 = $request->get('obs2');
        $lineanueva->backoffice = $request->get('backoffice');
        $lineanueva->hora = Carbon::now()->format('H:i:s');
        $lineanueva->dia = $request->get('dia');
        

        if ($request->hasFile('confronta')) {
            $lineanueva['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $lineanueva['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $lineanueva['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }

        $lineanueva->save();

        return redirect('lineanueva/create')->with('success', 'Datos guardados correctamente..');
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
        abort_if(Gate::denies('back-lineanueva'), 403);
        $lineanuevas = linea_nueva::findOrFail($id);
        return view('lineanueva.edit')->with('lineanuevas', $lineanuevas);
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
        $lineanueva = linea_nueva::find($id);

        $lineanueva->numero = $request->get('numero');
        $lineanueva->documento = $request->get('documento');
        $lineanueva->nombres = $request->get('nombres');
        $lineanueva->apellidos = $request->get('apellidos');
        $lineanueva->correo = $request->get('correo');
        $lineanueva->departamento = $request->get('departamento');
        $lineanueva->id_ciudad = $request->get('id_ciudad');
        $lineanueva->barrio = $request->get('barrio');
        $lineanueva->direccion = $request->get('direccion');
        $lineanueva->tipocliente = $request->get('tipocliente');
        $lineanueva->ncontacto = $request->get('ncontacto');
        $lineanueva->selector = $request->get('selector');
        $lineanueva->ngrabacion = $request->get('ngrabacion');
        $lineanueva->orden = $request->get('orden');
        $lineanueva->observaciones = $request->get('observaciones');
        $lineanueva->revisados = $request->get('revisados');
        $lineanueva->estadorevisado = $request->get('estadorevisado');
        $lineanueva->obs2 = $request->get('obs2');
        $lineanueva->backoffice = $request->get('backoffice');

        $lineanueva->save();

        return redirect('lineanueva')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lineanuevas = linea_nueva::find($id);        
        $lineanuevas->delete();
        return redirect('lineanueva')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchlineanueva(Request $request)
    {
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $texto = $request->get('searchlineanueva'); 
        $lineanueva = linea_nueva::firstOrNew()
        ->where('documento','LIKE','%'.$texto.'%')
        ->where('revisados', 'LIKE' ,$z)
        ->orwhere('revisados', 'LIKE' ,$y)
        ->paginate(1);
        return view('lineanueva.index',compact('lineanueva'));
    }
    public function exportExcel()
    {
        return Excel::download(new LineanuevaExport, 'Linea_nueva.xlsx');
    }
}

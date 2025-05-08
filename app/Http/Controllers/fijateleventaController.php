<?php

namespace App\Http\Controllers;

use App\Exports\FjaiteleventaExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\fijateleventa;
use App\Models\estrato;
use App\Models\producto;
use App\Models\velocidad;
use App\Models\tecnologia;
use Maatwebsite\Excel\Facades\Excel;

class fijateleventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-televanta'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $fijateleventa = fijateleventa::orderBy('dia', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('fijateleventa.index',  compact('fijateleventa'));

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
        $estrato  = estrato::all();
        $producto = producto::all();
        $velocidad = velocidad::all();
        $tecnologia = tecnologia::all();

        return view('fijateleventa.create', compact('hora','date','user_nombre','user_id','usuarios','estrato','producto','velocidad','tecnologia') );
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fijateleventa = new fijateleventa();

        $fijateleventa->nombres = $request->get('nombres');
        $fijateleventa->documento = $request->get('documento');
        $fijateleventa->fexpedicion = $request->get('fexpedicion');
        $fijateleventa->correo = $request->get('correo');
        $fijateleventa->departamento = $request->get('departamento');
        $fijateleventa->id_ciudad = $request->get('id_ciudad');
        $fijateleventa->barrio = $request->get('barrio');
        $fijateleventa->direccion = $request->get('direccion');
        $fijateleventa->estrato = $request->get('estrato');
        $fijateleventa->ngrabacion = $request->get('ngrabacion');
        $fijateleventa->ncontacto = $request->get('ncontacto');
        $fijateleventa->producto = $request->get('producto');
        $fijateleventa->segmento = $request->get('segmento');
        $fijateleventa->FOX = $request->get('FOX');
        $fijateleventa->HBO = $request->get('HBO');
        $fijateleventa->cds_movil = $request->get('cds_movil');
        $fijateleventa->cds_fija = $request->get('cds_fija');
        $fijateleventa->Paquete_Adultos = $request->get('Paquete_Adultos');
        $fijateleventa->Decodificador = $request->get('Decodificador');
        $fijateleventa->Svas_lineas = $request->get('Svas_lineas');
        $fijateleventa->velocidad = $request->get('velocidad');
        $fijateleventa->tecnologia = $request->get('tecnologia');
        $fijateleventa->orden = $request->get('orden');
        $fijateleventa->selector = $request->get('selector');
        $fijateleventa->confronta = $request->get('confronta');
        $fijateleventa->observacion = $request->get('observacion');
        $fijateleventa->agente = $request->get('agente');
        $fijateleventa->revisados = $request->get('revisados');
        $fijateleventa->estadorevisado = $request->get('estadorevisado');
        $fijateleventa->obs2 = $request->get('obs2');
        $fijateleventa->backoffice = $request->get('backoffice');
        $fijateleventa->hora = Carbon::now()->format('H:i:s');
        $fijateleventa->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $fijateleventa['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }

          if ($request->hasFile('likewize')) {
            $fijateleventa['likewize'] = $request->file('likewize')->store('uploads', 'public');
          }

          if ($request->hasFile('ley2300')) {
            $fijateleventa['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
          }


        $fijateleventa->save();

        return redirect('fijateleventa/create')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        abort_if(Gate::denies('back-televanta'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $fijateleventa = fijateleventa::orderBy('dia', 'asc')
        ->Where('revisados', 'LIKE', $z )
        ->orWhere('revisados', 'LIKE', $y )
        ->paginate(20);
        return view('fijateleventa.index',  compact('fijateleventa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('back-televanta'), 403);
        $fijas=fijateleventa::findOrFail($id);
        return view('fijateleventa.edit',compact('fijas'));
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
        $fijateleventa = fijateleventa::find($id);

        $fijateleventa->nombres = $request->get('nombres');
        $fijateleventa->documento = $request->get('documento');
        $fijateleventa->fexpedicion = $request->get('fexpedicion');
        $fijateleventa->correo = $request->get('correo');
        $fijateleventa->departamento = $request->get('departamento');
        $fijateleventa->id_ciudad = $request->get('id_ciudad');
        $fijateleventa->barrio = $request->get('barrio');
        $fijateleventa->direccion = $request->get('direccion');
        $fijateleventa->estrato = $request->get('estrato');
        $fijateleventa->ngrabacion = $request->get('ngrabacion');
        $fijateleventa->ncontacto = $request->get('ncontacto');
        $fijateleventa->producto = $request->get('producto');
        $fijateleventa->segmento = $request->get('segmento');
        $fijateleventa->FOX = $request->get('FOX');
        $fijateleventa->HBO = $request->get('HBO');
        $fijateleventa->cds_movil = $request->get('cds_movil');
        $fijateleventa->cds_fija = $request->get('cds_fija');
        $fijateleventa->Paquete_Adultos = $request->get('Paquete_Adultos');
        $fijateleventa->Decodificador = $request->get('Decodificador');
        $fijateleventa->Svas_lineas = $request->get('Svas_lineas');
        $fijateleventa->velocidad = $request->get('velocidad');
        $fijateleventa->tecnologia = $request->get('tecnologia');
        $fijateleventa->orden = $request->get('orden');
        $fijateleventa->selector = $request->get('selector');
        $fijateleventa->observacion = $request->get('observacion');
        $fijateleventa->revisados = $request->get('revisados');
        $fijateleventa->estadorevisado = $request->get('estadorevisado');
        $fijateleventa->obs2 = $request->get('obs2');
        $fijateleventa->backoffice = $request->get('backoffice');

        $fijateleventa->save();

        return redirect('fijateleventa')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fijateleventa = fijateleventa::find($id);        
        $fijateleventa->delete();

        return redirect('fijateleventa')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchtelefija(Request $request)
    {
	$fijateleventa = fijateleventa::all();
        $searchtelefija = $request->get('searchtelefija');
        $fijateleventa = fijateleventa::firstOrNew()->where('documento', 'like', '%'.$searchtelefija.'%')->paginate(20);

        return view('fijateleventa.index',compact('fijateleventa'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new FjaiteleventaExport($fecha_ini, $fecha_fin), 'Fija_Televenta.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new FjaiteleventaExport  ($fecha_ini, $fecha_fin), 'Fija_Televenta.xlsx');
   }
    }
}

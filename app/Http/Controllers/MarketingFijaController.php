<?php

namespace App\Http\Controllers;

use App\Exports\FjaidigitalExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\markefija;
use App\Models\estrato;
use App\Models\producto;
use App\Models\velocidad;
use App\Models\tecnologia;
use Maatwebsite\Excel\Facades\Excel;

class MarketingFijaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $z = 'NUEVO';
        $y = 'RECUPERADA';
        $fijadigital = markefija::all();
        $fijadigital = markefija::orderBy('dia', 'asc')
            ->Where('revisados', 'LIKE', $z)
            ->orWhere('revisados', 'LIKE', $y)
            ->paginate(20);
        return view('markefija.index',  compact('fijadigital'));
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

        return view('markefija.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'estrato', 'producto', 'velocidad', 'tecnologia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $fijadigital = new markefija();

        $fijadigital->nombres = $request->get('nombres');
        $fijadigital->documento = $request->get('documento');
        $fijadigital->fexpedicion = $request->get('fexpedicion');
        $fijadigital->correo = $request->get('correo');
        $fijadigital->departamento = $request->get('departamento');
        $fijadigital->id_ciudad = $request->get('id_ciudad');
        $fijadigital->barrio = $request->get('barrio');
        $fijadigital->direccion = $request->get('direccion');
        $fijadigital->estrato = $request->get('estrato');
        $fijadigital->ngrabacion = $request->get('ngrabacion');
        $fijadigital->ncontacto = $request->get('ncontacto');
        $fijadigital->producto = $request->get('producto');
        $fijadigital->segmento = $request->get('segmento');
        $fijadigital->FOX = $request->get('FOX');
        $fijadigital->HBO = $request->get('HBO');
        $fijadigital->cds_movil = $request->get('cds_movil');
        $fijadigital->cds_fija = $request->get('cds_fija');
        $fijadigital->Paquete_Adultos = $request->get('Paquete_Adultos');
        $fijadigital->Decodificador = $request->get('Decodificador');
        $fijadigital->Svas_lineas = $request->get('Svas_lineas');
        $fijadigital->velocidad = $request->get('velocidad');
        $fijadigital->tecnologia = $request->get('tecnologia');
        $fijadigital->orden = $request->get('orden');
        $fijadigital->selector = $request->get('selector');
        $fijadigital->confronta = $request->get('confronta');
        $fijadigital->observacion = $request->get('observacion');
        $fijadigital->agente = $request->get('agente');
        $fijadigital->revisados = $request->get('revisados');
        $fijadigital->estadorevisado = $request->get('estadorevisado');
        $fijadigital->obs2 = $request->get('obs2');
        $fijadigital->backoffice = $request->get('backoffice');
        $fijadigital->hora = Carbon::now()->format('H:i:s');
        $fijadigital->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $fijadigital['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }

        if ($request->hasFile('likewize')) {
            $fijadigital['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }

        if ($request->hasFile('ley2300')) {
            $fijadigital['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }

        $fijadigital->save();

        return redirect('markefija/create')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $z = 'NUEVO';
        $y = 'RECUPERADA';
        $fijadigital = markefija::all();
        $fijadigital = markefija::orderBy('dia', 'asc')
            ->Where('revisados', 'LIKE', $z)
            ->orWhere('revisados', 'LIKE', $y)
            ->paginate(20);
        return view('markefija.index',  compact('fijadigital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $fijas = markefija::findOrFail($id);
        return view('markefija.edit', compact('fijas'));
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
        $fijadigital = markefija::find($id);

        $fijadigital->nombres = $request->get('nombres');
        $fijadigital->documento = $request->get('documento');
        $fijadigital->fexpedicion = $request->get('fexpedicion');
        $fijadigital->correo = $request->get('correo');
        $fijadigital->departamento = $request->get('departamento');
        $fijadigital->id_ciudad = $request->get('id_ciudad');
        $fijadigital->barrio = $request->get('barrio');
        $fijadigital->direccion = $request->get('direccion');
        $fijadigital->estrato = $request->get('estrato');
        $fijadigital->ngrabacion = $request->get('ngrabacion');
        $fijadigital->ncontacto = $request->get('ncontacto');
        $fijadigital->producto = $request->get('producto');
        $fijadigital->segmento = $request->get('segmento');
        $fijadigital->FOX = $request->get('FOX');
        $fijadigital->HBO = $request->get('HBO');
        $fijadigital->cds_movil = $request->get('cds_movil');
        $fijadigital->cds_fija = $request->get('cds_fija');
        $fijadigital->Paquete_Adultos = $request->get('Paquete_Adultos');
        $fijadigital->Decodificador = $request->get('Decodificador');
        $fijadigital->Svas_lineas = $request->get('Svas_lineas');
        $fijadigital->velocidad = $request->get('velocidad');
        $fijadigital->tecnologia = $request->get('tecnologia');
        $fijadigital->orden = $request->get('orden');
        $fijadigital->selector = $request->get('selector');
        $fijadigital->observacion = $request->get('observacion');
        $fijadigital->revisados = $request->get('revisados');
        $fijadigital->estadorevisado = $request->get('estadorevisado');
        $fijadigital->obs2 = $request->get('obs2');
        $fijadigital->backoffice = $request->get('backoffice');


        $fijadigital->save();

        return redirect('markefija')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fijadigital = markefija::find($id);
        $fijadigital->delete();

        return redirect('markefija')->with('success', 'Datos Eliminado correctamente..');
    }

    public function searchmarkefija(Request $request)
    {
        $fijadigital = markefija::all();
        $searchmarkefija = $request->get('searchmarkefija');
        $fijadigital = markefija::firstOrNew()->where('documento', 'like', '%' . $searchmarkefija . '%')->paginate(20);

        return view('markefija.index', compact('fijadigital'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new FjaidigitalExport($fecha_ini, $fecha_fin), 'Fija_Digital.xlsx');
        } else {
            $fecha_ini = $request->get('searchcreditodate1');
            $fecha_fin = $request->get('searchcreditodate2');
            return Excel::download(new FjaidigitalExport($fecha_ini, $fecha_fin), 'Fija_Digital.xlsx');
        }
    }
}

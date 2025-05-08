<?php

namespace App\Http\Controllers;

use App\Exports\ComunidadExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Comunidad;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ComunidadEmpresarialController extends Controller
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
        $comunidad = DB::table('Comunidads')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'segmento', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

        return view('comunidad.index', compact('comunidad'));
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

        return view('comunidad.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'Planadquieres', 'tipoclientes', 'origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comunidad = new Comunidad();

        $comunidad->numero = $request->get('numero');
        $comunidad->documento = $request->get('documento');
        $comunidad->nombres = $request->get('nombres');
        $comunidad->apellidos = $request->get('apellidos');
        $comunidad->correo = $request->get('correo');
        $comunidad->departamento = $request->get('departamento');
        $comunidad->id_ciudad = $request->get('id_ciudad');
        $comunidad->barrio = $request->get('barrio');
        $comunidad->direccion = $request->get('direccion');
        $comunidad->nip = $request->get('nip');
        $comunidad->tipocliente = $request->get('tipocliente');
        $comunidad->planadquiere = $request->get('planadquiere');
        $comunidad->segmento = $request->get('segmento');
        $comunidad->ncontacto = $request->get('ncontacto');
        $comunidad->imei = $request->get('imei');
        $comunidad->fvc = $request->get('fvc');
        $comunidad->fentrega = $request->get('fentrega');
        $comunidad->fexpedicion = $request->get('fexpedicion');
        $comunidad->fnacimiento = $request->get('fnacimiento');
        $comunidad->origen = $request->get('origen');
        $comunidad->ngrabacion = $request->get('ngrabacion');
        $comunidad->selector = $request->get('selector');
        $comunidad->orden = $request->get('orden');
        $comunidad->confronta = $request->get('confronta');
        $comunidad->observaciones = $request->get('observaciones');
        $comunidad->agente = $request->get('agente');
        $comunidad->revisados = $request->get('revisados');
        $comunidad->estadorevisado = $request->get('estadorevisado');
        $comunidad->obs2 = $request->get('obs2');
        $comunidad->backoffice = $request->get('backoffice');
        $comunidad->hora = Carbon::now()->format('H:i:s');
        $comunidad->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $comunidad['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $comunidad['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }
        if ($request->hasFile('ley2300')) {
            $comunidad['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }

        $comunidad->save();

        return redirect('comunidad/create')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $z = 'Nuevo';
        $y = 'RECUPERADA';
        $comunidad = DB::table('Comunidads')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'segmento', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

        return view('comunidad.index', compact('comunidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comunidad = Comunidad::findOrFail($id);
        return view('comunidad.edit')->with('comunidad', $comunidad);
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
        $comunidad = Comunidad::find($id);

        $comunidad->numero = $request->get('numero');
        $comunidad->documento = $request->get('documento');
        $comunidad->nombres = $request->get('nombres');
        $comunidad->apellidos = $request->get('apellidos');
        $comunidad->correo = $request->get('correo');
        $comunidad->departamento = $request->get('departamento');
        $comunidad->id_ciudad = $request->get('id_ciudad');
        $comunidad->barrio = $request->get('barrio');
        $comunidad->direccion = $request->get('direccion');
        $comunidad->nip = $request->get('nip');
        $comunidad->tipocliente = $request->get('tipocliente');
        $comunidad->planadquiere = $request->get('planadquiere');
        $comunidad->segmento = $request->get('segmento');
        $comunidad->ncontacto = $request->get('ncontacto');
        $comunidad->imei = $request->get('imei');
        $comunidad->fvc = $request->get('fvc');
        $comunidad->fentrega = $request->get('fentrega');
        $comunidad->fexpedicion = $request->get('fexpedicion');
        $comunidad->fnacimiento = $request->get('fnacimiento');
        $comunidad->origen = $request->get('origen');
        $comunidad->ngrabacion = $request->get('ngrabacion');
        $comunidad->selector = $request->get('selector');
        $comunidad->orden = $request->get('orden');
        $comunidad->observaciones = $request->get('observaciones');
        $comunidad->agente = $request->get('agente');
        $comunidad->revisados = $request->get('revisados');
        $comunidad->estadorevisado = $request->get('estadorevisado');
        $comunidad->obs2 = $request->get('obs2');
        $comunidad->backoffice = $request->get('backoffice');

        if ($request->hasFile('confronta')) {
            $comunidad['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $comunidad['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }
        if ($request->hasFile('ley2300')) {
            $comunidad['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }

        $comunidad->save();

        return redirect('comunidad/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comunidad = Comunidad::find($id);
        $comunidad->delete();

        return redirect('comunidad/index')->with('success', 'Datos Eliminado correctamente..');
    }

    public function exportExcel(Request $request)
    {
        if ($request->get('searchcomunidad1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new ComunidadExport($fecha_ini, $fecha_fin), 'comunidad.xlsx');
        } else {
            $fecha_ini = $request->get('searchcomunidad1');
            $fecha_fin = $request->get('searchcomunidad2');
            return Excel::download(new ComunidadExport($fecha_ini, $fecha_fin), 'comunidad.xlsx');
        }
    }

    public function searchcomunidad(Request $request)
    {
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $texto = $request->get('searchcomunidad'); 
        $comunidad = Comunidad::firstOrNew()
	->where('Numero', 'like', '%'.$texto .'%')
        ->paginate(20);
 
        return view('comunidad.index',compact('comunidad'));
    }
}

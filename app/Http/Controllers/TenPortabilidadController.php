<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use App\Models\tentenportabilidad;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\tentenportabilidadExport;

class TenPortabilidadController extends Controller
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
        $tentenportabilidad = DB::table('tentenportabilidads')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

            return view('tentenportabilidad.index', compact('tentenportabilidad'));
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

        return view('tentenportabilidad.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'Planadquieres', 'tipoclientes', 'origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tentenportabilidad = new tentenportabilidad();

        $tentenportabilidad->numero = $request->get('numero');
        $tentenportabilidad->documento = $request->get('documento');
        $tentenportabilidad->nombres = $request->get('nombres');
        $tentenportabilidad->apellidos = $request->get('apellidos');
        $tentenportabilidad->correo = $request->get('correo');
        $tentenportabilidad->departamento = $request->get('departamento');
        $tentenportabilidad->id_ciudad = $request->get('id_ciudad');
        $tentenportabilidad->barrio = $request->get('barrio');
        $tentenportabilidad->direccion = $request->get('direccion');
        $tentenportabilidad->nip = $request->get('nip');
        $tentenportabilidad->tipocliente = $request->get('tipocliente');
        $tentenportabilidad->planadquiere = $request->get('planadquiere');
        $tentenportabilidad->ncontacto = $request->get('ncontacto');
        $tentenportabilidad->imei = $request->get('imei');
        $tentenportabilidad->fvc = $request->get('fvc');
        $tentenportabilidad->fentrega = $request->get('fentrega');
        $tentenportabilidad->fexpedicion = $request->get('fexpedicion');
        $tentenportabilidad->fnacimiento = $request->get('fnacimiento');
        $tentenportabilidad->origen = $request->get('origen');
        $tentenportabilidad->ngrabacion = $request->get('ngrabacion');
        $tentenportabilidad->selector = $request->get('selector');
        $tentenportabilidad->orden = $request->get('orden');
        $tentenportabilidad->confronta = $request->get('confronta');
        $tentenportabilidad->observaciones = $request->get('observaciones');
        $tentenportabilidad->agente = $request->get('agente');
        $tentenportabilidad->revisados = $request->get('revisados');
        $tentenportabilidad->estadorevisado = $request->get('estadorevisado');
        $tentenportabilidad->obs2 = $request->get('obs2');
        $tentenportabilidad->backoffice = $request->get('backoffice');
        $tentenportabilidad->hora = Carbon::now()->format('H:i:s');
        $tentenportabilidad->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $tentenportabilidad['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $tentenportabilidad['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }
        if ($request->hasFile('ley2300')) {
            $tentenportabilidad['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }

        $tentenportabilidad->save();

        return redirect('tentenportabilidad/create')->with('success', 'Datos guardados correctamente..');
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
        $tentenportabilidad = DB::table('tentenportabilidads')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

            return view('tentenportabilidad.index', compact('tentenportabilidad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tentenportabilidad = tentenportabilidad::findOrFail($id);
        return view('tentenportabilidad.edit')->with('tentenportabilidad', $tentenportabilidad);
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
       $tentenportabilidad = tentenportabilidad::find($id);

       $tentenportabilidad->numero = $request->get('numero');
       $tentenportabilidad->documento = $request->get('documento');
       $tentenportabilidad->nombres = $request->get('nombres');
       $tentenportabilidad->apellidos = $request->get('apellidos');
       $tentenportabilidad->correo = $request->get('correo');
       $tentenportabilidad->departamento = $request->get('departamento');
       $tentenportabilidad->id_ciudad = $request->get('id_ciudad');
       $tentenportabilidad->barrio = $request->get('barrio');
       $tentenportabilidad->direccion = $request->get('direccion');
       $tentenportabilidad->nip = $request->get('nip');
       $tentenportabilidad->tipocliente = $request->get('tipocliente');
       $tentenportabilidad->planadquiere = $request->get('planadquiere');
       $tentenportabilidad->ncontacto = $request->get('ncontacto');
       $tentenportabilidad->imei = $request->get('imei');
       $tentenportabilidad->fvc = $request->get('fvc');
       $tentenportabilidad->fentrega = $request->get('fentrega');
       $tentenportabilidad->fexpedicion = $request->get('fexpedicion');
       $tentenportabilidad->fnacimiento = $request->get('fnacimiento');
       $tentenportabilidad->origen = $request->get('origen');
       $tentenportabilidad->ngrabacion = $request->get('ngrabacion');
       $tentenportabilidad->selector = $request->get('selector');
       $tentenportabilidad->orden = $request->get('orden');
       $tentenportabilidad->observaciones = $request->get('observaciones');
       $tentenportabilidad->agente = $request->get('agente');
       $tentenportabilidad->revisados = $request->get('revisados');
       $tentenportabilidad->estadorevisado = $request->get('estadorevisado');
       $tentenportabilidad->obs2 = $request->get('obs2');
       $tentenportabilidad->backoffice = $request->get('backoffice');

        if ($request->hasFile('confronta')) {
           $tentenportabilidad['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $tentenportabilidad['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }
        if ($request->hasFile('ley2300')) {
            $tentenportabilidad['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }

       $tentenportabilidad->save();

        return redirect('tentenportabilidad/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tentenportabilidad = tentenportabilidad::find($id);
        $tentenportabilidad->delete();

        return redirect('tentenportabilidad/index')->with('success', 'Datos Eliminado correctamente..');
    }

    public function exportExcel(Request $request)
    {
        if ($request->get('searchtentenportabilidad1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new tentenportabilidadExport($fecha_ini, $fecha_fin), 'tentenportabilidad.xlsx');
        } else {
            $fecha_ini = $request->get('searchtentenportabilidad1');
            $fecha_fin = $request->get('searchtentenportabilidad2');
            return Excel::download(new tentenportabilidadExport($fecha_ini, $fecha_fin), 'tentenportabilidad.xlsx');
        }
    }

    public function searchtentenportabilidad(Request $request)
    {
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $texto = $request->get('searchtentenportabilidad'); 
        $tentenportabilidad = tentenportabilidad::firstOrNew()
	->where('Numero', 'like', '%'.$texto .'%')
        ->paginate(20);
 
        return view('tentenportabilidad.index',compact('tentenportabilidad'));
    }
}

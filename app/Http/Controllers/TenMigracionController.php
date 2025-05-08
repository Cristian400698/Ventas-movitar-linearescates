<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use App\Models\tentenmigracion;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\tentenmigracionExport;

class TenMigracionController extends Controller
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
        $tentenmigracion = DB::table('tentenmigracions')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

        return view('tentenmigracion.index', compact('tentenmigracion'));
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

        return view('tentenmigracion.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'Planadquieres', 'tipoclientes', 'origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $tentenmigracion = new tentenmigracion();

       $tentenmigracion->numero = $request->get('numero');
       $tentenmigracion->documento = $request->get('documento');
       $tentenmigracion->nombres = $request->get('nombres');
       $tentenmigracion->apellidos = $request->get('apellidos');
       $tentenmigracion->correo = $request->get('correo');
       $tentenmigracion->departamento = $request->get('departamento');
       $tentenmigracion->id_ciudad = $request->get('id_ciudad');
       $tentenmigracion->barrio = $request->get('barrio');
       $tentenmigracion->direccion = $request->get('direccion');
       $tentenmigracion->nip = $request->get('nip');
       $tentenmigracion->tipocliente = $request->get('tipocliente');
       $tentenmigracion->planadquiere = $request->get('planadquiere');
       $tentenmigracion->ncontacto = $request->get('ncontacto');
       $tentenmigracion->imei = $request->get('imei');
       $tentenmigracion->fvc = $request->get('fvc');
       $tentenmigracion->fentrega = $request->get('fentrega');
       $tentenmigracion->fexpedicion = $request->get('fexpedicion');
       $tentenmigracion->fnacimiento = $request->get('fnacimiento');
       $tentenmigracion->origen = $request->get('origen');
       $tentenmigracion->ngrabacion = $request->get('ngrabacion');
       $tentenmigracion->selector = $request->get('selector');
       $tentenmigracion->orden = $request->get('orden');
       $tentenmigracion->confronta = $request->get('confronta');
       $tentenmigracion->observaciones = $request->get('observaciones');
       $tentenmigracion->agente = $request->get('agente');
       $tentenmigracion->revisados = $request->get('revisados');
       $tentenmigracion->estadorevisado = $request->get('estadorevisado');
       $tentenmigracion->obs2 = $request->get('obs2');
       $tentenmigracion->backoffice = $request->get('backoffice');
       $tentenmigracion->hora = Carbon::now()->format('H:i:s');
       $tentenmigracion->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
           $tentenmigracion['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $tentenmigracion['likewize'] = $request->file('likewize')->store('uploads', 'public');
         }
         if ($request->hasFile('ley2300')) {
            $tentenmigracion['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
         }

       $tentenmigracion->save();

        return redirect('tentenmigracion/create')->with('success', 'Datos guardados correctamente..');
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
        $tentenmigracion = DB::table('tentenmigracions')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

        return view('tentenmigracion.index', compact('tentenmigracion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tentenmigracion = tentenmigracion::findOrFail($id);
        return view('tentenmigracion.edit')->with('tentenmigracion', $tentenmigracion);
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
        $tentenmigracion = tentenmigracion::find($id);

       $tentenmigracion->numero = $request->get('numero');
       $tentenmigracion->documento = $request->get('documento');
       $tentenmigracion->nombres = $request->get('nombres');
       $tentenmigracion->apellidos = $request->get('apellidos');
       $tentenmigracion->correo = $request->get('correo');
       $tentenmigracion->departamento = $request->get('departamento');
       $tentenmigracion->id_ciudad = $request->get('id_ciudad');
       $tentenmigracion->barrio = $request->get('barrio');
       $tentenmigracion->direccion = $request->get('direccion');
       $tentenmigracion->nip = $request->get('nip');
       $tentenmigracion->tipocliente = $request->get('tipocliente');
       $tentenmigracion->planadquiere = $request->get('planadquiere');
       $tentenmigracion->ncontacto = $request->get('ncontacto');
       $tentenmigracion->imei = $request->get('imei');
       $tentenmigracion->fvc = $request->get('fvc');
       $tentenmigracion->fentrega = $request->get('fentrega');
       $tentenmigracion->fexpedicion = $request->get('fexpedicion');
       $tentenmigracion->fnacimiento = $request->get('fnacimiento');
       $tentenmigracion->origen = $request->get('origen');
       $tentenmigracion->ngrabacion = $request->get('ngrabacion');
       $tentenmigracion->selector = $request->get('selector');
       $tentenmigracion->orden = $request->get('orden');
       $tentenmigracion->observaciones = $request->get('observaciones');
       $tentenmigracion->agente = $request->get('agente');
       $tentenmigracion->revisados = $request->get('revisados');
       $tentenmigracion->estadorevisado = $request->get('estadorevisado');
       $tentenmigracion->obs2 = $request->get('obs2');
       $tentenmigracion->backoffice = $request->get('backoffice');

        if ($request->hasFile('confronta')) {
           $tentenmigracion['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $tentenmigracion['likewize'] = $request->file('likewize')->store('uploads', 'public');
         }
         if ($request->hasFile('ley2300')) {
            $tentenmigracion['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
         }

       $tentenmigracion->save();

        return redirect('tentenmigracion/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tentenmigracion = tentenmigracion::find($id);
        $tentenmigracion->delete();

        return redirect('tentenmigracion/index')->with('success', 'Datos Eliminado correctamente..');
    }

    public function exportExcel(Request $request)
    {
        if ($request->get('searchtentenmigracion1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new tentenmigracionExport($fecha_ini, $fecha_fin), 'tentenmigracion.xlsx');
        } else {
            $fecha_ini = $request->get('searchtentenmigracion1');
            $fecha_fin = $request->get('searchtentenmigracion2');
            return Excel::download(new tentenmigracionExport($fecha_ini, $fecha_fin), 'tentenmigracion.xlsx');
        }
    }

    public function searchtentenmigracion(Request $request)
    {
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $texto = $request->get('searchtentenmigracion'); 
        $tentenmigracion = tentenmigracion::firstOrNew()
	->where('Numero', 'like', '%'.$texto .'%')
        ->paginate(20);
 
        return view('tentenmigracion.index',compact('tentenmigracion'));
    }
}

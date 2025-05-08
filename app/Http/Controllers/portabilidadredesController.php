<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use App\Models\portabilidadrede;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\portabilidadredesExport;

class portabilidadredesController extends Controller
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
        $portabilidadrede = DB::table('portabilidadredes')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

        return view('portabilidadredes.index', compact('portabilidadrede'));
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

        return view('portabilidadredes.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'Planadquieres', 'tipoclientes', 'origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portabilidadredes = new portabilidadrede();

        $portabilidadredes->numero = $request->get('numero');
        $portabilidadredes->documento = $request->get('documento');
        $portabilidadredes->nombres = $request->get('nombres');
        $portabilidadredes->apellidos = $request->get('apellidos');
        $portabilidadredes->correo = $request->get('correo');
        $portabilidadredes->departamento = $request->get('departamento');
        $portabilidadredes->id_ciudad = $request->get('id_ciudad');
        $portabilidadredes->barrio = $request->get('barrio');
        $portabilidadredes->direccion = $request->get('direccion');
        $portabilidadredes->nip = $request->get('nip');
        $portabilidadredes->tipocliente = $request->get('tipocliente');
        $portabilidadredes->planadquiere = $request->get('planadquiere');
        $portabilidadredes->ncontacto = $request->get('ncontacto');
        $portabilidadredes->imei = $request->get('imei');
        $portabilidadredes->fvc = $request->get('fvc');
        $portabilidadredes->fentrega = $request->get('fentrega');
        $portabilidadredes->fexpedicion = $request->get('fexpedicion');
        $portabilidadredes->fnacimiento = $request->get('fnacimiento');
        $portabilidadredes->origen = $request->get('origen');
        $portabilidadredes->ngrabacion = $request->get('ngrabacion');
        $portabilidadredes->selector = $request->get('selector');
        $portabilidadredes->orden = $request->get('orden');
        $portabilidadredes->confronta = $request->get('confronta');
        $portabilidadredes->observaciones = $request->get('observaciones');
        $portabilidadredes->agente = $request->get('agente');
        $portabilidadredes->revisados = $request->get('revisados');
        $portabilidadredes->estadorevisado = $request->get('estadorevisado');
        $portabilidadredes->obs2 = $request->get('obs2');
        $portabilidadredes->backoffice = $request->get('backoffice');
        $portabilidadredes->hora = Carbon::now()->format('H:i:s');
        $portabilidadredes->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $portabilidadredes['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $portabilidadredes['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }
        if ($request->hasFile('ley2300')) {
            $portabilidadredes['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }

        $portabilidadredes->save();

        return redirect('portabilidadredes/create')->with('success', 'Datos guardados correctamente..');
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
        $portabilidadredes = portabilidadrede::findOrFail($id);
        return view('portabilidadredes.edit')->with('portabilidadredes', $portabilidadredes);
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
        $portabilidadredes = portabilidadrede::find($id);

        $portabilidadredes->revisados = $request->get('revisados');
        $portabilidadredes->estadorevisado = $request->get('estadorevisado');
        $portabilidadredes->obs2 = $request->get('obs2');
        $portabilidadredes->backoffice = $request->get('backoffice');

        $portabilidadredes->save();

        return redirect('portabilidadredes')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portabilidadredes = portabilidadrede::find($id);
        $portabilidadredes->delete();

        return redirect('portabilidadredes')->with('success', 'Datos Eliminado correctamente..');
    }

    public function searchportabilidadredes(Request $request)
    {
        $portabilidadrede = portabilidadrede::all();
        $searchportabilidadredes = $request->get('searchportabilidadredes');
        $portabilidadrede = portabilidadrede::firstOrNew()
            ->where('Numero', 'like', '%' . $searchportabilidadredes . '%')
            ->paginate(20);



        return view('portabilidadredes.index', compact('portabilidadrede'));
    }

    public function exportExcel(Request $request)
    {
        if ($request->get('portabilidadredes1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new portabilidadredesExport($fecha_ini, $fecha_fin), 'portabilidadredes.xlsx');
        } else {
            $fecha_ini = $request->get('portabilidadredes1');
            $fecha_fin = $request->get('portabilidadredes2');
            return Excel::download(new portabilidadredesExport($fecha_ini, $fecha_fin), 'portabilidadredes.xlsx');
        }
    }
}

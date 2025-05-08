<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use App\Models\migracionrede;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\migracionredesExport;

class migracionredesController extends Controller
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
        $migracionredes = DB::table('migracionredes')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

        return view('migracionredes.index', compact('migracionredes'));
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

        return view('migracionredes.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'Planadquieres', 'tipoclientes', 'origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $migracionredes = new migracionrede();

        $migracionredes->numero = $request->get('numero');
        $migracionredes->documento = $request->get('documento');
        $migracionredes->nombres = $request->get('nombres');
        $migracionredes->apellidos = $request->get('apellidos');
        $migracionredes->correo = $request->get('correo');
        $migracionredes->departamento = $request->get('departamento');
        $migracionredes->id_ciudad = $request->get('id_ciudad');
        $migracionredes->barrio = $request->get('barrio');
        $migracionredes->direccion = $request->get('direccion');
        $migracionredes->nip = $request->get('nip');
        $migracionredes->tipocliente = $request->get('tipocliente');
        $migracionredes->planadquiere = $request->get('planadquiere');
        $migracionredes->ncontacto = $request->get('ncontacto');
        $migracionredes->imei = $request->get('imei');
        $migracionredes->fvc = $request->get('fvc');
        $migracionredes->fentrega = $request->get('fentrega');
        $migracionredes->fexpedicion = $request->get('fexpedicion');
        $migracionredes->fnacimiento = $request->get('fnacimiento');
        $migracionredes->origen = $request->get('origen');
        $migracionredes->ngrabacion = $request->get('ngrabacion');
        $migracionredes->selector = $request->get('selector');
        $migracionredes->orden = $request->get('orden');
        $migracionredes->confronta = $request->get('confronta');
        $migracionredes->observaciones = $request->get('observaciones');
        $migracionredes->agente = $request->get('agente');
        $migracionredes->revisados = $request->get('revisados');
        $migracionredes->estadorevisado = $request->get('estadorevisado');
        $migracionredes->obs2 = $request->get('obs2');
        $migracionredes->backoffice = $request->get('backoffice');
        $migracionredes->hora = Carbon::now()->format('H:i:s');
        $migracionredes->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $migracionredes['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $migracionredes['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }
        if ($request->hasFile('ley2300')) {
            $migracionredes['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }

        $migracionredes->save();

        return redirect('migracionredes/create')->with('success', 'Datos guardados correctamente..');
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
        $migracionredes = migracionrede::findOrFail($id);
        return view('migracionredes.edit')->with('migracionredes', $migracionredes);
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
        $migracionredes = migracionrede::find($id);

        $migracionredes->revisados = $request->get('revisados');
        $migracionredes->estadorevisado = $request->get('estadorevisado');
        $migracionredes->obs2 = $request->get('obs2');
        $migracionredes->backoffice = $request->get('backoffice');

        $migracionredes->save();

        return redirect('migracionredes')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $migracionredes = migracionrede::find($id);
        $migracionredes->delete();

        return redirect('migracionredes')->with('success', 'Datos Eliminado correctamente..');
    }

    public function searchmigracionredes(Request $request)
    {
        $migracionredes = migracionrede::all();
        $searchmigracionredes = $request->get('searchmigracionrede');
        $portabilidadredes = migracionrede::firstOrNew()
            ->where('Numero', 'like', '%' . $searchmigracionredes . '%')
            ->paginate(20);

        return view('migracionredes.index', compact('migracionredes'));
    }

    public function exportExcel(Request $request)
    {
        if ($request->get('migracionredes1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new migracionredesExport($fecha_ini, $fecha_fin), 'migracionredes.xlsx');
        } else {
            $fecha_ini = $request->get('migracionredes1');
            $fecha_fin = $request->get('migracionredes2');
            return Excel::download(new migracionredesExport($fecha_ini, $fecha_fin), 'migracionredes.xlsx');
        }
    }
}

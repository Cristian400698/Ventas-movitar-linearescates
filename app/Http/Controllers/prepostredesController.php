<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use App\Models\prepostrede;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\prepostredesExport;

class prepostredesController extends Controller
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
        $prepostredes = DB::table('prepostredes')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

            return view('prepostredes.index', compact('prepostredes'));
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

        return view('prepostredes.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'Planadquieres', 'tipoclientes', 'origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prepostredes = new prepostrede();

        $prepostredes->numero = $request->get('numero');
        $prepostredes->documento = $request->get('documento');
        $prepostredes->nombres = $request->get('nombres');
        $prepostredes->apellidos = $request->get('apellidos');
        $prepostredes->correo = $request->get('correo');
        $prepostredes->departamento = $request->get('departamento');
        $prepostredes->id_ciudad = $request->get('id_ciudad');
        $prepostredes->barrio = $request->get('barrio');
        $prepostredes->direccion = $request->get('direccion');
        $prepostredes->nip = $request->get('nip');
        $prepostredes->tipocliente = $request->get('tipocliente');
        $prepostredes->planadquiere = $request->get('planadquiere');
        $prepostredes->ncontacto = $request->get('ncontacto');
        $prepostredes->imei = $request->get('imei');
        $prepostredes->fvc = $request->get('fvc');
        $prepostredes->fentrega = $request->get('fentrega');
        $prepostredes->fexpedicion = $request->get('fexpedicion');
        $prepostredes->fnacimiento = $request->get('fnacimiento');
        $prepostredes->origen = $request->get('origen');
        $prepostredes->ngrabacion = $request->get('ngrabacion');
        $prepostredes->selector = $request->get('selector');
        $prepostredes->orden = $request->get('orden');
        $prepostredes->confronta = $request->get('confronta');
        $prepostredes->observaciones = $request->get('observaciones');
        $prepostredes->agente = $request->get('agente');
        $prepostredes->revisados = $request->get('revisados');
        $prepostredes->estadorevisado = $request->get('estadorevisado');
        $prepostredes->obs2 = $request->get('obs2');
        $prepostredes->backoffice = $request->get('backoffice');
        $prepostredes->hora = Carbon::now()->format('H:i:s');
        $prepostredes->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $prepostredes['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $prepostredes['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }
        if ($request->hasFile('ley2300')) {
            $prepostredes['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }

        $prepostredes->save();

        return redirect('prepostredes/create')->with('success', 'Datos guardados correctamente..');
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
        $prepostredes = prepostrede::findOrFail($id);
        return view('prepostredes.edit')->with('prepostredes', $prepostredes);
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
        $prepostredes = prepostrede::find($id);

        $prepostredes->revisados = $request->get('revisados');
        $prepostredes->estadorevisado = $request->get('estadorevisado');
        $prepostredes->obs2 = $request->get('obs2');
        $prepostredes->backoffice = $request->get('backoffice');

        $prepostredes->save();
 
         return redirect('prepostredes')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prepostredes = prepostrede::find($id);
        $prepostredes->delete();

        return redirect('prepostredes')->with('success', 'Datos Eliminado correctamente..');
    }

    public function searchprepostredes(Request $request)
    {
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $texto = $request->get('searchprepostredes'); 
        $prepostredes = prepostrede::firstOrNew()
	->where('Numero', 'like', '%'.$texto .'%')
        ->paginate(20);
 
        return view('prepostredes.index',compact('prepostredes'));
    }

    public function exportExcel(Request $request)
    {
        if ($request->get('prepostredes1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new prepostredesExport($fecha_ini, $fecha_fin), 'prepostredes.xlsx');
        } else {
            $fecha_ini = $request->get('prepostredes1');
            $fecha_fin = $request->get('prepostredes2');
            return Excel::download(new prepostredesExport($fecha_ini, $fecha_fin), 'prepostredes.xlsx');
        }
    }
}

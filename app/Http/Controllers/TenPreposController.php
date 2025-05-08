<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use App\Models\tentenprepo;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\tentenprepoExport;

class TenPreposController extends Controller
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
        $tentenprepo = DB::table('tentenprepos')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

            return view('tentenprepos.index', compact('tentenprepo'));
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

        return view('tentenprepos.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'Planadquieres', 'tipoclientes', 'origen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tentenprepo = new tentenprepo();

        $tentenprepo->numero = $request->get('numero');
        $tentenprepo->documento = $request->get('documento');
        $tentenprepo->nombres = $request->get('nombres');
        $tentenprepo->apellidos = $request->get('apellidos');
        $tentenprepo->correo = $request->get('correo');
        $tentenprepo->departamento = $request->get('departamento');
        $tentenprepo->id_ciudad = $request->get('id_ciudad');
        $tentenprepo->barrio = $request->get('barrio');
        $tentenprepo->direccion = $request->get('direccion');
        $tentenprepo->nip = $request->get('nip');
        $tentenprepo->tipocliente = $request->get('tipocliente');
        $tentenprepo->planadquiere = $request->get('planadquiere');
        $tentenprepo->ncontacto = $request->get('ncontacto');
        $tentenprepo->imei = $request->get('imei');
        $tentenprepo->fvc = $request->get('fvc');
        $tentenprepo->fentrega = $request->get('fentrega');
        $tentenprepo->fexpedicion = $request->get('fexpedicion');
        $tentenprepo->fnacimiento = $request->get('fnacimiento');
        $tentenprepo->origen = $request->get('origen');
        $tentenprepo->ngrabacion = $request->get('ngrabacion');
        $tentenprepo->selector = $request->get('selector');
        $tentenprepo->orden = $request->get('orden');
        $tentenprepo->confronta = $request->get('confronta');
        $tentenprepo->observaciones = $request->get('observaciones');
        $tentenprepo->agente = $request->get('agente');
        $tentenprepo->revisados = $request->get('revisados');
        $tentenprepo->estadorevisado = $request->get('estadorevisado');
        $tentenprepo->obs2 = $request->get('obs2');
        $tentenprepo->backoffice = $request->get('backoffice');
        $tentenprepo->hora = Carbon::now()->format('H:i:s');
        $tentenprepo->dia = $request->get('dia');

        if ($request->hasFile('confronta')) {
            $tentenprepo['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }
        if ($request->hasFile('likewize')) {
            $tentenprepo['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }
        if ($request->hasFile('ley2300')) {
            $tentenprepo['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }

        $tentenprepo->save();

        return redirect('tentenprepos/create')->with('success', 'Datos guardados correctamente..');
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
        $tentenprepos = DB::table('tentenprepo')
            ->select('id', 'numero', 'documento', 'nombres', 'apellidos', 'tipocliente', 'planadquiere', 'fvc', 'ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->orderBy('dia', 'asc')
            ->paginate(20);

            return view('tentenprepos.index', compact('tentenprepos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tentenprepo = tentenprepo::findOrFail($id);
        return view('tentenprepos.edit')->with('tentenprepo', $tentenprepo);
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
        $tentenprepo = tentenprepo::find($id);

        $tentenprepo->numero = $request->get('numero');
        $tentenprepo->documento = $request->get('documento');
        $tentenprepo->nombres = $request->get('nombres');
        $tentenprepo->apellidos = $request->get('apellidos');
        $tentenprepo->correo = $request->get('correo');
        $tentenprepo->departamento = $request->get('departamento');
        $tentenprepo->id_ciudad = $request->get('id_ciudad');
        $tentenprepo->barrio = $request->get('barrio');
        $tentenprepo->direccion = $request->get('direccion');
        $tentenprepo->nip = $request->get('nip');
        $tentenprepo->tipocliente = $request->get('tipocliente');
        $tentenprepo->planadquiere = $request->get('planadquiere');
        $tentenprepo->ncontacto = $request->get('ncontacto');
        $tentenprepo->imei = $request->get('imei');
        $tentenprepo->fvc = $request->get('fvc');
        $tentenprepo->fentrega = $request->get('fentrega');
        $tentenprepo->fexpedicion = $request->get('fexpedicion');
        $tentenprepo->fnacimiento = $request->get('fnacimiento');
        $tentenprepo->origen = $request->get('origen');
        $tentenprepo->ngrabacion = $request->get('ngrabacion');
        $tentenprepo->selector = $request->get('selector');
        $tentenprepo->orden = $request->get('orden');
        $tentenprepo->observaciones = $request->get('observaciones');
        $tentenprepo->agente = $request->get('agente');
        $tentenprepo->revisados = $request->get('revisados');
        $tentenprepo->estadorevisado = $request->get('estadorevisado');
        $tentenprepo->obs2 = $request->get('obs2');
        $tentenprepo->backoffice = $request->get('backoffice');
 
         if ($request->hasFile('confronta')) {
            $tentenprepo['confronta'] = $request->file('confronta')->store('uploads', 'public');
         }
         if ($request->hasFile('likewize')) {
            $tentenprepo['likewize'] = $request->file('likewize')->store('uploads', 'public');
        }
        if ($request->hasFile('ley2300')) {
            $tentenprepo['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
        }
 
        $tentenprepo->save();
 
         return redirect('tentenprepos/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tentenprepo = tentenprepo::find($id);
        $tentenprepo->delete();

        return redirect('tentenprepos/index')->with('success', 'Datos Eliminado correctamente..');
    }

    public function exportExcel(Request $request)
    {
        if ($request->get('searchtentenprepo1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new tentenprepoExport($fecha_ini, $fecha_fin), 'tentenprepo.xlsx');
        } else {
            $fecha_ini = $request->get('searchtentenprepo1');
            $fecha_fin = $request->get('searchtentenprepo2');
            return Excel::download(new tentenprepoExport($fecha_ini, $fecha_fin), 'tentenprepo.xlsx');
        }
    }

    public function searchtentenprepo(Request $request)
    {
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $texto = $request->get('searchtentenprepo'); 
        $tentenprepo = tentenprepo::firstOrNew()
	->where('Numero', 'like', '%'.$texto .'%')
        ->paginate(20);
 
        return view('tentenprepos.index',compact('tentenprepo'));
    }
}

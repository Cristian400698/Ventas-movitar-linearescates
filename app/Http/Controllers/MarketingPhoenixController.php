<?php

namespace App\Http\Controllers;

use App\Exports\PhoenixExport;
use App\Http\Controllers\Controller;
use App\Models\equipo;
use App\Models\t_pago;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\tipoclientes;
use App\Models\tplane;
use App\Models\markphoenixe;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class MarketingPhoenixController extends Controller
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
        $phoenixes = markphoenixe::orderBy('dia', 'asc')
            ->Where('revisados', 'LIKE', '%' . $z . '%')
            ->orWhere('revisados', 'LIKE', '%' . $y . '%')
            ->paginate(20);
        return view('markephoenix.index',  compact('phoenixes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolasesorpatinador = DB::table('users')
            ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select('roles.name')
            ->where('roles.name', '=', 'asesorpatinador')
            ->where('users.cedula', Auth::user()->cedula)
            ->get();

        Carbon::setLocale('co');
        $date = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;
        $usuarios = User::all();
        $tipoclientes = tipoclientes::all();
        $modelos = equipo::all();
        $tplanes = tplane::all();
        $tipoPagoses = t_pago::all();

        if (isset($rolasesorpatinador[0])) {
            return view('markephoenix.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'tipoclientes', 'modelos', 'tplanes', 'tipoPagoses'));
        }
        $validado = 1;
        return view('markephoenix.create', compact('hora', 'date', 'user_nombre', 'user_id', 'usuarios', 'tipoclientes', 'modelos', 'tplanes', 'tipoPagoses', 'validado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phoenixe = new markphoenixe();

        $phoenixe->numero = $request->get('numero');
        $phoenixe->documento = $request->get('documento');
        $phoenixe->nombres = $request->get('nombres');
        $phoenixe->apellidos = $request->get('apellidos');
        $phoenixe->correo = $request->get('correo');
        $phoenixe->departamento = $request->get('departamento');
        $phoenixe->id_ciudad = $request->get('id_ciudad');
        $phoenixe->barrio = $request->get('barrio');
        $phoenixe->direccion = $request->get('direccion');
        $phoenixe->nip = $request->get('nip');
        $phoenixe->tipocliente = $request->get('tipocliente');
        $phoenixe->ncontacto = $request->get('ncontacto');
        $phoenixe->planadquiere = $request->get('planadquiere');
        $phoenixe->tipoPagos = $request->get('tipoPagos');
        $phoenixe->modelo = $request->get('modelo');
        $phoenixe->ngrabacion = $request->get('ngrabacion');
        $phoenixe->orden = $request->get('orden');
        $phoenixe->confronta = $request->get('confronta');
        $phoenixe->observaciones = $request->get('observaciones');
        $phoenixe->selector = $request->get('selector');
        $phoenixe->agente = $request->get('agente');
        $phoenixe->revisados = $request->get('revisados');
        $phoenixe->estadorevisado = $request->get('estadorevisado');
        $phoenixe->obs2 = $request->get('obs2');
        $phoenixe->backoffice = $request->get('backoffice');
        $phoenixe->hora = $request->get('hora');
        $phoenixe->dia = $request->get('dia');
        $phoenixe->EqComprado = $request->get('EqComprado');
        $phoenixe->ComEquipo = $request->get('ComEquipo');
        $phoenixe->ValEquipo = $request->get('ValEquipo');

        if ($request->hasFile('confronta')) {
            $phoenixe['confronta'] = $request->file('confronta')->store('uploads', 'public');
        }

        $phoenixe->save();

        return redirect('markephoenix/create')->with('success', 'Datos guardados correctamente..');
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

        $phoenixes = markphoenixe::findOrFail($id);
        return view('markephoenix.edit', compact('phoenixes'));
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
        $phoenixe = markphoenixe::find($id);

        $phoenixe->numero = $request->get('numero');
        $phoenixe->documento = $request->get('documento');
        $phoenixe->nombres = $request->get('nombres');
        $phoenixe->apellidos = $request->get('apellidos');
        $phoenixe->correo = $request->get('correo');
        $phoenixe->departamento = $request->get('departamento');
        $phoenixe->id_ciudad = $request->get('id_ciudad');
        $phoenixe->barrio = $request->get('barrio');
        $phoenixe->direccion = $request->get('direccion');
        $phoenixe->nip = $request->get('nip');
        $phoenixe->tipocliente = $request->get('tipocliente');
        $phoenixe->ncontacto = $request->get('ncontacto');
        $phoenixe->planadquiere = $request->get('planadquiere');
        $phoenixe->tipoPagos = $request->get('tipoPagos');
        $phoenixe->modelo = $request->get('modelo');
        $phoenixe->ngrabacion = $request->get('ngrabacion');
        $phoenixe->orden = $request->get('orden');
        $phoenixe->observaciones = $request->get('observaciones');
        $phoenixe->selector = $request->get('selector');
        $phoenixe->revisados = $request->get('revisados');
        $phoenixe->estadorevisado = $request->get('estadorevisado');
        $phoenixe->obs2 = $request->get('obs2');
        $phoenixe->backoffice = $request->get('backoffice');

        $phoenixe->EqComprado = $request->get('EqComprado');
        $phoenixe->ComEquipo = $request->get('ComEquipo');
        $phoenixe->ValEquipo = $request->get('ValEquipo');

        $phoenixe->save();

        return redirect('markephoenix')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phoenixes = markphoenixe::find($id);
        $phoenixes->delete();
        return redirect('markephoenix')->with('success', 'Datos Eliminado correctamente..');
    }

    public function searchmarkphoenixe(Request $request)
    {
        $phoenixes = markphoenixe::all();
        $searchmarkphoenixe = $request->get('searchmarkphoenixe');
        $phoenixes = markphoenixe::firstOrNew()->where('numero', 'like', '%' . $searchmarkphoenixe . '%')->paginate(20);


        return view('markephoenix.index', compact('phoenixes'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new PhoenixExport($fecha_ini, $fecha_fin), 'Phoenix.xlsx');
        } else {
            $fecha_ini = $request->get('searchcreditodate1');
            $fecha_fin = $request->get('searchcreditodate2');
            return Excel::download(new PhoenixExport($fecha_ini, $fecha_fin), 'Phoenix.xlsx');
        }
    }
}

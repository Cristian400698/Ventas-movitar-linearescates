<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\linearescate;
use App\Exports\LineaRescateExport;

class linearescateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->cedula;
        $user_nombre = Auth::user()->name;

        return view('linearescate.index', compact('user_id', 'user_nombre'));
    }

    public function indexventa()
    {

        $linearescate = linearescate::paginate(10);
        return view('linearescate/ventas', compact('linearescate'));
    }

    public function exportlinresExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) {
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';
            return Excel::download(new LineaRescateExport($fecha_ini, $fecha_fin), 'LineaRescate.xlsx');
        } else {
            $fecha_ini = $request->get('searchcreditodate1');
            $fecha_fin = $request->get('searchcreditodate2');
            return Excel::download(new LineaRescateExport($fecha_ini, $fecha_fin), 'LineaRescate.xlsx');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $linearescate = new linearescate();

        $linearescate->nombreMotorizado = $request->get('nombreMotorizado');
        $linearescate->cedulaMotorizado = $request->get('cedulaMotorizado');
        $linearescate->transportadora = $request->get('transportadora');
        $linearescate->lineaTitular = $request->get('lineaTitular');
        $linearescate->nOrden = $request->get('nOrden');
        $linearescate->nGuia = $request->get('nGuia');
        $linearescate->direccionRegistrada = $request->get('direccionRegistrada');
        $linearescate->ciudad = $request->get('ciudad');
        $linearescate->departamento = $request->get('departamento');
        $linearescate->aliado = $request->get('aliado');

        // Campo "Otros Aliados" (cuando se selecciona OTROS)
        if ($request->get('aliado') === 'OTROS') {
            $linearescate->otrosAliados = $request->get('otrosAliados');
        }

        $linearescate->tipoNovedad = $request->get('tipoNovedad');
        $linearescate->motivoFuerzaMayor = $request->get('motivoFuerzaMayor');

        // Nuevos campos según tipo de novedad
        if ($request->get('tipoNovedad') === 'DOCUMENTO_TITULAR') {
            $linearescate->documentoTitular = $request->get('documentoTitular');
            $linearescate->nombreTitular = $request->get('nombreTitular');
            $linearescate->lineaCelularTitular = $request->get('lineaCelularTitular');
        } elseif ($request->get('tipoNovedad') === 'DOCUMENTO_TERCERO') {
            $linearescate->documentoTercero = $request->get('documentoTercero');
            $linearescate->nombreTercero = $request->get('nombreTercero');
            $linearescate->lineaCelularTercero = $request->get('lineaCelularTercero');
        }

        // Nuevos campos de tipo de tercero y estado del motorizado
        $linearescate->tipoTercero = $request->get('tipoTercero');
        $linearescate->estadoMotorizado = $request->get('estadoMotorizado');

        $linearescate->tipificacion = $request->get('tipificacion');
        $linearescate->SubTipificacion = $request->get('SubTipificacion');

        $linearescate->modeloEquipo = $request->get('modeloEquipo');
        $linearescate->valorEquipo = $request->get('valorEquipo');
        $linearescate->direccionReagendamiento = $request->get('direccionReagendamiento');
        $linearescate->tkReagendamiento = $request->get('tkReagendamiento');
        $linearescate->Observacion = $request->get('Observacion');
        $linearescate->simcard = $request->get('simcard');
        $linearescate->idVision = $request->get('idVision');
        $linearescate->reagendamientoImg = $request->get('reagendamientoImg');

        if ($request->hasFile('idVision')) {
            $linearescate['idVision'] = $request->file('idVision')->store('uploads', 'public');
        }

        if ($request->hasFile('reagendamientoImg')) {
            $linearescate['reagendamientoImg'] = $request->file('reagendamientoImg')->store('uploads', 'public');
        }

        $linearescate->agente = $request->get('agente');
        $linearescate->cedulaAgente = $request->get('cedulaAgente');

        $linearescate->lineaContactoMorotizado = $request->get('lineaContactoMorotizado');
        $linearescate->HoraAtencionMotorizado = $request->get('HoraAtencionMotorizado');

        $linearescate->tipo = $request->get('tipo') ?? 'linea_rescate';

        $linearescate->save();

        return redirect('linearescate')->with('success', 'Datos guardados correctamente. El número de ticket es: ' . $linearescate->id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

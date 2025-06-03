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

    // DETECTAR SI ES MODO OUT (campos con "2") O IN (campos normales)
    $esOut = $request->get('tipoLlamada') === 'OUT';

    // FUNCIÓN HELPER PARA OBTENER VALOR SEGÚN EL MODO
    $getValue = function($field) use ($request, $esOut) {
        if ($esOut) {
            // Modo OUT: buscar campo con "2" primero, luego sin "2"
            $value = $request->get($field . '2');
            if (empty($value)) {
                $value = $request->get($field);
            }
        } else {
            // Modo IN: usar campo normal
            $value = $request->get($field);
        }

        return $value;
    };

    // USAR LA FUNCIÓN HELPER PARA TODOS LOS CAMPOS
    $linearescate->nombreMotorizado = $getValue('nombreMotorizado');
    $linearescate->cedulaMotorizado = $getValue('cedulaMotorizado');
    $linearescate->transportadora = $getValue('transportadora');
    $linearescate->lineaTitular = $getValue('lineaTitular');
    $linearescate->nOrden = $getValue('nOrden');
    $linearescate->nGuia = $getValue('nGuia');
    $linearescate->direccionRegistrada = $getValue('direccionRegistrada');
    $linearescate->ciudad = $getValue('ciudad');
    $linearescate->departamento = $getValue('departamento');
    $linearescate->aliado = $getValue('aliado');

    // Campo "Otros Aliados" (cuando se selecciona OTROS)
    $aliado = $getValue('aliado');
    if ($aliado === 'OTROS') {
        $linearescate->otrosAliados = $getValue('otrosAliados');
    }

    $linearescate->tipoNovedad = $getValue('tipoNovedad');
    $linearescate->motivoFuerzaMayor = $getValue('motivoFuerzaMayor');

    // Nuevos campos según tipo de novedad
    $tipoNovedad = $getValue('tipoNovedad');
    if ($tipoNovedad === 'DOCUMENTO_TITULAR') {
        $linearescate->documentoTitular = $getValue('documentoTitular');
        $linearescate->nombreTitular = $getValue('nombreTitular');
        $linearescate->lineaCelularTitular = $getValue('lineaCelularTitular');
    } elseif ($tipoNovedad === 'DOCUMENTO_TERCERO') {
        $linearescate->documentoTercero = $getValue('documentoTercero');
        $linearescate->nombreTercero = $getValue('nombreTercero');
        $linearescate->lineaCelularTercero = $getValue('lineaCelularTercero');
    }

    // Nuevos campos de tipo de tercero y estado del motorizado
    $linearescate->tipoTercero = $getValue('tipoTercero');
    $linearescate->estadoMotorizado = $getValue('estadoMotorizado');

    $linearescate->tipificacion = $getValue('tipificacion');
    $linearescate->SubTipificacion = $getValue('SubTipificacion');

    $linearescate->modeloEquipo = $getValue('modeloEquipo');
    $linearescate->valorEquipo = $getValue('valorEquipo');
    $linearescate->direccionReagendamiento = $getValue('direccionReagendamiento');
    $linearescate->tkReagendamiento = $getValue('tkReagendamiento');
    $linearescate->Observacion = $getValue('Observacion');
    $linearescate->simcard = $getValue('simcard');

    // Manejo de archivos - también con campos "2" para OUT
    if ($esOut) {
        // Modo OUT: buscar archivos con "2"
        if ($request->hasFile('idVision2')) {
            $linearescate['idVision'] = $request->file('idVision2')->store('uploads', 'public');
        }
        if ($request->hasFile('reagendamientoImg2')) {
            $linearescate['reagendamientoImg'] = $request->file('reagendamientoImg2')->store('uploads', 'public');
        }
    } else {
        // Modo IN: usar archivos normales
        if ($request->hasFile('idVision')) {
            $linearescate['idVision'] = $request->file('idVision')->store('uploads', 'public');
        }
        if ($request->hasFile('reagendamientoImg')) {
            $linearescate['reagendamientoImg'] = $request->file('reagendamientoImg')->store('uploads', 'public');
        }
    }

    $linearescate->agente = $request->get('agente');
    $linearescate->cedulaAgente = $request->get('cedulaAgente');

    $linearescate->lineaContactoMorotizado = $getValue('lineaContactoMorotizado');
    $linearescate->HoraAtencionMotorizado = $getValue('HoraAtencionMotorizado');

    $linearescate->tipo = $request->get('tipo') ?? 'linea_rescate';
    $linearescate->tipo_llamada = $request->get('tipoLlamada');

    $linearescate->save();

    return redirect('linearescate')->with('success', 'Datos guardados correctamente. El número de ticket es: ' . $linearescate->id);
}
    // funcion para el out de linea de rescate

      public function buscarUltimoRegistro($lineaTitular)
    {
        try {
            $ultimoRegistro = linearescate::where('lineaTitular', $lineaTitular)
                                        ->orderBy('created_at', 'desc')
                                        ->first();

            if ($ultimoRegistro) {
                return response()->json([
                    'success' => true,
                    'registro' => $ultimoRegistro
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No se encontró ningún registro para esta línea titular'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al buscar el registro: ' . $e->getMessage()
            ]);
        }
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

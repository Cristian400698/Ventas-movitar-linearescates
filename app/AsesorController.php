<?php

namespace App\Http\Controllers;

use App\Imports\AsesorImport;
use App\Models\Asesor;
use App\Models\Planes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ventas;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Descuentos;
use App\Models\Validacion;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('co');
	    $fecha = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $cedula = Auth::user()->cedula;
        $nombre = Auth::user()->name;
        $planes = Planes::all();
        $descuentos = Descuentos::all();
        $validacion = Validacion::all();

        return view('asesor.index' , compact('hora','fecha','nombre','cedula','planes','descuentos','validacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $NombrePlan = $request->input('NombrePlan');
        $plan = Planes::where('NombrePlan', $NombrePlan)->first();

        $ventas = new Ventas();

        $ventas->fecha = $request->fecha;
        $ventas->hora = $request->hora;
        $ventas->CedulaVendedor = $request->CedulaVendedor;
        $ventas->NombreVendedor = $request->NombreVendedor;
        $ventas->NumeroGrabacionContrato = $request->NumeroGrabacionContrato;
        $ventas->NombreCliente = $request->NombreCliente;
        $ventas->CedulaCliente = $request->CedulaCliente;
        $ventas->TipoVenta = $request->TipoVenta;
        $ventas->NumeroActivacion = $request->NumeroActivacion;
        $ventas->Nip = $request->Nip;
        $ventas->FechaPortacion = $request->FechaPortacion;
        $ventas->FechaExpedi = $request->FechaExpedi;
        $ventas->ContactoAdicional = $request->ContactoAdicional;
        $ventas->SimAdquirida = $request->SimAdquirida;
        $ventas->SerialSimAdquirida = $request->SerialSimAdquirida;
        $ventas->NumeroSimAdquirida = $request->NumeroSimAdquirida;
        $ventas->FechaNacimiento = $request->FechaNacimiento;
        $ventas->CorreoElectronico = $request->CorreoElectronico;
        $ventas->DireccionResidenciaTodoClaro = $request->DireccionResidenciaTodoClaro;
        $ventas->DireccionEntregaSim = $request->DireccionEntregaSim;
        $ventas->Departamento = $request->Departamento;
        $ventas->Ciudad = $request->Ciudad;
        $ventas->Barrio = $request->Barrio;
        $ventas->OperadorDonante = $request->OperadorDonante;
        $ventas->NombrePlan = $request->NombrePlan;
        $ventas->CFM = $plan->CFM;
        $ventas->CfmSinIva = $plan->CfmSinIva;
        $ventas->TodoClaro = $request->TodoClaro;
        $ventas->CuentaRr = $request->CuentaRr;
        $ventas->CedulaRr = $request->CedulaRr;
        $ventas->DescuentoCFMAplicar = $request->DescuentoCFMAplicar;
        $ventas->TipoValidacion = $request->TipoValidacion;
        $ventas->ObservacionAgente = $request->ObservacionAgente;
        $ventas->confronta = $request->confronta;

        $ventas->EstadoDigitacion = $request->EstadoDigitacion;

        if ($request->hasFile('confronta')) {
            $ventas['confronta'] = $request->file('confronta')->store('uploads', 'public');
          }


        $ventas->save();

        return redirect('asesor')->with('success', 'Datos guardados correctamente..');
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

    public function searchasesor(Request $request){
        Carbon::setLocale('co');
	    $fecha = Carbon::now()->format('Y-m-d');
        $hora = Carbon::now()->format('H:i:s');
        $cedula = Auth::user()->cedula;
        $nombre = Auth::user()->name;
        $planes = Planes::all();
        $descuentos = Descuentos::all();
        $validacion = Validacion::all();
        $asesorsql = Asesor::where('TEL1', $request->search)->get();
        $asesor = Asesor::find($asesorsql[0]->id);

        return view('asesor.index' , compact('hora','fecha','nombre','cedula','planes','descuentos','validacion', 'asesor'));
    }

    public function importExcel()
    {
        Excel::import(new AsesorImport, request()->file('file'));
        return redirect('/asesor')->with('success', 'All good!');
    }
}

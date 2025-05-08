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
use App\Models\phoenixe;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class phoenixController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-phoenix'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $phoenixes = phoenixe::orderBy('dia', 'asc')
        ->Where('revisados', 'LIKE', '%'.$z. '%' )
        ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
        ->paginate(20);
        return view('phoenix.index',  compact('phoenixes'));

    }

    public function misventaspho()
    {
        $agente = Auth::user()->cedula;

        $phoenixes =DB::table('phoenixes')
          ->select('id','documento', 'nombres','apellidos','tipocliente','revisados','agente','estadorevisado','dia')
          ->where('agente', '=', Auth::user()->cedula)
          ->Where('agente', 'LIKE', '%'.$agente. '%' )
          ->orderBy('dia', 'desc')->paginate(20) ;
        return view('phoenix.misventas.index', compact('phoenixes','agente'));
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolasesorpatinador =DB::table('users')
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
            return view('phoenix.create', compact('hora','date','user_nombre','user_id','usuarios','tipoclientes','modelos','tplanes','tipoPagoses'));
        }
        $validado = 1;
        return view('phoenix.create', compact('hora','date','user_nombre','user_id','usuarios','tipoclientes','modelos','tplanes','tipoPagoses','validado'));
       }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rolasesorpatinador =DB::table('users')
        ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
        ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')  
        ->select('roles.name')
        ->where('roles.name', '=', 'asesorpatinador') 
        ->where('users.cedula', Auth::user()->cedula) 
        ->get(); 

        $makepassword = DB::table('users')
        ->select('*')
        ->where('username', '=', $request->get('username'))  
        ->get();
        
        $rolpatinador =DB::table('users')
        ->leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
        ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')  
        ->select('roles.name')
        ->where('username', '=', $request->get('username')) 
        ->where('roles.name', '=', 'patinador')  
        ->get(); 

        $phoenixe = new phoenixe();
    
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

        if (isset($rolasesorpatinador[0])) {
            if (isset($makepassword[0])) {
                $password = $makepassword[0]->password;
                $cedulauser = $makepassword[0]->cedula; 
            $passwordhash = Hash::check($request->get('password'), $password ); 
           
    
            if ($passwordhash == 1) {
                if (isset($rolpatinador[0])) {
                    
            
            $phoenixe->patinador = $cedulauser;
    
            if ($request->hasFile('confronta')) {
                $phoenixe['confronta'] = $request->file('confronta')->store('uploads', 'public');
              }

              if ($request->hasFile('likewize')) {
                $phoenixe['likewize'] = $request->file('likewize')->store('uploads', 'public');
              }

              if ($request->hasFile('ley2300')) {
                $phoenixe['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
              }
    
            $phoenixe->save();
    
            return redirect('phoenix/create')->with('success', 'Datos guardados correctamente..');
                } else {
                    return redirect('phoenix/create')->with('warning', 'el usuario no es un patinador'); 
                }
            } else {
              return redirect('phoenix/create')->with('warning', 'Usuario o contraseña incorrectos');
            }
            }
               else {
              return redirect('phoenix/create')->with('warning', 'Usuario o contraseña incorrectos');
            }

        }else{
            $phoenixe->patinador = 'Venta Directa';
    
            if ($request->hasFile('confronta')) {
                $phoenixe['confronta'] = $request->file('confronta')->store('uploads', 'public');
              }
    
            $phoenixe->save();
    
            return redirect('phoenix/create')->with('success', 'Datos guardados correctamente..');
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
        abort_if(Gate::denies('back-phoenix'), 403);
        $phoenixes=phoenixe::findOrFail($id);
        return view('phoenix.edit',compact('phoenixes'));
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
        $phoenixe = phoenixe::find($id);

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

        return redirect('phoenix')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phoenixes = phoenixe::find($id);        
        $phoenixes->delete();
        return redirect('phoenix')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchphoenix(Request $request)
    {
	$phoenixes = phoenixe::all();
        $searchphoenix = $request->get('searchphoenix');
        $phoenixes = phoenixe::firstOrNew()->where('numero', 'like', '%'.$searchphoenix.'%')->paginate(20);

        
        return view('phoenix.index',compact('phoenixes'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new PhoenixExport($fecha_ini, $fecha_fin), 'Phoenix.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new PhoenixExport  ($fecha_ini, $fecha_fin), 'Phoenix.xlsx');
   }
    }
}

<?php

namespace App\Http\Controllers;

use App\Exports\PortateleventaExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\portatelev;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class portatelevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-televanta'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $portatelev =DB::table('portatelevs')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('portatelev.index',compact('portatelev'));
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
        $Planadquieres = Planadquiere::all();
        $tipoclientes = tipoclientes::all();
        $origen = origen::all();

        if (isset($rolasesorpatinador[0])) {
            return view('portatelev.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','origen'));
          }
          $validado = 1;

        return view('portatelev.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','origen','validado')); 
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


        $portatelev = new portatelev();

        $portatelev->numero = $request->get('numero');
        $portatelev->documento = $request->get('documento');
        $portatelev->nombres = $request->get('nombres');
        $portatelev->apellidos = $request->get('apellidos');
        $portatelev->correo = $request->get('correo');
        $portatelev->departamento = $request->get('departamento');
        $portatelev->id_ciudad = $request->get('id_ciudad');
        $portatelev->barrio = $request->get('barrio');
        $portatelev->direccion = $request->get('direccion');
        $portatelev->nip = $request->get('nip');
        $portatelev->tipocliente = $request->get('tipocliente');
        $portatelev->planadquiere = $request->get('planadquiere');
        $portatelev->segmento = $request->get('segmento');
        $portatelev->ncontacto = $request->get('ncontacto');
        $portatelev->imei = $request->get('imei');
        $portatelev->fvc = $request->get('fvc');
        $portatelev->fentrega = $request->get('fentrega');
        $portatelev->fexpedicion = $request->get('fexpedicion');
        $portatelev->fnacimiento = $request->get('fnacimiento');
        $portatelev->origen = $request->get('origen');
        $portatelev->ngrabacion = $request->get('ngrabacion');
        $portatelev->selector = $request->get('selector');
        $portatelev->orden = $request->get('orden');
        $portatelev->confronta = $request->get('confronta');
        $portatelev->observaciones = $request->get('observaciones');
        $portatelev->agente = $request->get('agente');
        $portatelev->revisados = $request->get('revisados');
        $portatelev->estadorevisado = $request->get('estadorevisado');
        $portatelev->obs2 = $request->get('obs2');
        $portatelev->backoffice = $request->get('backoffice');
        $portatelev->hora = Carbon::now()->format('H:i:s');
        $portatelev->dia = $request->get('dia');
        $portatelev->likewize = $request->get('likewize');
        $portatelev->marcador = $request->get('marcador');


        if (isset($rolasesorpatinador[0])) {
            if (isset($makepassword[0])) {
                $password = $makepassword[0]->password;
                $cedulauser = $makepassword[0]->cedula; 
            $passwordhash = Hash::check($request->get('password'), $password ); 
           
    
            if ($passwordhash == 1) {
                if (isset($rolpatinador[0])) {
                  
            
            $portatelev->patinador = $cedulauser;
    
    
            if ($request->hasFile('confronta')) {
                $portatelev['confronta'] = $request->file('confronta')->store('uploads', 'public');
              }

            if ($request->hasFile('likewize')) {
                $portatelev['likewize'] = $request->file('likewize')->store('uploads', 'public');
              }
    
            $portatelev->save();
    
            return redirect('inicio/3/edit');
            return redirect('portatelev/create')->with('success', 'Datos guardados correctamente..');
                } else {
                    return redirect('portatelev/create')->with('warning', 'el usuario no es un patinador'); 
                }
            } else {
              return redirect('portatelev/create')->with('warning', 'Usuario o contraseña incorrectos');
            }
            }
               else {
              return redirect('portatelev/create')->with('warning', 'Usuario o contraseña incorrectos');
            }
        }else{ 
            $portatelev->patinador = 'Venta Directa';
    
    
            if ($request->hasFile('confronta')) {
                $portatelev['confronta'] = $request->file('confronta')->store('uploads', 'public');
              }
              if ($request->hasFile('likewize')) {
                $portatelev['likewize'] = $request->file('likewize')->store('uploads', 'public');
              }
              if ($request->hasFile('ley2300')) {
                $portatelev['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
              }
    
            $portatelev->save();
    
            return redirect('inicio/3/edit');
            return redirect('portatelev/create')->with('success', 'Datos guardados correctamente..');

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
        abort_if(Gate::denies('back-televanta'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $portatelev =DB::table('portatelevs')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('portatelev.index',compact('portatelev'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('back-televanta'), 403);
        $portatelev = portatelev::findOrFail($id);
        return view('portatelev.edit')->with('portatelev', $portatelev);
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
        $portatelev = portatelev::find($id); 

        $portatelev->numero = $request->get('numero');
        $portatelev->documento = $request->get('documento');
        $portatelev->nombres = $request->get('nombres');
        $portatelev->apellidos = $request->get('apellidos');
        $portatelev->correo = $request->get('correo');
        $portatelev->departamento = $request->get('departamento');
        $portatelev->id_ciudad = $request->get('id_ciudad');
        $portatelev->barrio = $request->get('barrio');
        $portatelev->direccion = $request->get('direccion');
        $portatelev->nip = $request->get('nip');
        $portatelev->tipocliente = $request->get('tipocliente');
        $portatelev->planadquiere = $request->get('planadquiere');
        $portatelev->segmento = $request->get('segmento');
        $portatelev->ncontacto = $request->get('ncontacto');
        $portatelev->imei = $request->get('imei');
        $portatelev->fvc = $request->get('fvc');
        $portatelev->fentrega = $request->get('fentrega');
        $portatelev->fexpedicion = $request->get('fexpedicion');
        $portatelev->fnacimiento = $request->get('fnacimiento');
        $portatelev->origen = $request->get('origen');
        $portatelev->ngrabacion = $request->get('ngrabacion');
        $portatelev->selector = $request->get('selector');
        $portatelev->orden = $request->get('orden');
        $portatelev->observaciones = $request->get('observaciones');
        $portatelev->agente = $request->get('agente');
        $portatelev->revisados = $request->get('revisados');
        $portatelev->estadorevisado = $request->get('estadorevisado');
        $portatelev->obs2 = $request->get('obs2');
        $portatelev->backoffice = $request->get('backoffice');
        $portatelev->likewize = $request->get('likewize');
        $portatelev->marcador = $request->get('marcador');

        if($request->hasFile('confronta')){
            $portatelev['confronta']=$request->file('confronta')->store('uploads','public');
          }
          if($request->hasFile('likewize')){
            $portatelev['likewize']=$request->file('likewize')->store('uploads','public');
          }

        $portatelev->save();

        return redirect('portatelev/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portatelev = portatelev::find($id);        
        $portatelev->delete();

        return redirect('portatelev/index')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchteleventaback(Request $request)
    {
	$portatelev = portatelev::all();
        $searchteleventaback = $request->get('searchteleventaback');
        $portatelev = portatelev::firstOrNew()->where('Numero', 'like', '%'.$searchteleventaback.'%')->paginate(20);

 
        return view('portatelev.index',compact('portatelev'));
    }
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new PortateleventaExport($fecha_ini, $fecha_fin), 'Portablidiad_Televenta.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new PortateleventaExport  ($fecha_ini, $fecha_fin), 'Portablidiad_Televenta.xlsx');
   }
    }
}

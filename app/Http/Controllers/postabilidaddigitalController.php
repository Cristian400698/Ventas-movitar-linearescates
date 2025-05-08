<?php

namespace App\Http\Controllers;

use App\Exports\PortadigitalExport;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\portadigital;
use App\Models\Planadquiere;
use App\Models\tipoclientes;
use App\Models\origen;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class postabilidaddigitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('back-digital'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $portadigital =DB::table('portadigitals')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora', 'dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('portadigital.index',compact('portadigital'));
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
             return view('portadigital.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','origen'));
         }
          $validado = 1;
           return view('portadigital.create', compact('hora','date','user_nombre','user_id','usuarios','Planadquieres','tipoclientes','origen','validado'));
       
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
    
             $portadigital = new portadigital();

                    $portadigital->numero = $request->get('numero');
                    $portadigital->documento = $request->get('documento');
                    $portadigital->nombres = $request->get('nombres');
                    $portadigital->apellidos = $request->get('apellidos');
                    $portadigital->correo = $request->get('correo');
                    $portadigital->departamento = $request->get('departamento');
                    $portadigital->id_ciudad = $request->get('id_ciudad');
                    $portadigital->barrio = $request->get('barrio');
                    $portadigital->direccion = $request->get('direccion');
                    $portadigital->nip = $request->get('nip');
                    $portadigital->tipocliente = $request->get('tipocliente');
                    $portadigital->planadquiere = $request->get('planadquiere');
                    $portadigital->segmento = $request->get('segmento');
                    $portadigital->ncontacto = $request->get('ncontacto');
                    $portadigital->imei = $request->get('imei');
                    $portadigital->fvc = $request->get('fvc');
                    $portadigital->fentrega = $request->get('fentrega');
                    $portadigital->fexpedicion = $request->get('fexpedicion');
                    $portadigital->fnacimiento = $request->get('fnacimiento');
                    $portadigital->origen = $request->get('origen');
                    $portadigital->ngrabacion = $request->get('ngrabacion');
                    $portadigital->selector = $request->get('selector');
                    $portadigital->orden = $request->get('orden');
                    $portadigital->confronta = $request->get('confronta');
                    $portadigital->observaciones = $request->get('observaciones');
                    $portadigital->agente = $request->get('agente');
                    $portadigital->revisados = $request->get('revisados');
                    $portadigital->estadorevisado = $request->get('estadorevisado');
                    $portadigital->obs2 = $request->get('obs2');
                    $portadigital->backoffice = $request->get('backoffice');
                    $portadigital->hora = $request->get('hora');
                    $portadigital->dia = $request->get('dia');

             if (isset($rolasesorpatinador[0])) {
                 if (isset($makepassword[0])) {
                $password = $makepassword[0]->password;
                $cedulauser = $makepassword[0]->cedula; 
            $passwordhash = Hash::check($request->get('password'), $password ); 
           
    
            if ($passwordhash == 1) {
                if (isset($rolpatinador[0])) {

                   
                    $portadigital->patinador = $cedulauser;
            
                    if ($request->hasFile('confronta')) {
                        $portadigital['confronta'] = $request->file('confronta')->store('uploads', 'public');
                      }
            
                    $portadigital->save();
            
                    return redirect('inicio/2/edit');
                    return redirect('portadigital/create')->with('success', 'Datos guardados correctamente..');
                    
                } else {
                    return redirect('portadigital/create')->with('warning', 'el usuario no es un patinador'); 
                }
            } else {
              return redirect('portadigital/create')->with('warning', 'Usuario o contraseña incorrectos');
            }
            }
               else {
              return redirect('portadigital/create')->with('warning', 'Usuario o contraseña incorrectos');
            }
             }else{
                 $portadigital->patinador = 'Venta Directa';
            
                    if ($request->hasFile('confronta')) {
                        $portadigital['confronta'] = $request->file('confronta')->store('uploads', 'public');
                      }
                      if ($request->hasFile('likewize')) {
                        $portadigital['likewize'] = $request->file('likewize')->store('uploads', 'public');
                      }
                      if ($request->hasFile('ley2300')) {
                        $portadigital['ley2300'] = $request->file('ley2300')->store('uploads', 'public');
                      }
            
                    $portadigital->save();
            
                    return redirect('inicio/2/edit');
                    return redirect('portadigital/create')->with('success', 'Datos guardados correctamente..');
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
        abort_if(Gate::denies('back-digital'), 403);
        $z ='NUEVO'; 
        $y ='RECUPERADA';
        $portadigital =DB::table('portadigitals')
          ->select('id','numero', 'documento','nombres','apellidos','tipocliente','planadquiere','segmento','fvc','ncontacto', 'revisados', 'estadorevisado', 'agente', 'hora','dia')
          ->Where('revisados', 'LIKE', '%'.$z. '%' )
          ->orWhere('revisados', 'LIKE', '%'.$y. '%' )
          ->orderBy('dia', 'asc')
          ->paginate(20);

        return view('portadigital.index',compact('portadigital'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        abort_if(Gate::denies('back-digital'), 403);
        $portadigital = portadigital::findOrFail($id);
        return view('portadigital.edit')->with('portadigital', $portadigital);
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
        $portadigital = portadigital::find($id); 

        $portadigital->numero = $request->get('numero');
        $portadigital->documento = $request->get('documento');
        $portadigital->nombres = $request->get('nombres');
        $portadigital->apellidos = $request->get('apellidos');
        $portadigital->correo = $request->get('correo');
        $portadigital->departamento = $request->get('departamento');
        $portadigital->id_ciudad = $request->get('id_ciudad');
        $portadigital->barrio = $request->get('barrio');
        $portadigital->direccion = $request->get('direccion');
        $portadigital->nip = $request->get('nip');
        $portadigital->tipocliente = $request->get('tipocliente');
        $portadigital->planadquiere = $request->get('planadquiere');
        $portadigital->segmento = $request->get('segmento');
        $portadigital->ncontacto = $request->get('ncontacto');
        $portadigital->imei = $request->get('imei');
        $portadigital->fvc = $request->get('fvc');
        $portadigital->fentrega = $request->get('fentrega');
        $portadigital->fexpedicion = $request->get('fexpedicion');
        $portadigital->fnacimiento = $request->get('fnacimiento');
        $portadigital->origen = $request->get('origen');
        $portadigital->ngrabacion = $request->get('ngrabacion');
        $portadigital->selector = $request->get('selector');
        $portadigital->orden = $request->get('orden');
        $portadigital->observaciones = $request->get('observaciones');
        $portadigital->agente = $request->get('agente');
        $portadigital->revisados = $request->get('revisados');
        $portadigital->estadorevisado = $request->get('estadorevisado');
        $portadigital->obs2 = $request->get('obs2');
        $portadigital->backoffice = $request->get('backoffice');

        if($request->hasFile('confronta')){
            $portadigital['confronta']=$request->file('confronta')->store('uploads','public');
          }
        
        if($request->hasFile('ley2300')){
            $portadigital['ley2300']=$request->file('ley2300')->store('uploads','public');
          }

        if($request->hasFile('likewize')){
            $portadigital['likewize']=$request->file('likewize')->store('uploads','public');
          }

        $portadigital->save();

        return redirect('portadigital/index')->with('success', 'Datos guardados correctamente..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portadigital = portadigital::find($id);        
        $portadigital->delete();
        return redirect('portadigital/index')->with('success', 'Datos Eliminado correctamente..');
    }
    public function searchdigitalback(Request $request)
    {
	$portadigital = portadigital::all();
        $searchdigitalback = $request->get('searchdigitalback');
        $portadigital = portadigital::firstOrNew()->where('Numero', 'like', '%'.$searchdigitalback.'%')->paginate(20);

 
        return view('portadigital.index',compact('portadigital'));
    }
   
    public function exportExcel(Request $request)
    {
        if ($request->get('searchcreditodate1') == null) { 
            $fecha_ini = '1872-01-01';
            $fecha_fin = '5000-01-01';  
            return Excel::download(new PortadigitalExport($fecha_ini, $fecha_fin), 'Portablidiad_Digital.xlsx');
        }else{
        $fecha_ini = $request->get('searchcreditodate1');
        $fecha_fin = $request->get('searchcreditodate2');   
       return Excel::download(new PortadigitalExport  ($fecha_ini, $fecha_fin), 'Portablidiad_Digital.xlsx');
   }
        

    }
}

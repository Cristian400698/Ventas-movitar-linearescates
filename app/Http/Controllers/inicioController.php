<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Alerta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class inicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('inicio.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $descripcion = $request->get('descripcion');

        $alertas = new Alerta();
        $alertas->descripcion = $descripcion;
        $alertas->save();
        
        return redirect('inicio/1'); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $alertas = Alerta::paginate(5);
        return view('inicio.edit-alerts', compact('alertas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == 1) {
            $ruta = 'porta';
            $alertas = Alerta::all();
           return view('inicio.alerts', compact('ruta','alertas'));
        }else if($id == 2){
            $alertas = Alerta::all();
            $ruta = 'portadigital';
           return view('inicio.alerts', compact('ruta','alertas'));
        }else if($id == 3){
            $alertas = Alerta::all();
            $ruta = 'portatelev';
           return view('inicio.alerts', compact('ruta','alertas'));
        }
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
        $descripcion = $request->get('descripcion');
        $alertas  = Alerta::find($id);
        $alertas->descripcion = $descripcion;

        $alertas->save();

        return redirect('inicio/1'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alertas = Alerta::find($id);
        $alertas->delete();
        
        return redirect('inicio/1'); 
    }

    public function searchalerts(Request $request)
    {
        $alert = $request->get('texto');
        $alertas = Alerta::where('id', $alert)
        ->orwhere('descripcion', 'like', '%'.$alert.'%')->paginate(2);
        return view('inicio.edit-alerts', compact('alertas'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('perfil.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        $roles = Role::all()->pluck('name', 'id');
        return view('perfil.create',  compact('roles'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {        

        $user = User::create($request->only('name', 'username', 'email', 'cedula')
        +[
            'password' => bcrypt($request->input('password')),
        ]);

        $roles = $request->input('roles', []);
        $user->syncRoles($roles);
        return redirect()->route('perfil')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        $user = User::find($id);
        return view('perfil.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user->load('roles');
        return view('perfil.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id)
    {
    
        $user =User::findOrFail($id);
        $data = $request->only('name', 'username', 'email', 'cedula');
        if(trim($request->password)==''){
            $data=$request->except('password');
        } 
        else{
            $data=$request->all();
            $data['password']=bcrypt($request->password);
        }

        $user->update($data);

        /* $roles = $request->input('roles', []);
        $user->syncRoles($roles); */
        return redirect()->route('home')->with('success', 'Usuario actualizado correctamente'); 

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {        
        
        if (auth()->user()->id == $user->id) {
            return redirect()->route('users.index');
        }
        $user->delete();
        return back()->with('success'. 'usuario eliminado correctamente');
    }
}

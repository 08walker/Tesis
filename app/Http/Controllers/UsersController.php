<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::allowed()->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',new User);

        //Para que el foreach no de error
        $user = New User;
        //Para optener las relaciones del objeto
        $roles = Role::with('permissions')->get();
        
        //Devuelve un arreglo con el id y el nombre
        $permissions = Permission::pluck('name','id');
        return view('users.create', compact('user','roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $user = User::create($data);

        //Asiganmos los roles
        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }
        
        //Asignamos los permisos
        if ($request->filled('permissions')) {
            $user->givePermissionTo($request->permissions);            
        }

        //Regresamos al usuario
        return redirect()->route('users.index')->withFlash('El usuario ha sido creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view',$user);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);

        //Para optener las relaciones del objeto
        $roles = Role::with('permissions')->get();
        
        //Devuelve un arreglo con el id y el nombre
        $permissions = Permission::pluck('name','id');
        if ($user->id!==1) {
            return view('users.edit', compact('user','roles','permissions'));
        }else
        {
            $users = User::all();
            return view('users.index',compact('users'));
        }
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->validated());
        return redirect()->route('users.edit', $user)->withFlash('Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('update',$user);

        $user->delete();

        return redirect()->route('users.index')->withFlash('EL usuario ha sido eliminado');
    }
}
<?php

namespace App\Http\Controllers;

use App\Traza;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',$role = new Role);
        return view('roles.index',['roles'=>Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',$role = new Role);

        return view('roles.create',[
            'role'=> $role,
            'permissions'=>Permission::pluck('display_name','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',new Role);
        
        $data = $request->validate([
            'name'=> 'required|unique:roles'],
            [
                'name.required'=>'El campo nombre es obligatorio.',
                'name.unique'=>'El nombre ya existe.'
            ]
        );
        $role = Role::create($data);
        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }
        $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "El rol {$role->name} ha sido creado por el usuario {$nombre}",
            ]);
        return redirect()->route('admin.roles.index')->with('success','El role fue creado correctamente');
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
    public function edit(Role $role)
    {
        $this->authorize('update',$role);        

        return view('roles.edit',[
            'role' => $role,
            'permissions'=>Permission::pluck('display_name','id'),
        ]);
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

    public function destroy(Role $role)
    {
        $this->authorize('delete',$role);        
        $role->delete();

        $nombre = auth()->user()->name;
            Traza::create([
            'description'=> "El rol {$role->name} ha sido eliminado por el usuario {$nombre}",
            ]);
        return redirect()->route('admin.roles.index')->with('success','El role fue eliminado correctamente');
    }
}

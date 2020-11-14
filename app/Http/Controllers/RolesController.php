<?php

namespace App\Http\Controllers;

use App\Traza;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $this->authorize('view',$role = new Role);
        return view('roles.index',['roles'=>Role::all()]);
    }

    public function create()
    {
        $this->authorize('create',$role = new Role);

        return view('roles.create',[
            'role'=> $role,
            'permissions'=>Permission::pluck('display_name','id'),
        ]);
    }

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
        $ip = request()->ip();
            Traza::create([
            'description'=> "El rol {$role->name} ha sido creado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
        return redirect()->route('admin.roles.index')->with('success','El role fue creado correctamente');
    }

    public function edit(Role $role)
    {
        $this->authorize('update',$role);        

        return view('roles.edit',[
            'role' => $role,
            'permissions'=>Permission::pluck('display_name','id'),
        ]);
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete',$role);        
        $role->delete();

        $nombre = auth()->user()->name;
        $ip = request()->ip();
            Traza::create([
            'description'=> "El rol {$role->name} ha sido eliminado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
        return redirect()->route('admin.roles.index')->with('success','El role fue eliminado correctamente');
    }
}

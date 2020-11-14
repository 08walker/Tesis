<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $this->authorize('view', new Permission);

        $permissions = Permission::all();
        return view('permissions.index',compact('permissions'));
    }

    public function edit(Permission $permission)
    {
        $this->authorize('update', $permission);
        
        return view('permissions.edit',[
            'permission'=>$permission,
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $this->authorize('update', $permission);
        
        $data = $request->validate([
                    'display_name'=> 'required',
                ]);
        $permission->update($data);
        if ($permission) {
            $nombre = auth()->user()->name;
            $ip = request()->ip();
            Traza::create([
            'description'=> "Permiso {$permission->display_name} actualizado por el usuario {$nombre}",
            'ip'=>$ip,
            ]);
        return redirect()->route('admin.permissions.edit',$permission)->withFlash('El permiso ha sido actualizado');
        }
        return back()->withInput()->with('error','Error al actualizar el permiso');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return redirect()->route('admin.permissions.edit',$permission)->withFlash('El permiso ha sido actualizado');
    }
}

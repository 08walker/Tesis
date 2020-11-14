<?php

namespace App\Http\Controllers;

use App\Traza;
use App\User;
use Illuminate\Http\Request;

class UsersPermissionsController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);

        $nombre = auth()->user()->name;
        $ip = request()->ip();
        Traza::create([
            'description'=> "El usuario {$user->name} se le actualizaron los permisos por el usuario {$nombre}",
            'ip'=>$ip,
        ]); 

        return back()->with('success','Los permisos han sido actualizados');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersPermissionsController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->syncPermissions($request->permissions);
        return back()->with('success','Los permisos han sido actualizados');
    }
}

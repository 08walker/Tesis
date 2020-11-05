<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersRolesController extends Controller
{
    public function update(Request $request, User $user)
    {
    	//return $request;

        $user->roles()->detach();
        //$user->syncRoles($request->roles);
        if ($request->filled('roles')) {
            $user->assignRole($request->roles);
        }
        return back()->with('success','Los roles has sido actualisados');
    }
}

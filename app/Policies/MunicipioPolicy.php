<?php

namespace App\Policies;

use App\User;
use App\Municipio;
use Illuminate\Auth\Access\HandlesAuthorization;

class MunicipioPolicy
{
    use HandlesAuthorization;

    // public function before($user)
    // {
    //     if ($user->hasRole('Admin')) {
    //         return true;
    //     }
    // }
    
    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Municipio $municipio)
    {
        return $user->hasPermissionTo('View municipio');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create municipio');
    }

    public function update(User $user, Municipio $municipio)
    {
        return $user->hasPermissionTo('Update municipio');
    }

    public function delete(User $user, Municipio $municipio)
    {
        return $user->hasPermissionTo('Delete municipio');
    }

    public function restore(User $user, Municipio $municipio)
    {
        //
    }

    public function forceDelete(User $user, Municipio $municipio)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\User;
use App\Transportacion;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransportacionPolicy
{
    use HandlesAuthorization;
    
    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }


    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Transportacion $transportacion)
    {
        return $user->hasPermissionTo('View transportation');
    }

    /**
     * Determine whether the user can create transportacions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create transportation');
    }

    /**
     * Determine whether the user can update the transportacion.
     *
     * @param  \App\User  $user
     * @param  \App\Transportacion  $transportacion
     * @return mixed
     */
    public function update(User $user, Transportacion $transportacion)
    {
        return $user->hasPermissionTo('Update transportation');
    }

    public function delete(User $user, Transportacion $transportacion)
    {
        return $user->hasPermissionTo('Delete transportation');
    }

    public function restore(User $user, Transportacion $transportacion)
    {
        //
    }

    public function forceDelete(User $user, Transportacion $transportacion)
    {
        //
    }
}

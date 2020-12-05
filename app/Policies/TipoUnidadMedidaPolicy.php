<?php

namespace App\Policies;

use App\User;
use App\TipoUnidadMedida;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoUnidadMedidaPolicy
{
    use HandlesAuthorization;

    // public function before($user)
    // {
    //     if ($user->hasRole('Admin')) {
    //         return true;
    //     }
    // }

    public function view(User $user, TipoUnidadMedida $tipoUnidadMedida)
    {
        return $user->hasPermissionTo('View TunidadMedida');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create TunidadMedida');
    }

    public function update(User $user, TipoUnidadMedida $tipoUnidadMedida)
    {
        return $user->hasPermissionTo('Update TunidadMedida');
    }

    public function delete(User $user, TipoUnidadMedida $tipoUnidadMedida)
    {
        return $user->hasPermissionTo('Delete TunidadMedida');
    }
}

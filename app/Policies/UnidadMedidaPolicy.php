<?php

namespace App\Policies;

use App\User;
use App\UnidadMedida;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnidadMedidaPolicy
{
    use HandlesAuthorization;

    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    public function view(User $user, UnidadMedida $unidadMedida)
    {
        return $user->hasPermissionTo('View unidadMedida');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create unidadMedida');
    }

    public function update(User $user, UnidadMedida $unidadMedida)
    {
        return $user->hasPermissionTo('Update unidadMedida');
    }

    public function delete(User $user, UnidadMedida $unidadMedida)
    {
        return $user->hasPermissionTo('Delete unidadMedida');
    }
}

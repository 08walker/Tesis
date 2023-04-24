<?php

namespace App\Policies;

use App\User;
use App\TransfEnviada;
use Illuminate\Auth\Access\HandlesAuthorization;

class TransfEnviadaPolicy
{
    use HandlesAuthorization;
    
    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }

    public function view(User $user, TransfEnviada $transfEnviada)
    {
        return $user->hasPermissionTo('View transferencia');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create transferencia');
    }

    public function update(User $user, TransfEnviada $transfEnviada)
    {
        return $user->hasPermissionTo('Update transferencia');
    }

    public function delete(User $user, TransfEnviada $transfEnviada)
    {
        return $user->hasPermissionTo('Delete transferencia');
    }

    public function restore(User $user, TransfEnviada $transfEnviada)
    {
        //
    }

    public function forceDelete(User $user, TransfEnviada $transfEnviada)
    {
        //
    }
}

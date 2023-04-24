<?php

namespace App\Policies;

use App\User;
use App\Arrastre;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArrastrePolicy
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

    public function view(User $user, Arrastre $arrastre)
    {
        return $user->hasPermissionTo('View arrastre');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create arrastre');
    }

    public function update(User $user, Arrastre $arrastre)
    {
        return $user->hasPermissionTo('Update arrastre');
    }

    public function delete(User $user, Arrastre $arrastre)
    {
        return $user->hasPermissionTo('Delete arrastre');
    }

    public function restore(User $user, Arrastre $arrastre)
    {
        //
    }

    public function forceDelete(User $user, Arrastre $arrastre)
    {
        //
    }
}

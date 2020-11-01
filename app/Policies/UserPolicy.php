<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function view(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('View users');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('Create users');
    }

    public function update(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Update users');
    }

    public function delete(User $authUser, User $user)
    {
        return $authUser->id === $user->id || $user->hasPermissionTo('Delete users');        
    }

    public function restore(User $user, User $model)
    {
        //
    }

    public function forceDelete(User $user, User $model)
    {
        //
    }
}

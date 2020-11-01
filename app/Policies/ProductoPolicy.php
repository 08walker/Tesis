<?php

namespace App\Policies;

use App\User;
use App\Producto;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductoPolicy
{
    use HandlesAuthorization;
    
    public function before($user)
    {
        if ($user->hasRole('Admin')) {
            return true;
        }
    }
    
    /**
     * Determine whether the user can view any productos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the producto.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function view(User $user, Producto $producto)
    {
        return $user->hasPermissionTo('View producto');
    }

    /**
     * Determine whether the user can create productos.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('Create producto');
    }

    /**
     * Determine whether the user can update the producto.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function update(User $user, Producto $producto)
    {
        return $user->hasPermissionTo('Update producto');
    }

    /**
     * Determine whether the user can delete the producto.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function delete(User $user, Producto $producto)
    {
        return $user->hasPermissionTo('Delete producto');
    }

    /**
     * Determine whether the user can restore the producto.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function restore(User $user, Producto $producto)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the producto.
     *
     * @param  \App\User  $user
     * @param  \App\Producto  $producto
     * @return mixed
     */
    public function forceDelete(User $user, Producto $producto)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\User;
use App\Cliente;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the cliente.
     *
     * @param  \App\User  $user
     * @param  \App\Cliente  $cliente
     * @return mixed
     */
    public function view(User $user, Cliente $cliente)
    {
        return $user->id === 1;
    }

    /**
     * Determine whether the user can create clientes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the cliente.
     *
     * @param  \App\User  $user
     * @param  \App\Cliente  $cliente
     * @return mixed
     */
    public function update(User $user, Cliente $cliente)
    {
        //
    }

    /**
     * Determine whether the user can delete the cliente.
     *
     * @param  \App\User  $user
     * @param  \App\Cliente  $cliente
     * @return mixed
     */
    public function delete(User $user, Cliente $cliente)
    {
        //
    }

    /**
     * Determine whether the user can restore the cliente.
     *
     * @param  \App\User  $user
     * @param  \App\Cliente  $cliente
     * @return mixed
     */
    public function restore(User $user, Cliente $cliente)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the cliente.
     *
     * @param  \App\User  $user
     * @param  \App\Cliente  $cliente
     * @return mixed
     */
    public function forceDelete(User $user, Cliente $cliente)
    {
        //
    }
}

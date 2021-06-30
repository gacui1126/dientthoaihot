<?php

namespace App\Policies;

use App\User;
use App\roles;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the roles.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_role');
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('create_role');
    }

    /**
     * Determine whether the user can update the roles.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit_role');
    }

    /**
     * Determine whether the user can delete the roles.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_role');
    }

    /**
     * Determine whether the user can restore the roles.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function restore(User $user, roles $roles)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the roles.
     *
     * @param  \App\User  $user
     * @param  \App\roles  $roles
     * @return mixed
     */
    public function forceDelete(User $user, roles $roles)
    {
        //
    }
}

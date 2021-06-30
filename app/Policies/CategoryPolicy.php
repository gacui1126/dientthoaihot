<?php

namespace App\Policies;

use App\ProductType;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any product types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the product type.
     *
     * @param  \App\User  $user
     * @param  \App\ProductType  $productType
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_category');
    }

    /**
     * Determine whether the user can create product types.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('create_category');
    }

    /**
     * Determine whether the user can update the product type.
     *
     * @param  \App\User  $user
     * @param  \App\ProductType  $productType
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit_category');
    }

    /**
     * Determine whether the user can delete the product type.
     *
     * @param  \App\User  $user
     * @param  \App\ProductType  $productType
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_category');
    }

    /**
     * Determine whether the user can restore the product type.
     *
     * @param  \App\User  $user
     * @param  \App\ProductType  $productType
     * @return mixed
     */
    public function restore(User $user, ProductType $productType)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the product type.
     *
     * @param  \App\User  $user
     * @param  \App\ProductType  $productType
     * @return mixed
     */
    public function forceDelete(User $user, ProductType $productType)
    {
        //
    }
}

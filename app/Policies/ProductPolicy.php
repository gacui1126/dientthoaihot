<?php

namespace App\Policies;

use App\User;
use App\products;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the products.
     *
     * @param  \App\User  $user
     * @param  \App\products  $products
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_product');
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('create_product');
    }

    /**
     * Determine whether the user can update the products.
     *
     * @param  \App\User  $user
     * @param  \App\products  $products
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit_product');
    }

    /**
     * Determine whether the user can delete the products.
     *
     * @param  \App\User  $user
     * @param  \App\products  $products
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_category');
    }

    /**
     * Determine whether the user can restore the products.
     *
     * @param  \App\User  $user
     * @param  \App\products  $products
     * @return mixed
     */
    public function restore(User $user, products $products)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the products.
     *
     * @param  \App\User  $user
     * @param  \App\products  $products
     * @return mixed
     */
    public function forceDelete(User $user, products $products)
    {
        //
    }
}

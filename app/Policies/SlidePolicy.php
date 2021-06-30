<?php

namespace App\Policies;

use App\User;
use App\slides;
use Illuminate\Auth\Access\HandlesAuthorization;

class SlidePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any slides.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the slides.
     *
     * @param  \App\User  $user
     * @param  \App\slides  $slides
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess('list_slide');
    }

    /**
     * Determine whether the user can create slides.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess('create_slide');
    }

    /**
     * Determine whether the user can update the slides.
     *
     * @param  \App\User  $user
     * @param  \App\slides  $slides
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionAccess('edit_slide');
    }

    /**
     * Determine whether the user can delete the slides.
     *
     * @param  \App\User  $user
     * @param  \App\slides  $slides
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess('delete_slide');
    }

    /**
     * Determine whether the user can restore the slides.
     *
     * @param  \App\User  $user
     * @param  \App\slides  $slides
     * @return mixed
     */
    public function restore(User $user, slides $slides)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the slides.
     *
     * @param  \App\User  $user
     * @param  \App\slides  $slides
     * @return mixed
     */
    public function forceDelete(User $user, slides $slides)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Models\Creator;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CreatorPolicy
{
    use HandlesAuthorization;

    public function before(User $user) {
        if ($user->isAdmin())
            return true;
    }
    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        if ($user->isFilmographer())
            return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Creator $creator)
    {
        if ($user->isFilmographer())
            return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Creator $creator)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Creator  $creator
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Creator $creator)
    {
        return false;
    }
}

<?php

namespace App\Policies;

use App\Model\User;
use App\history;
use Illuminate\Auth\Access\HandlesAuthorization;

class HistoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\history  $history
     * @return mixed
     */
    public function view(User $user, history $history)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->activated();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\history  $history
     * @return mixed
     */
    public function update(User $user, history $history)
    {
        return $user->id == $history->id_user;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\history  $history
     * @return mixed
     */
    public function delete(User $user, history $history)
    {
        return $user->id == $history->id_user;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\history  $history
     * @return mixed
     */
    public function restore(User $user, history $history)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Model\User  $user
     * @param  \App\history  $history
     * @return mixed
     */
    public function forceDelete(User $user, history $history)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\{User, Admin, Asana};
use Illuminate\Auth\Access\HandlesAuthorization;

class AsanaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the asana.
     *
     * @param  \App\User  $user
     * @param  \App\Asana  $asana
     * @return mixed
     */
    public function view(User $user, Asana $asana)
    {
        //
    }

    /**
     * Determine whether the user can create asanas.
     *
     * @param  \App\User  $admin
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can update the asana.
     *
     * @param  \App\User  $admin
     * @param  \App\Asana  $asana
     * @return mixed
     */
    public function update(Admin $admin, Asana $asana)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can delete the asana.
     *
     * @param  \App\User  $admin
     * @param  \App\Asana  $asana
     * @return mixed
     */
    public function delete(Admin $admin, Asana $asana)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can restore the asana.
     *
     * @param  \App\User  $user
     * @param  \App\Asana  $asana
     * @return mixed
     */
    public function restore(User $user, Asana $asana)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the asana.
     *
     * @param  \App\User  $user
     * @param  \App\Asana  $asana
     * @return mixed
     */
    public function forceDelete(User $user, Asana $asana)
    {
        //
    }
}

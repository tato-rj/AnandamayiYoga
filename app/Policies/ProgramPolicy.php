<?php

namespace App\Policies;

use App\{User, Admin, Program};
use Illuminate\Auth\Access\HandlesAuthorization;

class ProgramPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the program.
     *
     * @param  \App\User  $user
     * @param  \App\Program  $program
     * @return mixed
     */
    public function view(User $user, Program $program)
    {
        //
    }

    /**
     * Determine whether the user can create programs.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can update the program.
     *
     * @param  \App\User  $user
     * @param  \App\Program  $program
     * @return mixed
     */
    public function update(Admin $admin, Program $program)
    {
        return $admin->isManager() || $program->teacher_id == $admin->teacher_id;
    }

    /**
     * Determine whether the user can delete the program.
     *
     * @param  \App\User  $user
     * @param  \App\Program  $program
     * @return mixed
     */
    public function delete(Admin $admin, Program $program)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can restore the program.
     *
     * @param  \App\User  $user
     * @param  \App\Program  $program
     * @return mixed
     */
    public function restore(User $user, Program $program)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the program.
     *
     * @param  \App\User  $user
     * @param  \App\Program  $program
     * @return mixed
     */
    public function forceDelete(User $user, Program $program)
    {
        //
    }
}

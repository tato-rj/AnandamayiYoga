<?php

namespace App\Policies;

use App\{User, RoutineQuestionaire, Admin};
use Illuminate\Auth\Access\HandlesAuthorization;

class RoutinePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the routine questionaire.
     *
     * @param  \App\User  $user
     * @param  \App\RoutineQuestionaire  $routineQuestionaire
     * @return mixed
     */
    public function view(User $user, RoutineQuestionaire $routineQuestionaire)
    {
        //
    }

    /**
     * Determine whether the user can create routine questionaires.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $admin, RoutineQuestionaire $questionaire)
    {
        return $admin->isManager() || $questionaire->teacher_id == auth()->user()->teacher_id;
    }

    /**
     * Determine whether the Admin can update the routine questionaire.
     *
     * @param  \App\Admin  $admin
     * @param  \App\RoutineQuestionaire  $routineQuestionaire
     * @return mixed
     */
    public function update(Admin $admin, RoutineQuestionaire $routineQuestionaire)
    {
        //
    }

    /**
     * Determine whether the Admin can delete the routine questionaire.
     *
     * @param  \App\Admin  $admin
     * @param  \App\RoutineQuestionaire  $routineQuestionaire
     * @return mixed
     */
    public function delete(Admin $admin, RoutineQuestionaire $routineQuestionaire)
    {
        //
    }

    /**
     * Determine whether the user can restore the routine questionaire.
     *
     * @param  \App\User  $user
     * @param  \App\RoutineQuestionaire  $routineQuestionaire
     * @return mixed
     */
    public function restore(User $user, RoutineQuestionaire $routineQuestionaire)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the routine questionaire.
     *
     * @param  \App\User  $user
     * @param  \App\RoutineQuestionaire  $routineQuestionaire
     * @return mixed
     */
    public function forceDelete(User $user, RoutineQuestionaire $routineQuestionaire)
    {
        //
    }
}

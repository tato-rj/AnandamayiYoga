<?php

namespace App\Policies;

use App\{User, Teacher, Admin};
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the teacher.
     *
     * @param  \App\User  $user
     * @param  \App\Teacher  $teacher
     * @return mixed
     */
    public function view(Admin $admin, Teacher $teacher)
    {
        return $admin->isManager() || $admin->teacher_id == $teacher->admin_id;
    }

    /**
     * Determine whether the user can create teachers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can update the teacher.
     *
     * @param  \App\User  $user
     * @param  \App\Teacher  $teacher
     * @return mixed
     */
    public function update(Admin $admin, Teacher $teacher)
    {
        return $admin->isManager() || $admin->id == $teacher->admin_id;
    }

    /**
     * Determine whether the user can delete the teacher.
     *
     * @param  \App\User  $user
     * @param  \App\Teacher  $teacher
     * @return mixed
     */
    public function delete(Admin $admin, Teacher $teacher)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can restore the teacher.
     *
     * @param  \App\User  $user
     * @param  \App\Teacher  $teacher
     * @return mixed
     */
    public function restore(User $user, Teacher $teacher)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the teacher.
     *
     * @param  \App\User  $user
     * @param  \App\Teacher  $teacher
     * @return mixed
     */
    public function forceDelete(User $user, Teacher $teacher)
    {
        //
    }
}

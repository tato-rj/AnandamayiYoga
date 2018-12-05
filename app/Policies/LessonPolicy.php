<?php

namespace App\Policies;

use App\{User, Lesson, Admin};
use Illuminate\Auth\Access\HandlesAuthorization;

class LessonPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the lesson.
     *
     * @param  \App\User  $user
     * @param  \App\Lesson  $lesson
     * @return mixed
     */
    public function view(User $user, Lesson $lesson)
    {
        return $user->isActive();
    }

    /**
     * Determine whether the user can create lessons.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can update the lesson.
     *
     * @param  \App\User  $user
     * @param  \App\Lesson  $lesson
     * @return mixed
     */
    public function update(Admin $admin, Lesson $lesson)
    {
        return $admin->isManager() || $lesson->teacher_id == $admin->teacher_id;
    }

    /**
     * Determine whether the user can delete the lesson.
     *
     * @param  \App\User  $user
     * @param  \App\Lesson  $lesson
     * @return mixed
     */
    public function delete(Admin $admin, Lesson $lesson)
    {
        return $admin->isManager();
    }
}

<?php

namespace App\Policies;

use App\{User, Wallpaper, Admin};
use Illuminate\Auth\Access\HandlesAuthorization;

class WallpaperPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the wallpaper.
     *
     * @param  \App\User  $user
     * @param  \App\Wallpaper  $wallpaper
     * @return mixed
     */
    public function view(User $user, Wallpaper $wallpaper)
    {
        //
    }

    /**
     * Determine whether the user can create wallpapers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(Admin $admin)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can update the wallpaper.
     *
     * @param  \App\User  $user
     * @param  \App\Wallpaper  $wallpaper
     * @return mixed
     */
    public function update(Admin $admin, Wallpaper $wallpaper)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can delete the wallpaper.
     *
     * @param  \App\User  $user
     * @param  \App\Wallpaper  $wallpaper
     * @return mixed
     */
    public function delete(Admin $admin, Wallpaper $wallpaper)
    {
        return $admin->isManager();
    }

    /**
     * Determine whether the user can restore the wallpaper.
     *
     * @param  \App\User  $user
     * @param  \App\Wallpaper  $wallpaper
     * @return mixed
     */
    public function restore(User $user, Wallpaper $wallpaper)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the wallpaper.
     *
     * @param  \App\User  $user
     * @param  \App\Wallpaper  $wallpaper
     * @return mixed
     */
    public function forceDelete(User $user, Wallpaper $wallpaper)
    {
        //
    }
}

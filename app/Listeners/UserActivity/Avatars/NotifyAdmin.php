<?php

namespace App\Listeners\UserActivity\Avatars;

use App\Admin;
use App\Notifications\Admins\UserActivity\AvatarUpdateNotification;
use App\Events\UserChangesAvatar;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyAdmin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserChangesAvatar  $event
     * @return void
     */
    public function handle(UserChangesAvatar $event)
    {
        Admin::all()->each(function($admin) use ($event) {
            $admin->notify(new AvatarUpdateNotification($event->user));
        });
    }
}

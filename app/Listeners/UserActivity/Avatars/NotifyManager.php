<?php

namespace App\Listeners\UserActivity\Avatars;

use App\Manager;
use App\Notifications\Managers\UserActivity\AvatarUpdateNotification;
use App\Events\UserChangesAvatar;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyManager
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
        Manager::all()->each(function($manager) use ($event) {
            $manager->notify(new AvatarUpdateNotification($event->user));
        });
    }
}

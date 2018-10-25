<?php

namespace App\Listeners\Signups;

use App\Manager;
use App\Notifications\Managers\Signups\NewUserNotification;
use App\Events\UserConfirmedEmail;
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
     * @param  UserConfirmedEmail  $event
     * @return void
     */
    public function handle(UserConfirmedEmail $event)
    {
        Manager::all()->each(function($manager) use ($event) {
            $manager->notify(new NewUserNotification($event->user));
        });
    }
}

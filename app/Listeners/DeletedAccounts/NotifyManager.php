<?php

namespace App\Listeners\DeletedAccounts;

use App\Manager;
use App\Events\UserRemoved;
use App\Notifications\Managers\DeletedAccounts\UserRemovedNotification;

class NotifyManager
{
    /**
     * Handle the event.
     *
     * @param  UserRemoved  $event
     * @return void
     */
    public function handle(UserRemoved $event)
    {
        Manager::all()->each(function($manager) use ($event) {
            $manager->notify(new UserRemovedNotification($event->user));
        });
    }
}

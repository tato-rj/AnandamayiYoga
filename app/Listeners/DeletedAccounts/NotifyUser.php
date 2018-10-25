<?php

namespace App\Listeners\DeletedAccounts;

use App\Events\UserRemoved;
use App\Notifications\Users\RemovedAccountNotification;

class NotifyUser
{
    /**
     * Handle the event.
     *
     * @param  UserRemoved  $event
     * @return void
     */
    public function handle(UserRemoved $event)
    {
        $event->user->notify(new RemovedAccountNotification($event->user));
    }
}

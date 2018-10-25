<?php

namespace App\Listeners\Routines\NewRequest;

use App\Notifications\Users\Routine\RequestReceivedNotification;
use App\Events\Routines\RoutineRequested;

class NotifyUser
{
    /**
     * Handle the event.
     *
     * @param  RoutineRequested  $event
     * @return void
     */
    public function handle(RoutineRequested $event)
    {
        $event->user->notify(new RequestReceivedNotification($event->user));
    }
}

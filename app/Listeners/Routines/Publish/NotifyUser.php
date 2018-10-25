<?php

namespace App\Listeners\Routines\Publish;

use App\User;
use App\Events\RoutineCreated;
use App\Notifications\Users\Routine\RoutineReadyNotification;

class NotifyUser
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
     * @param  RoutineCreated  $event
     * @return void
     */
    public function handle(RoutineCreated $event)
    {
        User::find($event->routine->user_id)->notify(new RoutineReadyNotification($event->routine));
    }
}

<?php

namespace App\Listeners\Routines;

use App\Manager;
use App\Notifications\Managers\Routines\StartRoutineNotification;
use App\Events\Routines\StartRoutine;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostRoutineStartNotification
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
     * @param  StartRoutine  $event
     * @return void
     */
    public function handle(StartRoutine $event)
    {
        Manager::all()->each(function($manager) use ($event) {
            $manager->notify(new StartRoutineNotification($event->user));
        });
    }
}

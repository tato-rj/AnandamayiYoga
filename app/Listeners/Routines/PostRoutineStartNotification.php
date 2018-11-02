<?php

namespace App\Listeners\Routines;

use App\Admin;
use App\Notifications\Admins\Routines\StartRoutineNotification;
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
        Admin::all()->each(function($admin) use ($event) {
            $admin->notify(new StartRoutineNotification($event->user));
        });
    }
}

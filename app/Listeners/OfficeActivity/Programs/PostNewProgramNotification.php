<?php

namespace App\Listeners\OfficeActivity\Programs;

use App\User;
use App\Events\ProgramCreated;
use App\Notifications\Users\ManagerCommunication\NewProgramNotification;
use App\Notifications\Teachers\ProgramPublishedNotification;

class PostNewProgramNotification
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
     * @param  ProgramCreated  $event
     * @return void
     */
    public function handle(ProgramCreated $event)
    {
        User::all()->each(function($user) use ($event) {
            $user->notify(new NewProgramNotification($user, $event->program));
        });

        if ($event->program->teacher()->exists())
            $event->program->teacher->notify(new ProgramPublishedNotification($event->program));
    }
}

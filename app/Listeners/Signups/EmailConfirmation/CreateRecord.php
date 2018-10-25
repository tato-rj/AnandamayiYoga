<?php

namespace App\Listeners\Signups\EmailConfirmation;

use App\Events\UserConfirmedEmail;
use App\UserRecord;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateRecord
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
        UserRecord::confirm($event->user->id);
    }
}

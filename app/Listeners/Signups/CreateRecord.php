<?php

namespace App\Listeners\Signups;

use App\UserRecord;
use App\Events\UserSignedUp;

class CreateRecord
{
    /**
     * Handle the event.
     *
     * @param  UserSignedUp  $event
     * @return void
     */
    public function handle(UserSignedUp $event)
    {
        UserRecord::new($event->user->id);
    }
}

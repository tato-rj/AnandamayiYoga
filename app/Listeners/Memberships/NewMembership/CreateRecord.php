<?php

namespace App\Listeners\Memberships\NewMembership;

use App\UserRecord;
use App\Events\UserJoinedMembership;

class CreateRecord
{
    /**
     * Handle the event.
     *
     * @param  UserJoinedMembership  $event
     * @return void
     */
    public function handle(UserJoinedMembership $event)
    {
        UserRecord::membership($event->user->id);        
    }
}

<?php

namespace App\Listeners\Memberships\NewMembership;

use App\Manager;
use App\Events\UserJoinedMembership;
use App\Notifications\Managers\Membership\NewMembershipNotification;

class NotifyManager
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
     * @param  UserJoinedMembership  $event
     * @return void
     */
    public function handle(UserJoinedMembership $event)
    {        
        Manager::all()->each(function($manager) use ($event) {
            $manager->notify(new NewMembershipNotification($event->user));
        });
    }
}

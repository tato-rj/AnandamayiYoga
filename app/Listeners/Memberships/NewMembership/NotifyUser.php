<?php

namespace App\Listeners\Memberships\NewMembership;

use App\Events\UserJoinedMembership;
use App\Notifications\Users\Membership\NewMembershipNotification;

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
     * @param  UserJoinedMembership  $event
     * @return void
     */
    public function handle(UserJoinedMembership $event)
    {
        $event->user->notify(new NewMembershipNotification($event->user));
    }
}

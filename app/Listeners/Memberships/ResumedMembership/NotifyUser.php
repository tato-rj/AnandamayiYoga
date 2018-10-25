<?php

namespace App\Listeners\Memberships\ResumedMembership;

use App\Events\UserResumedMembership;
use App\Notifications\Users\Membership\ResumedMembershipNotification;

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
     * @param  UserResumedMembership  $event
     * @return void
     */
    public function handle(UserResumedMembership $event)
    {
        $event->user->notify(new ResumedMembershipNotification($event->user));
    }
}

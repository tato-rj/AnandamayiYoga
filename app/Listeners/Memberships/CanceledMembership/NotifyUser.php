<?php

namespace App\Listeners\Memberships\CanceledMembership;

use App\Events\UserCanceledMembership;
use App\Notifications\Users\Membership\CanceledMembershipNotification;

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
     * @param  UserCanceledMembership  $event
     * @return void
     */
    public function handle(UserCanceledMembership $event)
    {
        $event->user->notify(new CanceledMembershipNotification($event->user));
    }
}

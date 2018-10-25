<?php

namespace App\Listeners\Memberships\CanceledMembership;

use App\Manager;
use App\Events\UserCanceledMembership;
use App\Notifications\Managers\Membership\CanceledMembershipNotification;

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
     * @param  UserCanceledMembership  $event
     * @return void
     */
    public function handle(UserCanceledMembership $event)
    {
        Manager::all()->each(function($manager) use ($event) {
            $manager->notify(new CanceledMembershipNotification($event->user));
        });
    }
}

<?php

namespace App\Listeners\Memberships\ResumedMembership;

use App\Manager;
use App\Events\UserResumedMembership;
use App\Notifications\Managers\Membership\ResumedMembershipNotification;

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
     * @param  UserResumedMembership  $event
     * @return void
     */
    public function handle(UserResumedMembership $event)
    {
        Manager::all()->each(function($manager) use ($event) {
            $manager->notify(new ResumedMembershipNotification($event->user));
        });
    }
}

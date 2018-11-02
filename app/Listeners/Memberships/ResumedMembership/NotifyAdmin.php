<?php

namespace App\Listeners\Memberships\ResumedMembership;

use App\Admin;
use App\Events\UserResumedMembership;
use App\Notifications\Admins\Membership\ResumedMembershipNotification;

class NotifyAdmin
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
        Admin::all()->each(function($admin) use ($event) {
            $admin->notify(new ResumedMembershipNotification($event->user));
        });
    }
}

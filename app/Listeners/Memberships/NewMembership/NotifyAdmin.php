<?php

namespace App\Listeners\Memberships\NewMembership;

use App\Admin;
use App\Events\UserJoinedMembership;
use App\Notifications\Admins\Membership\NewMembershipNotification;

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
     * @param  UserJoinedMembership  $event
     * @return void
     */
    public function handle(UserJoinedMembership $event)
    {        
        Admin::all()->each(function($admin) use ($event) {
            $admin->notify(new NewMembershipNotification($event->user));
        });
    }
}

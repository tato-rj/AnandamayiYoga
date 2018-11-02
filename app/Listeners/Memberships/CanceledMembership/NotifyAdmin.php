<?php

namespace App\Listeners\Memberships\CanceledMembership;

use App\Admin;
use App\Events\UserCanceledMembership;
use App\Notifications\Admins\Membership\CanceledMembershipNotification;

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
     * @param  UserCanceledMembership  $event
     * @return void
     */
    public function handle(UserCanceledMembership $event)
    {
        Admin::all()->each(function($admin) use ($event) {
            $admin->notify(new CanceledMembershipNotification($event->user));
        });
    }
}

<?php

namespace App\Listeners\DeletedAccounts;

use App\Admin;
use App\Events\UserRemoved;
use App\Notifications\Admins\DeletedAccounts\UserRemovedNotification;

class NotifyAdmin
{
    /**
     * Handle the event.
     *
     * @param  UserRemoved  $event
     * @return void
     */
    public function handle(UserRemoved $event)
    {
        Admin::all()->each(function($admin) use ($event) {
            $admin->notify(new UserRemovedNotification($event->user));
        });
    }
}

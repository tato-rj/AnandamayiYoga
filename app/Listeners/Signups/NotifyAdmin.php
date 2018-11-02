<?php

namespace App\Listeners\Signups;

use App\Admin;
use App\Notifications\Admins\Signups\NewUserNotification;
use App\Events\UserConfirmedEmail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

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
     * @param  UserConfirmedEmail  $event
     * @return void
     */
    public function handle(UserConfirmedEmail $event)
    {
        Admin::all()->each(function($admin) use ($event) {
            $admin->notify(new NewUserNotification($event->user));
        });
    }
}

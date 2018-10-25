<?php

namespace App\Listeners\Signups;

use App\Notifications\Users\UserActivity\ChangeProfilePictureNotification;
use App\Notifications\Users\Welcome\{WelcomeNotification, IncompleteProfileNotification};
use App\Events\UserConfirmedEmail;

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
     * @param  NewUserSignedUp  $event
     * @return void
     */
    public function handle(UserConfirmedEmail $event)
    {
        $event->user->notify(new WelcomeNotification($event->user));

        $event->user->notify(new ChangeProfilePictureNotification($event->user));

        if ($event->user->categories->isEmpty())
            $event->user->notify(new IncompleteProfileNotification($event->user));
    }
}

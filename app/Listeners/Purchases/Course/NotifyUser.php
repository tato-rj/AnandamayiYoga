<?php

namespace App\Listeners\Purchases\Course;

use App\Events\Purchases\CoursePurchased;
use App\Notifications\Purchases\CoursePurchaseNotification;

class NotifyUser
{
    /**
     * Handle the event.
     *
     * @param  CoursePurchased  $event
     * @return void
     */
    public function handle(CoursePurchased $event)
    {
        $event->user->notify(new CoursePurchaseNotification($event->course));
    }
}

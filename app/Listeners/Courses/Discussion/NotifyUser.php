<?php

namespace App\Listeners\Courses\Discussion;

use App\Events\ReplyCreated;
use App\Notifications\Users\Course\NewReplyNotification;

class NotifyUser
{

    /**
     * Handle the event.
     *
     * @param  ReplyCreated  $event
     * @return void
     */
    public function handle(ReplyCreated $event)
    {
        if ($event->reply->user_id != $event->reply->discussion->user_id)
            $event->reply->discussion->creator->notify(new NewReplyNotification($event->reply));
    }
}

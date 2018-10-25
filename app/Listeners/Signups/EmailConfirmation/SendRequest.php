<?php

namespace App\Listeners\Signups\EmailConfirmation;

use App\Events\UserSignedUp;
use App\Mail\EmailConfirmation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRequest
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
     * @param  UserSignedUp  $event
     * @return void
     */
    public function handle(UserSignedUp $event)
    {
        $event->user->sendMail(EmailConfirmation::class);
    }
}

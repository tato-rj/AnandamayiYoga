<?php

namespace App\Listeners\Subscriptions;

use App\Events\Subscription;
use App\Mail\WelcomeToNewsletter;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeToNewsletterEmail
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
     * @param  NewSubscription  $event
     * @return void
     */
    public function handle(Subscription $event)
    {
        Mail::to($event->email)->send(new WelcomeToNewsletter($event->email));
    }
}

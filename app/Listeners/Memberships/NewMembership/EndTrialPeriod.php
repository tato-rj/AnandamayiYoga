<?php

namespace App\Listeners\Memberships\NewMembership;

use App\Events\UserJoinedMembership;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EndTrialPeriod
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
        $event->user->endTrial();
    }
}

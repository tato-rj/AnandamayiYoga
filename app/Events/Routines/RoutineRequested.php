<?php

namespace App\Events\Routines;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class RoutineRequested
{
    use Dispatchable, SerializesModels;
    
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }
}

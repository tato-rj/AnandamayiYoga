<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class UserRemoved
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

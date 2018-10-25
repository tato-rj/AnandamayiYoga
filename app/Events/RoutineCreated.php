<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class RoutineCreated
{
    use Dispatchable, SerializesModels;

    public $routine;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($routine)
    {
        $this->routine = $routine;
    }
}

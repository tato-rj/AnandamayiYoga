<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ProgramCreated
{
    use Dispatchable, SerializesModels;

    public $program;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($program)
    {
        $this->program = $program;
    }
}
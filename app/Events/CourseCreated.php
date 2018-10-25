<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class CourseCreated
{
    use Dispatchable, SerializesModels;

    public $course;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($course)
    {
        $this->course = $course;
    }
}

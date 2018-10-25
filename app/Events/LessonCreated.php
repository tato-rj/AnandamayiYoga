<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class LessonCreated
{
    use Dispatchable, SerializesModels;

    public $lesson;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($lesson)
    {
        $this->lesson = $lesson;
    }
}

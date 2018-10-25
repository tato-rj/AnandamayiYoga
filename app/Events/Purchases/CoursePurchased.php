<?php

namespace App\Events\Purchases;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class CoursePurchased
{
    use Dispatchable, SerializesModels;

    public $user, $course;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $course)
    {
        $this->user = $user;
        $this->course = $course;
    }
}

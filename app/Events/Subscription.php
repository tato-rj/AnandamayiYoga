<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class Subscription
{
    use Dispatchable, SerializesModels;

    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }
}
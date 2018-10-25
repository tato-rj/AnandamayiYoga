<?php

namespace App\Traits;

use App\Subscription;

trait Subscriptions
{
    public function subscribeTo($list)
    {
        foreach ($list as $subscription) {
            Subscription::createOrFail($this->email, $subscription);
        }
    }

    public function unsubscribeFrom($list)
    {
        Subscription::where([
            'list' => $list,
            'email' => $this->email
        ])->delete();
    }

    public function unsubscribeFromAll()
    {
        Subscription::where([
            'email' => $this->email
        ])->delete();
    }

    public function isSubscribedTo($list)
    {
    	return Subscription::$list()->contains($this->email);
    }
}

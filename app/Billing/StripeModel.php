<?php

namespace App\Billing;

use Illuminate\Database\Eloquent\Model;
use Stripe\Stripe;

abstract class StripeModel extends Model
{
    protected static function boot()
    {
    	parent::boot();

        Stripe::setApiKey(config('services.stripe.secret'));
    }
}

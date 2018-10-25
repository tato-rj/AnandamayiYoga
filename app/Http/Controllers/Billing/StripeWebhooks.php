<?php

namespace App\Http\Controllers\Billing;

use App\User;

trait StripeWebhooks
{
    public function eventToMethod($event)
    {
    	return 'when'.studly_case(str_replace('.', '_', $event));
    }

    public function whenChargeSucceeded($payload)
    {
        $user = User::findByStripeEmail($payload);

        $user->recordPayment($payload);

        return response("Received a success payment for {$user->fullName}");
    }

    public function whenChargeFailed($payload)
    {
        $user = User::findByStripeEmail($payload);

        $user->recordPayment($payload);

        return response("Received a failed payment for {$user->fullName}");
    }

    public function whenChargeRefunded($payload)
    {
        $user = User::findByStripeEmail($payload);

        $user->recordPayment($payload);

        return response("Received a success refund for {$user->fullName}");
    }
}
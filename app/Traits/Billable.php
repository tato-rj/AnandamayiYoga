<?php

namespace App\Traits;

use App\Billing\{Payment, Purchase};
use App\Events\Purchases\CoursePurchased;
use Carbon\Carbon;
use App\Events\{UserJoinedMembership, UserResumedMembership};

trait Billable
{
    public function payments()
    {
        return $this->hasMany(Payment::class)->latest();
    }

    public function membershipPayments()
    {
        // FIX: ADD A COLUMN ON THE PAYMENT TABLE TO HOLD THE TYPE OF PAYMENT
        return $this->hasMany(Payment::class)->where('description', 'AnandamayiYoga Membership payment')->latest();
    }

    public function isOnTrial()
    {
        if (is_null($this->trial_ends_at))
            return false;

        return $this->trial_ends_at->gt(Carbon::now());
    }

    public function daysOnTrial()
    {
        $start = $this->created_at;
        $end = ($this->isOnTrial()) ? Carbon::now() : $this->membership->created_at;

        $difference = $start->diffInDays($end);

        if ($difference > 20)
            $difference = 20;

        return $difference;
    }

    public function endTrial()
    {
        $this->update(['trial_ends_at' => null]);
    }

    public function isOnGracePeriod()
    {
        if ($this->membership()->exists())
            return Carbon::now()->lt($this->membership->subscription_ends_at);

        return false;
    }

    public function isActive()
    {
        return $this->isOntrial() || $this->hasMembership() || $this->isOnGracePeriod();
    }

    public function hasMembership()
    {
        if ($this->membership()->exists())
            return !! $this->membership->active;

        return false;
    }

    public function lastChargeFailed()
    {
        if ($this->payments()->exists())
            return ! $this->payments()->latest()->first()->paid;
    }
    
	public function activate($customer)
    {
        if (auth()->check() && auth()->user()->membership()->exists()){
            event(new UserResumedMembership(auth()->user()));
        } else {
            event(new UserJoinedMembership(auth()->user()));      
        }

        $membership = $this->membership()->firstOrNew([
           'stripe_id' => $customer->id
        ]);

        $membership->fill([
            'stripe_subscription' => $customer->subscriptions->data[0]->id,
            'active' => true,
            'card_brand' => $customer->sources->data[0]->brand,
            'card_last_four' => $customer->sources->data[0]->last4,
            'subscription_ends_at' => null
        ])->save();

        $this->endTrial();
    }

    public function deactivate($membership)
    {

        if (is_null($membership)) {
            $this->membership()->update([
                'active' => false,
                'canceled_at' => Carbon::now(),
                'subscription_ends_at' => Carbon::now()
            ]);
        } else {
            if ($membership->cancel_at_period_end) {
                $subscriptionEndsAt = $membership->current_period_end;
            } else {
                $this->membership->deleteCustomer();
                $subscriptionEndsAt = $membership->canceled_at;
            }

            $this->membership()->update([
                'active' => false,
                'canceled_at' => Carbon::createFromTimestamp($membership->canceled_at),
                'subscription_ends_at' => Carbon::createFromTimestamp($subscriptionEndsAt)
            ]);
        }
    }

    public function recordPayment($payload)
    {
        if ($this->membership()->exists() || $this->purchases()->exists()) {
            $description = $payload['data']['object']['description'];

            $this->payments()->firstOrCreate([
                'description' => empty($description) ? 'AnandamayiYoga Membership payment' : $description,
                'is_refund' => $payload['data']['object']['refunded'],
                'paid' => $payload['data']['object']['paid'],
                'charge_id' => $payload['data']['object']['id'],
                'amount' => $payload['data']['object']['amount'],
                'card_brand' => $payload['data']['object']['source']['brand'],
                'card_last_four' => $payload['data']['object']['source']['last4']
            ]);
        }
    }

    public function updateCard($card)
    {
        $this->membership()->update([
            'card_brand' => $card->brand,
            'card_last_four' => $card->last4
        ]);
    }

    public function scopeFindByStripeId($query, $payload)
    {
        return $query->whereHas('membership', function($query) use ($payload) {
            $query->where('stripe_id', $payload['data']['object']['customer']);
        })->first(); 
    }

    public function scopeFindByStripeEmail($query, $payload)
    {
        return $query->where('email', $payload['data']['object']['receipt_email'])->first(); 
    }

    public function purchase($product, $customer, $charge, $coupon = null)
    {
        $this->purchases()->create([
            'product_id' => $product->id,
            'product_type' => get_class($product),
            'stripe_id' => $customer->id,
            'card_brand' => $customer->sources->data[0]->brand,
            'card_last_four' => $customer->sources->data[0]->last4,
            'amount' => $charge->amount,
            'coupon' => $coupon
        ]);
        
        if (get_class($product) == 'App\Course')
            event(new CoursePurchased($this, $product));
    }

    public function hasPurchased($product)
    {
        return Purchase::where([
                'product_id' => $product->id, 
                'product_type' => get_class($product),
                'user_id' => $this->id
            ])->exists();
    }

    public function datePurchased($product)
    {
        return Purchase::where([
                'product_id' => $product->id, 
                'product_type' => get_class($product),
                'user_id' => $this->id
            ])->first()->created_at;       
    }
}

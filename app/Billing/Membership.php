<?php

namespace App\Billing;

use App\User;
use Carbon\Carbon;
use App\Traits\HasStatistics;
use App\Billing\StripeModel;
use Stripe\{Stripe, Charge, Customer, Subscription, Balance, Invoice};

class Membership extends StripeModel
{
    use HasStatistics;
    
    protected $guarded = [];

    protected $coupon;

    protected $dates = ['subscription_ends_at', 'canceled_at'];
    
    protected $casts = [
        'active' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function withCoupon($coupon = null)
    {
        if ($coupon)
            $this->coupon = $coupon;

        return $this;
    }

    public function balance()
    {
        return Balance::retrieve()->pending[0]->amount/100;
    }

    public function createCustomer($token)
    {
        $customer = Customer::create([
            'description' => auth()->user()->fullName,
            'email' => auth()->user()->email,
            'source' => $token,
            'plan' => config('membership.plan'),
            'coupon' => $this->coupon
        ]); 

        auth()->user()->activate($customer);
    }

    public function deleteCustomer()
    {
        $customer = $this->retrieveStripeCustomer();
        
        if(! is_null($customer))
            return $customer->delete();
    }

    public function updateCustomer($token)
    {
        $customer = $this->retrieveStripeCustomer();

        $customer->source = $token;

        $customer->save();

        auth()->user()->updateCard($customer->sources->data[0]);
    }

    public static function byStripeId($stripeId)
    {
    	return self::where('stripe_id', $stripeId)->firstOrFail();
    }

    public function cancel($atPeriodEnd = true)
    {
        $membershipId = $this->user->membership->stripe_subscription;

        $stripeMembership = $this->retrieveStripeSubscription();

        if (! is_null($stripeMembership))
            $stripeMembership->cancel(['at_period_end' => $atPeriodEnd]);

        $this->user->deactivate($stripeMembership);
    }

    public function cancelImmediately()
    {
        return $this->cancel($atPeriodEnd = false);
    }

    public function resume()
    {
        $subscription = $this->retrieveStripeSubscription();

        $subscription->plan = config('membership.plan');

        $subscription->save();

        $customer = $this->retrieveStripeCustomer();

        $this->user->activate($customer);   
    }

    public function upcomingInvoice()
    {
        return Invoice::upcoming(['customer' => $this->retrieveStripeCustomer()]);
    }

    public function retrieveStripeCustomer()
    {
        try {
            return Customer::retrieve($this->stripe_id);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function retrieveStripeSubscription()
    {
        try {
            return Subscription::retrieve($this->stripe_subscription);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function getFormattedCardLastFourAttribute()
    {
        return "&middot;&middot;&middot;&middot; 
        &middot;&middot;&middot;&middot; 
        &middot;&middot;&middot;&middot; 
        {$this->card_last_four}";
    }
}
